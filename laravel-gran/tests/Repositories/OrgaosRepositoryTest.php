<?php namespace Tests\Repositories;

use App\Models\Orgaos;
use App\Repositories\OrgaosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OrgaosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OrgaosRepository
     */
    protected $orgaosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->orgaosRepo = \App::make(OrgaosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_orgaos()
    {
        $orgaos = factory(Orgaos::class)->make()->toArray();

        $createdOrgaos = $this->orgaosRepo->create($orgaos);

        $createdOrgaos = $createdOrgaos->toArray();
        $this->assertArrayHasKey('id', $createdOrgaos);
        $this->assertNotNull($createdOrgaos['id'], 'Created Orgaos must have id specified');
        $this->assertNotNull(Orgaos::find($createdOrgaos['id']), 'Orgaos with given id must be in DB');
        $this->assertModelData($orgaos, $createdOrgaos);
    }

    /**
     * @test read
     */
    public function test_read_orgaos()
    {
        $orgaos = factory(Orgaos::class)->create();

        $dbOrgaos = $this->orgaosRepo->find($orgaos->id);

        $dbOrgaos = $dbOrgaos->toArray();
        $this->assertModelData($orgaos->toArray(), $dbOrgaos);
    }

    /**
     * @test update
     */
    public function test_update_orgaos()
    {
        $orgaos = factory(Orgaos::class)->create();
        $fakeOrgaos = factory(Orgaos::class)->make()->toArray();

        $updatedOrgaos = $this->orgaosRepo->update($fakeOrgaos, $orgaos->id);

        $this->assertModelData($fakeOrgaos, $updatedOrgaos->toArray());
        $dbOrgaos = $this->orgaosRepo->find($orgaos->id);
        $this->assertModelData($fakeOrgaos, $dbOrgaos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_orgaos()
    {
        $orgaos = factory(Orgaos::class)->create();

        $resp = $this->orgaosRepo->delete($orgaos->id);

        $this->assertTrue($resp);
        $this->assertNull(Orgaos::find($orgaos->id), 'Orgaos should not exist in DB');
    }
}
