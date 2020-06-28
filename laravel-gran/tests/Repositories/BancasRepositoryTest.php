<?php namespace Tests\Repositories;

use App\Models\Bancas;
use App\Repositories\BancasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BancasRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BancasRepository
     */
    protected $bancasRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bancasRepo = \App::make(BancasRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bancas()
    {
        $bancas = factory(Bancas::class)->make()->toArray();

        $createdBancas = $this->bancasRepo->create($bancas);

        $createdBancas = $createdBancas->toArray();
        $this->assertArrayHasKey('id', $createdBancas);
        $this->assertNotNull($createdBancas['id'], 'Created Bancas must have id specified');
        $this->assertNotNull(Bancas::find($createdBancas['id']), 'Bancas with given id must be in DB');
        $this->assertModelData($bancas, $createdBancas);
    }

    /**
     * @test read
     */
    public function test_read_bancas()
    {
        $bancas = factory(Bancas::class)->create();

        $dbBancas = $this->bancasRepo->find($bancas->id);

        $dbBancas = $dbBancas->toArray();
        $this->assertModelData($bancas->toArray(), $dbBancas);
    }

    /**
     * @test update
     */
    public function test_update_bancas()
    {
        $bancas = factory(Bancas::class)->create();
        $fakeBancas = factory(Bancas::class)->make()->toArray();

        $updatedBancas = $this->bancasRepo->update($fakeBancas, $bancas->id);

        $this->assertModelData($fakeBancas, $updatedBancas->toArray());
        $dbBancas = $this->bancasRepo->find($bancas->id);
        $this->assertModelData($fakeBancas, $dbBancas->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bancas()
    {
        $bancas = factory(Bancas::class)->create();

        $resp = $this->bancasRepo->delete($bancas->id);

        $this->assertTrue($resp);
        $this->assertNull(Bancas::find($bancas->id), 'Bancas should not exist in DB');
    }
}
