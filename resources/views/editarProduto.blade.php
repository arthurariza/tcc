@extends('template')

@section('content')
    <h2>Editar Produto</h2>   
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif     
    <form action="{{Route('editarProdutoR')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="id" value=" {{$produto->id}} ">
        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome" value=" {{$produto->nome}} ">
        </div>      
        <div class="form-group">
            <label for="valor">Valor do Produto</label>
            <input type="number" class="form-control" id="valor" name="valor" value="{{$produto->valor}}">
        </div>   
        <button class="btn-lg btn-block bg-dark" style="color:white">Editar</button>
    </form>
@endsection