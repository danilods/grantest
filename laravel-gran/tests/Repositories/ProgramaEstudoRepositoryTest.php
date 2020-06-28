<?php namespace Tests\Repositories;

use App\Models\ProgramaEstudo;
use App\Repositories\ProgramaEstudoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProgramaEstudoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProgramaEstudoRepository
     */
    protected $programaEstudoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->programaEstudoRepo = \App::make(ProgramaEstudoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_programa_estudo()
    {
        $programaEstudo = factory(ProgramaEstudo::class)->make()->toArray();

        $createdProgramaEstudo = $this->programaEstudoRepo->create($programaEstudo);

        $createdProgramaEstudo = $createdProgramaEstudo->toArray();
        $this->assertArrayHasKey('id', $createdProgramaEstudo);
        $this->assertNotNull($createdProgramaEstudo['id'], 'Created ProgramaEstudo must have id specified');
        $this->assertNotNull(ProgramaEstudo::find($createdProgramaEstudo['id']), 'ProgramaEstudo with given id must be in DB');
        $this->assertModelData($programaEstudo, $createdProgramaEstudo);
    }

    /**
     * @test read
     */
    public function test_read_programa_estudo()
    {
        $programaEstudo = factory(ProgramaEstudo::class)->create();

        $dbProgramaEstudo = $this->programaEstudoRepo->find($programaEstudo->id);

        $dbProgramaEstudo = $dbProgramaEstudo->toArray();
        $this->assertModelData($programaEstudo->toArray(), $dbProgramaEstudo);
    }

    /**
     * @test update
     */
    public function test_update_programa_estudo()
    {
        $programaEstudo = factory(ProgramaEstudo::class)->create();
        $fakeProgramaEstudo = factory(ProgramaEstudo::class)->make()->toArray();

        $updatedProgramaEstudo = $this->programaEstudoRepo->update($fakeProgramaEstudo, $programaEstudo->id);

        $this->assertModelData($fakeProgramaEstudo, $updatedProgramaEstudo->toArray());
        $dbProgramaEstudo = $this->programaEstudoRepo->find($programaEstudo->id);
        $this->assertModelData($fakeProgramaEstudo, $dbProgramaEstudo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_programa_estudo()
    {
        $programaEstudo = factory(ProgramaEstudo::class)->create();

        $resp = $this->programaEstudoRepo->delete($programaEstudo->id);

        $this->assertTrue($resp);
        $this->assertNull(ProgramaEstudo::find($programaEstudo->id), 'ProgramaEstudo should not exist in DB');
    }
}
