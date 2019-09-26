@extends('template')

@section('content')
<h2>Listar Produtos</h2>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>        
        @foreach ($produtos as $produto)
            <tr>
                <th scope="row">{{$produto->id}}</th>    
                <td>{{$produto->nome}}</td>
                <td>{{$produto->valor}}</td>
                <td><a href="{{Route('editarProduto', $produto->id )}}" class="fas fa-edit"></a></td>
                <td><a href="{{Route('deletarProduto', $produto->id )}}" class="fas fa-trash"></a></td>
            </tr> 
        @endforeach              
    </tbody>
</table>    
@endsection