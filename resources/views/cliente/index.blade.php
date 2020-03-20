@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
<h1 class=" cabecalho  text-center"><b>Clientes</b> </h1>
@if($mensagem = Session::get('sucess'))
<div class="alert alert-success">
    <p class="text-center">{{$mensagem}}</p>
</div>
@endif
<div class="container my-3 col-sm-11">
   <div class="table-responsive-lg">
       <form action="{{route('cliente.search')}}" class="form-inline my-3 d-flex justify-content-center" >
        @csrf
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
       </form>
       <h3 class="text-center" id="retorno"></h3>
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
               <tr class="cliente-{{$cliente->id}}">
                        <th>{{$cliente -> nome}}</th>
                        <th>{{$cliente -> sobrenome}}</th>
                        <th>{{$cliente -> email}}</th>
                        <th>{{$cliente -> cpf}}</th>
                        <th>{{$cliente -> celular}}</th>
                        <th><a href="{{route('cliente.edit', $cliente -> id)}}" class="btn btn-sm btn-primary">Editar</a></th>
                        <th><a href="{{route('cliente.show', $cliente -> id)}}" class="btn btn-sm btn-success">Detalhe</a></th>
                    <th><a href="" class="btn btn-danger btn-modal btn-sm" data-toggle="modal" data-id="{{$cliente->id}}"  data-target="#modalExcluir">Excluir</a></th>
                    </tr>
               @endforeach
           </tbody>
       </table>
   </div>
    <!-- Modal -->
    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluir" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-body">
                    <h4 class="modal-tittle">Deseja mesmo excluir o cliente?</h4>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="hidden" id="id_cliente" name="id_cliente" >
                    <button type="submit" class="btn btn-primary btn-destroy">Sim</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>
       <div class="d-flex justify-content-center">
        <a href="{{route('cliente.create')}}" class="btn btn-sm btn-primary mr-2">Novo</a>
        <a href="" class="btn btn-sm btn-danger">Voltar</a>
       </div>
      {{ $clientes->links()}}
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            console.log('a pagina esta pronta');
        });

        $(document).delegate('.btn-modal', 'click', function(){
            var id_cliente = $(this).attr('data-id');
            $('#id_cliente').val(id_cliente);
        });

        $(document).delegate('.btn-destroy', 'click', function(){
            var id = $('#id_cliente').val();
            $.ajax({
                method:"DELETE",
                url: "/cliente/" + id,
                data: {
                    id: id,
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
                    $('#retorno').html(data);
                    $('#modalExcluir').modal('hide');
                    $('.cliente-' + id).remove();
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    </script>
@stop



