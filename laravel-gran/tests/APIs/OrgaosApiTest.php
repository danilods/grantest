<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Orgaos;

class OrgaosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_orgaos()
    {
        $orgaos = factory(Orgaos::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/orgaos', $orgaos
        );

        $this->assertApiResponse($orgaos);
    }

    /**
     * @test
     */
    public function test_read_orgaos()
    {
        $orgaos = factory(Orgaos::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/orgaos/'.$orgaos->id
        );

        $this->assertApiResponse($orgaos->toArray());
    }

    /**
     * @test
     */
    public function test_update_orgaos()
    {
        $orgaos = factory(Orgaos::class)->create();
        $editedOrgaos = factory(Orgaos::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/orgaos/'.$orgaos->id,
            $editedOrgaos
        );

        $this->assertApiResponse($editedOrgaos);
    }

    /**
     * @test
     */
    public function test_delete_orgaos()
    {
        $orgaos = factory(Orgaos::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/orgaos/'.$orgaos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/orgaos/'.$orgaos->id
        );

        $this->response->assertStatus(404);
    }
}
