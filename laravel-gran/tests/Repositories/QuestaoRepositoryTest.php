<?php namespace Tests\Repositories;

use App\Models\Questao;
use App\Repositories\QuestaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class QuestaoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuestaoRepository
     */
    protected $questaoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->questaoRepo = \App::make(QuestaoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_questao()
    {
        $questao = factory(Questao::class)->make()->toArray();

        $createdQuestao = $this->questaoRepo->create($questao);

        $createdQuestao = $createdQuestao->toArray();
        $this->assertArrayHasKey('id', $createdQuestao);
        $this->assertNotNull($createdQuestao['id'], 'Created Questao must have id specified');
        $this->assertNotNull(Questao::find($createdQuestao['id']), 'Questao with given id must be in DB');
        $this->assertModelData($questao, $createdQuestao);
    }

    /**
     * @test read
     */
    public function test_read_questao()
    {
        $questao = factory(Questao::class)->create();

        $dbQuestao = $this->questaoRepo->find($questao->id);

        $dbQuestao = $dbQuestao->toArray();
        $this->assertModelData($questao->toArray(), $dbQuestao);
    }

    /**
     * @test update
     */
    public function test_update_questao()
    {
        $questao = factory(Questao::class)->create();
        $fakeQuestao = factory(Questao::class)->make()->toArray();

        $updatedQuestao = $this->questaoRepo->update($fakeQuestao, $questao->id);

        $this->assertModelData($fakeQuestao, $updatedQuestao->toArray());
        $dbQuestao = $this->questaoRepo->find($questao->id);
        $this->assertModelData($fakeQuestao, $dbQuestao->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_questao()
    {
        $questao = factory(Questao::class)->create();

        $resp = $this->questaoRepo->delete($questao->id);

        $this->assertTrue($resp);
        $this->assertNull(Questao::find($questao->id), 'Questao should not exist in DB');
    }
}
