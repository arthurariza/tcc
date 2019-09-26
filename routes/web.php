<?php

Route::get('/', 'Controller@home')->name('home');

Route::prefix('produto')->group(function () {
    Route::get('listar', 'ProdutoController@listarProdutos')->name('listarProdutos');
    Route::get('cadastrar', 'ProdutoController@cadastrarProduto')->name('cadastrarProduto');
    Route::post('cadastrarR', 'ProdutoController@cadastrarProdutoR')->name('cadastrarProdutoR')->middleware('valor');
    Route::get('deletar/{id}', 'ProdutoController@deletarProduto')->name('deletarProduto');
    Route::get('editar/{id}', 'ProdutoController@editarProduto')->name('editarProduto');
    Route::post('editarR','ProdutoController@editarProdutoR')->name('editarProdutoR')->middleware('valor');
});
