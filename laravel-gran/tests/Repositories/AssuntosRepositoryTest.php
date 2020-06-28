<?php namespace Tests\Repositories;

use App\Models\Assuntos;
use App\Repositories\AssuntosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AssuntosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AssuntosRepository
     */
    protected $assuntosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->assuntosRepo = \App::make(AssuntosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_assuntos()
    {
        $assuntos = factory(Assuntos::class)->make()->toArray();

        $createdAssuntos = $this->assuntosRepo->create($assuntos);

        $createdAssuntos = $createdAssuntos->toArray();
        $this->assertArrayHasKey('id', $createdAssuntos);
        $this->assertNotNull($createdAssuntos['id'], 'Created Assuntos must have id specified');
        $this->assertNotNull(Assuntos::find($createdAssuntos['id']), 'Assuntos with given id must be in DB');
        $this->assertModelData($assuntos, $createdAssuntos);
    }

    /**
     * @test read
     */
    public function test_read_assuntos()
    {
        $assuntos = factory(Assuntos::class)->create();

        $dbAssuntos = $this->assuntosRepo->find($assuntos->id);

        $dbAssuntos = $dbAssuntos->toArray();
        $this->assertModelData($assuntos->toArray(), $dbAssuntos);
    }

    /**
     * @test update
     */
    public function test_update_assuntos()
    {
        $assuntos = factory(Assuntos::class)->create();
        $fakeAssuntos = factory(Assuntos::class)->make()->toArray();

        $updatedAssuntos = $this->assuntosRepo->update($fakeAssuntos, $assuntos->id);

        $this->assertModelData($fakeAssuntos, $updatedAssuntos->toArray());
        $dbAssuntos = $this->assuntosRepo->find($assuntos->id);
        $this->assertModelData($fakeAssuntos, $dbAssuntos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_assuntos()
    {
        $assuntos = factory(Assuntos::class)->create();

        $resp = $this->assuntosRepo->delete($assuntos->id);

        $this->assertTrue($resp);
        $this->assertNull(Assuntos::find($assuntos->id), 'Assuntos should not exist in DB');
    }
}
