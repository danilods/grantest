<?php namespace Tests\Repositories;

use App\Models\Questoes;
use App\Repositories\QuestoesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class QuestoesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuestoesRepository
     */
    protected $questoesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->questoesRepo = \App::make(QuestoesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_questoes()
    {
        $questoes = factory(Questoes::class)->make()->toArray();

        $createdQuestoes = $this->questoesRepo->create($questoes);

        $createdQuestoes = $createdQuestoes->toArray();
        $this->assertArrayHasKey('id', $createdQuestoes);
        $this->assertNotNull($createdQuestoes['id'], 'Created Questoes must have id specified');
        $this->assertNotNull(Questoes::find($createdQuestoes['id']), 'Questoes with given id must be in DB');
        $this->assertModelData($questoes, $createdQuestoes);
    }

    /**
     * @test read
     */
    public function test_read_questoes()
    {
        $questoes = factory(Questoes::class)->create();

        $dbQuestoes = $this->questoesRepo->find($questoes->id);

        $dbQuestoes = $dbQuestoes->toArray();
        $this->assertModelData($questoes->toArray(), $dbQuestoes);
    }

    /**
     * @test update
     */
    public function test_update_questoes()
    {
        $questoes = factory(Questoes::class)->create();
        $fakeQuestoes = factory(Questoes::class)->make()->toArray();

        $updatedQuestoes = $this->questoesRepo->update($fakeQuestoes, $questoes->id);

        $this->assertModelData($fakeQuestoes, $updatedQuestoes->toArray());
        $dbQuestoes = $this->questoesRepo->find($questoes->id);
        $this->assertModelData($fakeQuestoes, $dbQuestoes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_questoes()
    {
        $questoes = factory(Questoes::class)->create();

        $resp = $this->questoesRepo->delete($questoes->id);

        $this->assertTrue($resp);
        $this->assertNull(Questoes::find($questoes->id), 'Questoes should not exist in DB');
    }
}
