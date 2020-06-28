<?php namespace Tests\Repositories;

use App\Models\ProdutoEstudo;
use App\Repositories\ProdutoEstudoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProdutoEstudoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProdutoEstudoRepository
     */
    protected $produtoEstudoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->produtoEstudoRepo = \App::make(ProdutoEstudoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_produto_estudo()
    {
        $produtoEstudo = factory(ProdutoEstudo::class)->make()->toArray();

        $createdProdutoEstudo = $this->produtoEstudoRepo->create($produtoEstudo);

        $createdProdutoEstudo = $createdProdutoEstudo->toArray();
        $this->assertArrayHasKey('id', $createdProdutoEstudo);
        $this->assertNotNull($createdProdutoEstudo['id'], 'Created ProdutoEstudo must have id specified');
        $this->assertNotNull(ProdutoEstudo::find($createdProdutoEstudo['id']), 'ProdutoEstudo with given id must be in DB');
        $this->assertModelData($produtoEstudo, $createdProdutoEstudo);
    }

    /**
     * @test read
     */
    public function test_read_produto_estudo()
    {
        $produtoEstudo = factory(ProdutoEstudo::class)->create();

        $dbProdutoEstudo = $this->produtoEstudoRepo->find($produtoEstudo->id);

        $dbProdutoEstudo = $dbProdutoEstudo->toArray();
        $this->assertModelData($produtoEstudo->toArray(), $dbProdutoEstudo);
    }

    /**
     * @test update
     */
    public function test_update_produto_estudo()
    {
        $produtoEstudo = factory(ProdutoEstudo::class)->create();
        $fakeProdutoEstudo = factory(ProdutoEstudo::class)->make()->toArray();

        $updatedProdutoEstudo = $this->produtoEstudoRepo->update($fakeProdutoEstudo, $produtoEstudo->id);

        $this->assertModelData($fakeProdutoEstudo, $updatedProdutoEstudo->toArray());
        $dbProdutoEstudo = $this->produtoEstudoRepo->find($produtoEstudo->id);
        $this->assertModelData($fakeProdutoEstudo, $dbProdutoEstudo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_produto_estudo()
    {
        $produtoEstudo = factory(ProdutoEstudo::class)->create();

        $resp = $this->produtoEstudoRepo->delete($produtoEstudo->id);

        $this->assertTrue($resp);
        $this->assertNull(ProdutoEstudo::find($produtoEstudo->id), 'ProdutoEstudo should not exist in DB');
    }
}
