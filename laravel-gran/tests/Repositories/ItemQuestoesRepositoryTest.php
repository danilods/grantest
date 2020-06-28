<?php namespace Tests\Repositories;

use App\Models\ItemQuestoes;
use App\Repositories\ItemQuestoesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ItemQuestoesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ItemQuestoesRepository
     */
    protected $itemQuestoesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->itemQuestoesRepo = \App::make(ItemQuestoesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_item_questoes()
    {
        $itemQuestoes = factory(ItemQuestoes::class)->make()->toArray();

        $createdItemQuestoes = $this->itemQuestoesRepo->create($itemQuestoes);

        $createdItemQuestoes = $createdItemQuestoes->toArray();
        $this->assertArrayHasKey('id', $createdItemQuestoes);
        $this->assertNotNull($createdItemQuestoes['id'], 'Created ItemQuestoes must have id specified');
        $this->assertNotNull(ItemQuestoes::find($createdItemQuestoes['id']), 'ItemQuestoes with given id must be in DB');
        $this->assertModelData($itemQuestoes, $createdItemQuestoes);
    }

    /**
     * @test read
     */
    public function test_read_item_questoes()
    {
        $itemQuestoes = factory(ItemQuestoes::class)->create();

        $dbItemQuestoes = $this->itemQuestoesRepo->find($itemQuestoes->id);

        $dbItemQuestoes = $dbItemQuestoes->toArray();
        $this->assertModelData($itemQuestoes->toArray(), $dbItemQuestoes);
    }

    /**
     * @test update
     */
    public function test_update_item_questoes()
    {
        $itemQuestoes = factory(ItemQuestoes::class)->create();
        $fakeItemQuestoes = factory(ItemQuestoes::class)->make()->toArray();

        $updatedItemQuestoes = $this->itemQuestoesRepo->update($fakeItemQuestoes, $itemQuestoes->id);

        $this->assertModelData($fakeItemQuestoes, $updatedItemQuestoes->toArray());
        $dbItemQuestoes = $this->itemQuestoesRepo->find($itemQuestoes->id);
        $this->assertModelData($fakeItemQuestoes, $dbItemQuestoes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_item_questoes()
    {
        $itemQuestoes = factory(ItemQuestoes::class)->create();

        $resp = $this->itemQuestoesRepo->delete($itemQuestoes->id);

        $this->assertTrue($resp);
        $this->assertNull(ItemQuestoes::find($itemQuestoes->id), 'ItemQuestoes should not exist in DB');
    }
}
