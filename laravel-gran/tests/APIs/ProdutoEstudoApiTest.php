<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProdutoEstudo;

class ProdutoEstudoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_produto_estudo()
    {
        $produtoEstudo = factory(ProdutoEstudo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/produto_estudos', $produtoEstudo
        );

        $this->assertApiResponse($produtoEstudo);
    }

    /**
     * @test
     */
    public function test_read_produto_estudo()
    {
        $produtoEstudo = factory(ProdutoEstudo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/produto_estudos/'.$produtoEstudo->id
        );

        $this->assertApiResponse($produtoEstudo->toArray());
    }

    /**
     * @test
     */
    public function test_update_produto_estudo()
    {
        $produtoEstudo = factory(ProdutoEstudo::class)->create();
        $editedProdutoEstudo = factory(ProdutoEstudo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/produto_estudos/'.$produtoEstudo->id,
            $editedProdutoEstudo
        );

        $this->assertApiResponse($editedProdutoEstudo);
    }

    /**
     * @test
     */
    public function test_delete_produto_estudo()
    {
        $produtoEstudo = factory(ProdutoEstudo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/produto_estudos/'.$produtoEstudo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/produto_estudos/'.$produtoEstudo->id
        );

        $this->response->assertStatus(404);
    }
}
