@extends('layouts.app')
@section('tile', 'Clientes')
@section('content')
<h1 class=" cabecalho text-center"><b>Cadastro de Clientes</b> </h1>
<div class="container my-3">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div><br/>
    @endif
    <form class="col-10 mx-auto" method="POST"  action="{{route('cliente.store')}}">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <label for="nome"> Nome </label>
                <input type="nome" class="form-control" name="nome" id="nome"  autofocus required>
            </div>
            <div class="col-sm-4">
                <label for="sobrenome"> Sobrenome </label>
                <input type="sobrenome" class="form-control" name="sobrenome" id="sobrenome"  autofocus required>
            </div>
            <div class="col-sm-4">
                <label for="dt_nasc"> Data de Nascimento </label>
                <input type="date" class="form-control" name="dt_nasc" id="dt_nasc"  autofocus required>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-sm-4">
                <label for="sexo">Sexo</label>
                <select class="custom-select my-1 mr-sm-2" name="sexo" id="sexo">
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="indefinido">Indefinido</option>
                  </select>
            </div>
            <div class="col-sm-4">
                <label for="email"> E-Mail </label>
                <input type="email" class="form-control" name="email" id="email"  autofocus required>
            </div>
            <div class="col-sm-4">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf"  autofocus required>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-sm-3">
                <label for="celular">Celular</label>
                <input type="tel" class="form-control" name="celular" id="celular"  autofocus required>
            </div>
            <div class="col-sm-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" name="cep" id="cep"  autofocus required>
            </div>
            <div class="col-sm-4">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" name="endereco" id="endereco" autofocus required>
            </div>
            <div class="col-sm-2">
                <label for="cmpto">Complemento</label>
                <input type="text" class="form-control" name="cmpto" id="cmpto" autofocus>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-sm-3">
                <label for="numero">Número</label>
                <input type="numero" class="form-control" name="numero" id="numero" autofocus required>
            </div>
            <div class="col-sm-3">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="bairro" autofocus required>
            </div>
            <div class="col-sm-3">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="cidade" autofocus required>
            </div>
            <div class="col-sm-3">
                <label for="estado">Estado</label>
                <select class="custom-select my-1 mr-sm-2" name="estado" id="estado" required>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">M Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">R. Gde do Norte</option>
                    <option value="RS">R. Gde do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
        <a href="{{route('cliente.index')}}" class="btn btn-sm btn-danger" >Cancelar</a>
        </div>
    </form>
</div>
@endsection


