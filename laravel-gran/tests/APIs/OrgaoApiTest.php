<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Orgao;

class OrgaoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_orgao()
    {
        $orgao = factory(Orgao::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/orgaos', $orgao
        );

        $this->assertApiResponse($orgao);
    }

    /**
     * @test
     */
    public function test_read_orgao()
    {
        $orgao = factory(Orgao::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/orgaos/'.$orgao->id
        );

        $this->assertApiResponse($orgao->toArray());
    }

    /**
     * @test
     */
    public function test_update_orgao()
    {
        $orgao = factory(Orgao::class)->create();
        $editedOrgao = factory(Orgao::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/orgaos/'.$orgao->id,
            $editedOrgao
        );

        $this->assertApiResponse($editedOrgao);
    }

    /**
     * @test
     */
    public function test_delete_orgao()
    {
        $orgao = factory(Orgao::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/orgaos/'.$orgao->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/orgaos/'.$orgao->id
        );

        $this->response->assertStatus(404);
    }
}
