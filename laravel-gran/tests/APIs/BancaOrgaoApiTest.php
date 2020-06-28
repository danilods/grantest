<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BancaOrgao;

class BancaOrgaoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_banca_orgao()
    {
        $bancaOrgao = factory(BancaOrgao::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/banca_orgaos', $bancaOrgao
        );

        $this->assertApiResponse($bancaOrgao);
    }

    /**
     * @test
     */
    public function test_read_banca_orgao()
    {
        $bancaOrgao = factory(BancaOrgao::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/banca_orgaos/'.$bancaOrgao->id
        );

        $this->assertApiResponse($bancaOrgao->toArray());
    }

    /**
     * @test
     */
    public function test_update_banca_orgao()
    {
        $bancaOrgao = factory(BancaOrgao::class)->create();
        $editedBancaOrgao = factory(BancaOrgao::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/banca_orgaos/'.$bancaOrgao->id,
            $editedBancaOrgao
        );

        $this->assertApiResponse($editedBancaOrgao);
    }

    /**
     * @test
     */
    public function test_delete_banca_orgao()
    {
        $bancaOrgao = factory(BancaOrgao::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/banca_orgaos/'.$bancaOrgao->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/banca_orgaos/'.$bancaOrgao->id
        );

        $this->response->assertStatus(404);
    }
}
