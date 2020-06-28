<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Questoes;

class QuestoesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_questoes()
    {
        $questoes = factory(Questoes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/questoes', $questoes
        );

        $this->assertApiResponse($questoes);
    }

    /**
     * @test
     */
    public function test_read_questoes()
    {
        $questoes = factory(Questoes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/questoes/'.$questoes->id
        );

        $this->assertApiResponse($questoes->toArray());
    }

    /**
     * @test
     */
    public function test_update_questoes()
    {
        $questoes = factory(Questoes::class)->create();
        $editedQuestoes = factory(Questoes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/questoes/'.$questoes->id,
            $editedQuestoes
        );

        $this->assertApiResponse($editedQuestoes);
    }

    /**
     * @test
     */
    public function test_delete_questoes()
    {
        $questoes = factory(Questoes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/questoes/'.$questoes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/questoes/'.$questoes->id
        );

        $this->response->assertStatus(404);
    }
}
