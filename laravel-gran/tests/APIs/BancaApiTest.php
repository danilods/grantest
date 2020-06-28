<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Banca;

class BancaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_banca()
    {
        $banca = factory(Banca::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bancas', $banca
        );

        $this->assertApiResponse($banca);
    }

    /**
     * @test
     */
    public function test_read_banca()
    {
        $banca = factory(Banca::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bancas/'.$banca->id
        );

        $this->assertApiResponse($banca->toArray());
    }

    /**
     * @test
     */
    public function test_update_banca()
    {
        $banca = factory(Banca::class)->create();
        $editedBanca = factory(Banca::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bancas/'.$banca->id,
            $editedBanca
        );

        $this->assertApiResponse($editedBanca);
    }

    /**
     * @test
     */
    public function test_delete_banca()
    {
        $banca = factory(Banca::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bancas/'.$banca->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bancas/'.$banca->id
        );

        $this->response->assertStatus(404);
    }
}
