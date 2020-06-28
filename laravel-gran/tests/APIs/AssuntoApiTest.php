<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Assunto;

class AssuntoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_assunto()
    {
        $assunto = factory(Assunto::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/assuntos', $assunto
        );

        $this->assertApiResponse($assunto);
    }

    /**
     * @test
     */
    public function test_read_assunto()
    {
        $assunto = factory(Assunto::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/assuntos/'.$assunto->id
        );

        $this->assertApiResponse($assunto->toArray());
    }

    /**
     * @test
     */
    public function test_update_assunto()
    {
        $assunto = factory(Assunto::class)->create();
        $editedAssunto = factory(Assunto::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/assuntos/'.$assunto->id,
            $editedAssunto
        );

        $this->assertApiResponse($editedAssunto);
    }

    /**
     * @test
     */
    public function test_delete_assunto()
    {
        $assunto = factory(Assunto::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/assuntos/'.$assunto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/assuntos/'.$assunto->id
        );

        $this->response->assertStatus(404);
    }
}
