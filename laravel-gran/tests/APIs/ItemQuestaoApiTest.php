<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ItemQuestao;

class ItemQuestaoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_item_questao()
    {
        $itemQuestao = factory(ItemQuestao::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/item_questaos', $itemQuestao
        );

        $this->assertApiResponse($itemQuestao);
    }

    /**
     * @test
     */
    public function test_read_item_questao()
    {
        $itemQuestao = factory(ItemQuestao::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/item_questaos/'.$itemQuestao->id
        );

        $this->assertApiResponse($itemQuestao->toArray());
    }

    /**
     * @test
     */
    public function test_update_item_questao()
    {
        $itemQuestao = factory(ItemQuestao::class)->create();
        $editedItemQuestao = factory(ItemQuestao::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/item_questaos/'.$itemQuestao->id,
            $editedItemQuestao
        );

        $this->assertApiResponse($editedItemQuestao);
    }

    /**
     * @test
     */
    public function test_delete_item_questao()
    {
        $itemQuestao = factory(ItemQuestao::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/item_questaos/'.$itemQuestao->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/item_questaos/'.$itemQuestao->id
        );

        $this->response->assertStatus(404);
    }
}
