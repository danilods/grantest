<?php namespace Tests\Repositories;

use App\Models\Banca;
use App\Repositories\BancaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BancaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BancaRepository
     */
    protected $bancaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bancaRepo = \App::make(BancaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_banca()
    {
        $banca = factory(Banca::class)->make()->toArray();

        $createdBanca = $this->bancaRepo->create($banca);

        $createdBanca = $createdBanca->toArray();
        $this->assertArrayHasKey('id', $createdBanca);
        $this->assertNotNull($createdBanca['id'], 'Created Banca must have id specified');
        $this->assertNotNull(Banca::find($createdBanca['id']), 'Banca with given id must be in DB');
        $this->assertModelData($banca, $createdBanca);
    }

    /**
     * @test read
     */
    public function test_read_banca()
    {
        $banca = factory(Banca::class)->create();

        $dbBanca = $this->bancaRepo->find($banca->id);

        $dbBanca = $dbBanca->toArray();
        $this->assertModelData($banca->toArray(), $dbBanca);
    }

    /**
     * @test update
     */
    public function test_update_banca()
    {
        $banca = factory(Banca::class)->create();
        $fakeBanca = factory(Banca::class)->make()->toArray();

        $updatedBanca = $this->bancaRepo->update($fakeBanca, $banca->id);

        $this->assertModelData($fakeBanca, $updatedBanca->toArray());
        $dbBanca = $this->bancaRepo->find($banca->id);
        $this->assertModelData($fakeBanca, $dbBanca->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_banca()
    {
        $banca = factory(Banca::class)->create();

        $resp = $this->bancaRepo->delete($banca->id);

        $this->assertTrue($resp);
        $this->assertNull(Banca::find($banca->id), 'Banca should not exist in DB');
    }
}
