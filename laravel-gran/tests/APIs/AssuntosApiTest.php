<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Assuntos;

class AssuntosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_assuntos()
    {
        $assuntos = factory(Assuntos::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/assuntos', $assuntos
        );

        $this->assertApiResponse($assuntos);
    }

    /**
     * @test
     */
    public function test_read_assuntos()
    {
        $assuntos = factory(Assuntos::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/assuntos/'.$assuntos->id
        );

        $this->assertApiResponse($assuntos->toArray());
    }

    /**
     * @test
     */
    public function test_update_assuntos()
    {
        $assuntos = factory(Assuntos::class)->create();
        $editedAssuntos = factory(Assuntos::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/assuntos/'.$assuntos->id,
            $editedAssuntos
        );

        $this->assertApiResponse($editedAssuntos);
    }

    /**
     * @test
     */
    public function test_delete_assuntos()
    {
        $assuntos = factory(Assuntos::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/assuntos/'.$assuntos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/assuntos/'.$assuntos->id
        );

        $this->response->assertStatus(404);
    }
}
