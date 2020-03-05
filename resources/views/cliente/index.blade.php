@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
<h1 class=" cabecalho  text-center"><b>Clientes</b> </h1>
@if($mensagem = Session::get('sucess'))
<div class="alert alert-success">
    <p class="text-center">{{$mensagem}}</p></div>
@endif
<div class="container my-3">
   <div class="table-responsive-lg">
       <table class="table table-hover mt-1 text-center">
           <thead class="thead-dark">
               <tr>
                   <th>Nome</th>
                   <th>Sobrenome</th>
                   <th>E-mail</th>
                   <th>CPF</th>
                   <th>Celular</th>
                   <th>Editar</th>
                   <th>Detalhe</th>
                   <th>Excluir</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($clientes as $cliente)
                    <tr>
                    <th>{{$cliente -> nome}}</th>
                    <th>{{$cliente -> sobrenome}}</th>
                    <th>{{$cliente -> email}}</th>
                    <th>{{$cliente -> cpf}}</th>
                    <th>{{$cliente -> celular}}</th>
                    <th><a href="{{route('cliente.edit', $cliente -> id)}}" class="btn btn-sm btn-primary">Editar</a></th>
                    <th><a href="{{route('cliente.show', $cliente -> id)}}" class="btn btn-sm btn-success">Detalhe</a></th>
                    <th><button class="btn btn-sm btn-danger" type="button" data-dismiss="modal" data-toggle="modal" data-target="#modalExcluir">Excluir</button></th>
                    </tr>
               @endforeach
           </tbody>
           <div class="modal fade" id="modalExcluir" tabindex="-1" {{ $cliente -> id }} role="dialog" aria-labelledby="modalExcluir" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Deseja mesmo excluir o cliente?</h4>
                      </div>
                    <div class="modal-body">
                        <p>{{$cliente->nome}} {{$cliente->sobrenome}}</p>

                    </div>
                    <div class="modal-footer">
                        @if(isset($cliente))
                        <form method="post" action="{{route('cliente.destroy', $cliente->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$cliente->id}}">
                            <button type="submit" class="btn btn-primary">Sim</button>
                        </form>
                        @endif
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
       </table>
       <div class="d-flex justify-content-center">
        <a href="{{route('cliente.create')}}" class="btn btn-sm btn-primary mr-2">Novo</a>
        <a href="" class="btn btn-sm btn-danger">Voltar</a>
      </div>
      {{ $clientes->links()}}
   </div>
</div>
@endsection



