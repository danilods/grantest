<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Questao;

class QuestaoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_questao()
    {
        $questao = factory(Questao::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/questaos', $questao
        );

        $this->assertApiResponse($questao);
    }

    /**
     * @test
     */
    public function test_read_questao()
    {
        $questao = factory(Questao::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/questaos/'.$questao->id
        );

        $this->assertApiResponse($questao->toArray());
    }

    /**
     * @test
     */
    public function test_update_questao()
    {
        $questao = factory(Questao::class)->create();
        $editedQuestao = factory(Questao::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/questaos/'.$questao->id,
            $editedQuestao
        );

        $this->assertApiResponse($editedQuestao);
    }

    /**
     * @test
     */
    public function test_delete_questao()
    {
        $questao = factory(Questao::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/questaos/'.$questao->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/questaos/'.$questao->id
        );

        $this->response->assertStatus(404);
    }
}
