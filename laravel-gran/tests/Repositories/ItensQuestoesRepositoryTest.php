<?php namespace Tests\Repositories;

use App\Models\ItensQuestoes;
use App\Repositories\ItensQuestoesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ItensQuestoesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ItensQuestoesRepository
     */
    protected $itensQuestoesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->itensQuestoesRepo = \App::make(ItensQuestoesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_itens_questoes()
    {
        $itensQuestoes = factory(ItensQuestoes::class)->make()->toArray();

        $createdItensQuestoes = $this->itensQuestoesRepo->create($itensQuestoes);

        $createdItensQuestoes = $createdItensQuestoes->toArray();
        $this->assertArrayHasKey('id', $createdItensQuestoes);
        $this->assertNotNull($createdItensQuestoes['id'], 'Created ItensQuestoes must have id specified');
        $this->assertNotNull(ItensQuestoes::find($createdItensQuestoes['id']), 'ItensQuestoes with given id must be in DB');
        $this->assertModelData($itensQuestoes, $createdItensQuestoes);
    }

    /**
     * @test read
     */
    public function test_read_itens_questoes()
    {
        $itensQuestoes = factory(ItensQuestoes::class)->create();

        $dbItensQuestoes = $this->itensQuestoesRepo->find($itensQuestoes->id);

        $dbItensQuestoes = $dbItensQuestoes->toArray();
        $this->assertModelData($itensQuestoes->toArray(), $dbItensQuestoes);
    }

    /**
     * @test update
     */
    public function test_update_itens_questoes()
    {
        $itensQuestoes = factory(ItensQuestoes::class)->create();
        $fakeItensQuestoes = factory(ItensQuestoes::class)->make()->toArray();

        $updatedItensQuestoes = $this->itensQuestoesRepo->update($fakeItensQuestoes, $itensQuestoes->id);

        $this->assertModelData($fakeItensQuestoes, $updatedItensQuestoes->toArray());
        $dbItensQuestoes = $this->itensQuestoesRepo->find($itensQuestoes->id);
        $this->assertModelData($fakeItensQuestoes, $dbItensQuestoes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_itens_questoes()
    {
        $itensQuestoes = factory(ItensQuestoes::class)->create();

        $resp = $this->itensQuestoesRepo->delete($itensQuestoes->id);

        $this->assertTrue($resp);
        $this->assertNull(ItensQuestoes::find($itensQuestoes->id), 'ItensQuestoes should not exist in DB');
    }
}
