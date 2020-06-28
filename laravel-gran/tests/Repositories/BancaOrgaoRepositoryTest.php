<?php namespace Tests\Repositories;

use App\Models\BancaOrgao;
use App\Repositories\BancaOrgaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BancaOrgaoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BancaOrgaoRepository
     */
    protected $bancaOrgaoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bancaOrgaoRepo = \App::make(BancaOrgaoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_banca_orgao()
    {
        $bancaOrgao = factory(BancaOrgao::class)->make()->toArray();

        $createdBancaOrgao = $this->bancaOrgaoRepo->create($bancaOrgao);

        $createdBancaOrgao = $createdBancaOrgao->toArray();
        $this->assertArrayHasKey('id', $createdBancaOrgao);
        $this->assertNotNull($createdBancaOrgao['id'], 'Created BancaOrgao must have id specified');
        $this->assertNotNull(BancaOrgao::find($createdBancaOrgao['id']), 'BancaOrgao with given id must be in DB');
        $this->assertModelData($bancaOrgao, $createdBancaOrgao);
    }

    /**
     * @test read
     */
    public function test_read_banca_orgao()
    {
        $bancaOrgao = factory(BancaOrgao::class)->create();

        $dbBancaOrgao = $this->bancaOrgaoRepo->find($bancaOrgao->id);

        $dbBancaOrgao = $dbBancaOrgao->toArray();
        $this->assertModelData($bancaOrgao->toArray(), $dbBancaOrgao);
    }

    /**
     * @test update
     */
    public function test_update_banca_orgao()
    {
        $bancaOrgao = factory(BancaOrgao::class)->create();
        $fakeBancaOrgao = factory(BancaOrgao::class)->make()->toArray();

        $updatedBancaOrgao = $this->bancaOrgaoRepo->update($fakeBancaOrgao, $bancaOrgao->id);

        $this->assertModelData($fakeBancaOrgao, $updatedBancaOrgao->toArray());
        $dbBancaOrgao = $this->bancaOrgaoRepo->find($bancaOrgao->id);
        $this->assertModelData($fakeBancaOrgao, $dbBancaOrgao->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_banca_orgao()
    {
        $bancaOrgao = factory(BancaOrgao::class)->create();

        $resp = $this->bancaOrgaoRepo->delete($bancaOrgao->id);

        $this->assertTrue($resp);
        $this->assertNull(BancaOrgao::find($bancaOrgao->id), 'BancaOrgao should not exist in DB');
    }
}
