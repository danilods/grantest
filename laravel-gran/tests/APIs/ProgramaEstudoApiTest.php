<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProgramaEstudo;

class ProgramaEstudoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_programa_estudo()
    {
        $programaEstudo = factory(ProgramaEstudo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/programa_estudos', $programaEstudo
        );

        $this->assertApiResponse($programaEstudo);
    }

    /**
     * @test
     */
    public function test_read_programa_estudo()
    {
        $programaEstudo = factory(ProgramaEstudo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/programa_estudos/'.$programaEstudo->id
        );

        $this->assertApiResponse($programaEstudo->toArray());
    }

    /**
     * @test
     */
    public function test_update_programa_estudo()
    {
        $programaEstudo = factory(ProgramaEstudo::class)->create();
        $editedProgramaEstudo = factory(ProgramaEstudo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/programa_estudos/'.$programaEstudo->id,
            $editedProgramaEstudo
        );

        $this->assertApiResponse($editedProgramaEstudo);
    }

    /**
     * @test
     */
    public function test_delete_programa_estudo()
    {
        $programaEstudo = factory(ProgramaEstudo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/programa_estudos/'.$programaEstudo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/programa_estudos/'.$programaEstudo->id
        );

        $this->response->assertStatus(404);
    }
}
