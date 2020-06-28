<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ItensQuestoes;

class ItensQuestoesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_itens_questoes()
    {
        $itensQuestoes = factory(ItensQuestoes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/itens_questoes', $itensQuestoes
        );

        $this->assertApiResponse($itensQuestoes);
    }

    /**
     * @test
     */
    public function test_read_itens_questoes()
    {
        $itensQuestoes = factory(ItensQuestoes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/itens_questoes/'.$itensQuestoes->id
        );

        $this->assertApiResponse($itensQuestoes->toArray());
    }

    /**
     * @test
     */
    public function test_update_itens_questoes()
    {
        $itensQuestoes = factory(ItensQuestoes::class)->create();
        $editedItensQuestoes = factory(ItensQuestoes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/itens_questoes/'.$itensQuestoes->id,
            $editedItensQuestoes
        );

        $this->assertApiResponse($editedItensQuestoes);
    }

    /**
     * @test
     */
    public function test_delete_itens_questoes()
    {
        $itensQuestoes = factory(ItensQuestoes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/itens_questoes/'.$itensQuestoes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/itens_questoes/'.$itensQuestoes->id
        );

        $this->response->assertStatus(404);
    }
}
