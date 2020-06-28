<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ItemQuestoes;

class ItemQuestoesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_item_questoes()
    {
        $itemQuestoes = factory(ItemQuestoes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/item_questoes', $itemQuestoes
        );

        $this->assertApiResponse($itemQuestoes);
    }

    /**
     * @test
     */
    public function test_read_item_questoes()
    {
        $itemQuestoes = factory(ItemQuestoes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/item_questoes/'.$itemQuestoes->id
        );

        $this->assertApiResponse($itemQuestoes->toArray());
    }

    /**
     * @test
     */
    public function test_update_item_questoes()
    {
        $itemQuestoes = factory(ItemQuestoes::class)->create();
        $editedItemQuestoes = factory(ItemQuestoes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/item_questoes/'.$itemQuestoes->id,
            $editedItemQuestoes
        );

        $this->assertApiResponse($editedItemQuestoes);
    }

    /**
     * @test
     */
    public function test_delete_item_questoes()
    {
        $itemQuestoes = factory(ItemQuestoes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/item_questoes/'.$itemQuestoes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/item_questoes/'.$itemQuestoes->id
        );

        $this->response->assertStatus(404);
    }
}
