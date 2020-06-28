<?php namespace Tests\Repositories;

use App\Models\Assunto;
use App\Repositories\AssuntoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AssuntoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AssuntoRepository
     */
    protected $assuntoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->assuntoRepo = \App::make(AssuntoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_assunto()
    {
        $assunto = factory(Assunto::class)->make()->toArray();

        $createdAssunto = $this->assuntoRepo->create($assunto);

        $createdAssunto = $createdAssunto->toArray();
        $this->assertArrayHasKey('id', $createdAssunto);
        $this->assertNotNull($createdAssunto['id'], 'Created Assunto must have id specified');
        $this->assertNotNull(Assunto::find($createdAssunto['id']), 'Assunto with given id must be in DB');
        $this->assertModelData($assunto, $createdAssunto);
    }

    /**
     * @test read
     */
    public function test_read_assunto()
    {
        $assunto = factory(Assunto::class)->create();

        $dbAssunto = $this->assuntoRepo->find($assunto->id);

        $dbAssunto = $dbAssunto->toArray();
        $this->assertModelData($assunto->toArray(), $dbAssunto);
    }

    /**
     * @test update
     */
    public function test_update_assunto()
    {
        $assunto = factory(Assunto::class)->create();
        $fakeAssunto = factory(Assunto::class)->make()->toArray();

        $updatedAssunto = $this->assuntoRepo->update($fakeAssunto, $assunto->id);

        $this->assertModelData($fakeAssunto, $updatedAssunto->toArray());
        $dbAssunto = $this->assuntoRepo->find($assunto->id);
        $this->assertModelData($fakeAssunto, $dbAssunto->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_assunto()
    {
        $assunto = factory(Assunto::class)->create();

        $resp = $this->assuntoRepo->delete($assunto->id);

        $this->assertTrue($resp);
        $this->assertNull(Assunto::find($assunto->id), 'Assunto should not exist in DB');
    }
}
