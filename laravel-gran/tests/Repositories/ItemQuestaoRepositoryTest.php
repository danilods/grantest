<?php namespace Tests\Repositories;

use App\Models\ItemQuestao;
use App\Repositories\ItemQuestaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ItemQuestaoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ItemQuestaoRepository
     */
    protected $itemQuestaoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->itemQuestaoRepo = \App::make(ItemQuestaoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_item_questao()
    {
        $itemQuestao = factory(ItemQuestao::class)->make()->toArray();

        $createdItemQuestao = $this->itemQuestaoRepo->create($itemQuestao);

        $createdItemQuestao = $createdItemQuestao->toArray();
        $this->assertArrayHasKey('id', $createdItemQuestao);
        $this->assertNotNull($createdItemQuestao['id'], 'Created ItemQuestao must have id specified');
        $this->assertNotNull(ItemQuestao::find($createdItemQuestao['id']), 'ItemQuestao with given id must be in DB');
        $this->assertModelData($itemQuestao, $createdItemQuestao);
    }

    /**
     * @test read
     */
    public function test_read_item_questao()
    {
        $itemQuestao = factory(ItemQuestao::class)->create();

        $dbItemQuestao = $this->itemQuestaoRepo->find($itemQuestao->id);

        $dbItemQuestao = $dbItemQuestao->toArray();
        $this->assertModelData($itemQuestao->toArray(), $dbItemQuestao);
    }

    /**
     * @test update
     */
    public function test_update_item_questao()
    {
        $itemQuestao = factory(ItemQuestao::class)->create();
        $fakeItemQuestao = factory(ItemQuestao::class)->make()->toArray();

        $updatedItemQuestao = $this->itemQuestaoRepo->update($fakeItemQuestao, $itemQuestao->id);

        $this->assertModelData($fakeItemQuestao, $updatedItemQuestao->toArray());
        $dbItemQuestao = $this->itemQuestaoRepo->find($itemQuestao->id);
        $this->assertModelData($fakeItemQuestao, $dbItemQuestao->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_item_questao()
    {
        $itemQuestao = factory(ItemQuestao::class)->create();

        $resp = $this->itemQuestaoRepo->delete($itemQuestao->id);

        $this->assertTrue($resp);
        $this->assertNull(ItemQuestao::find($itemQuestao->id), 'ItemQuestao should not exist in DB');
    }
}
