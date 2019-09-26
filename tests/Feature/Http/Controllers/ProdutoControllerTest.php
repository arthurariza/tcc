<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Produto;

class ProdutoControllerTest extends TestCase
{
    use RefreshDatabase;    
    
      public function testRedirectViewCorretaCadastro(){
        $response = $this->post(route('cadastrarProdutoR'), [
            'nome' => 'Produto 1',
            'valor' => 500
        ]);
        
         $response->assertRedirect(route('listarProdutos'));         
    }

    public function testRotaListarProduto(){
        $response = $this->get(route('listarProdutos'));

        $response->assertViewIs('listarProdutos');
    }

    
    public function testProdutoCadastrado() {
        $response = $this->post(route('cadastrarProdutoR'), [
            'nome' => 'Produto 2',
            'valor' => 500
        ]);

        $this->assertDatabaseHas('produtos', [
            'nome' => 'Produto 2',
            'valor' => 500
        ]);
    } 
    
    
    public function testValorEstaNaView() {
        $produto = Produto::create([
            'nome' => 'Produto 3',
            'valor' => 500
        ]);

        $response = $this->get(route('listarProdutos'));

        $response->assertSeeText('Produto 3')
                 ->assertSeeText('500');
    } 
    
    
    public function testProdutoDeletado() {
        $produto = Produto::create([
            'nome' => 'Produto 4',
            'valor' => 500
        ]);

        $response = $this->get(route('deletarProduto', $produto->id));

        $this->assertDatabaseMissing('produtos', [
            'nome' => 'Produto 4',
            'valor' => 500
        ]);
    }

    public function testMiddlewareValor() {
        $response = $this->post(route('cadastrarProdutoR'), [
            'nome' => 'Produto 5',
            'valor' => -1
        ]);

        $this->assertDatabaseMissing('produtos', [
            'nome' => 'Produto 5',
            'valor' => -1
        ]);
    }
        
}
