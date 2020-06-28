<?php namespace Tests\Repositories;

use App\Models\Orgao;
use App\Repositories\OrgaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OrgaoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OrgaoRepository
     */
    protected $orgaoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->orgaoRepo = \App::make(OrgaoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_orgao()
    {
        $orgao = factory(Orgao::class)->make()->toArray();

        $createdOrgao = $this->orgaoRepo->create($orgao);

        $createdOrgao = $createdOrgao->toArray();
        $this->assertArrayHasKey('id', $createdOrgao);
        $this->assertNotNull($createdOrgao['id'], 'Created Orgao must have id specified');
        $this->assertNotNull(Orgao::find($createdOrgao['id']), 'Orgao with given id must be in DB');
        $this->assertModelData($orgao, $createdOrgao);
    }

    /**
     * @test read
     */
    public function test_read_orgao()
    {
        $orgao = factory(Orgao::class)->create();

        $dbOrgao = $this->orgaoRepo->find($orgao->id);

        $dbOrgao = $dbOrgao->toArray();
        $this->assertModelData($orgao->toArray(), $dbOrgao);
    }

    /**
     * @test update
     */
    public function test_update_orgao()
    {
        $orgao = factory(Orgao::class)->create();
        $fakeOrgao = factory(Orgao::class)->make()->toArray();

        $updatedOrgao = $this->orgaoRepo->update($fakeOrgao, $orgao->id);

        $this->assertModelData($fakeOrgao, $updatedOrgao->toArray());
        $dbOrgao = $this->orgaoRepo->find($orgao->id);
        $this->assertModelData($fakeOrgao, $dbOrgao->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_orgao()
    {
        $orgao = factory(Orgao::class)->create();

        $resp = $this->orgaoRepo->delete($orgao->id);

        $this->assertTrue($resp);
        $this->assertNull(Orgao::find($orgao->id), 'Orgao should not exist in DB');
    }
}
