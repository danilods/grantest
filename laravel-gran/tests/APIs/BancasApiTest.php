<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bancas;

class BancasApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bancas()
    {
        $bancas = factory(Bancas::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bancas', $bancas
        );

        $this->assertApiResponse($bancas);
    }

    /**
     * @test
     */
    public function test_read_bancas()
    {
        $bancas = factory(Bancas::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bancas/'.$bancas->id
        );

        $this->assertApiResponse($bancas->toArray());
    }

    /**
     * @test
     */
    public function test_update_bancas()
    {
        $bancas = factory(Bancas::class)->create();
        $editedBancas = factory(Bancas::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bancas/'.$bancas->id,
            $editedBancas
        );

        $this->assertApiResponse($editedBancas);
    }

    /**
     * @test
     */
    public function test_delete_bancas()
    {
        $bancas = factory(Bancas::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bancas/'.$bancas->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bancas/'.$bancas->id
        );

        $this->response->assertStatus(404);
    }
}
