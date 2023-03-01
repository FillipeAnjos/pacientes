@extends('layouts.main')

@section('title', 'Pacientes')

    <style>
        
    </style>

@section('content')

    <br/>

    <div class="container">
        <div class="row">
            <div class="col">

                <div class="jumbotron">
                <h1>Pacientes!</h1>
                <hr/>
                <span><b>Obs</b>: Não foi criado o um sistema de <i>autenticação de usuários</i>, onde teoricamente eu me preocuparia 
                    em implementar onde cada usuário poderia ou não vizualidar determinadas telas.<br/>
                    Exemplo: A tela de cadastro com um possivel paciente teria acesso para cadastrar normalmente, 
                    porém ele não teria a visão da grid com todos os outros pacientes, podendo editar, excluir etc.<br/>
                    Procurei apenas realizar o máximo possivel do que foi pedido no desafio.
                </span>
                </div>

            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col">
                <span>Faça o <b>cadastro</b>, no link abaixo</span>
                <br/>
                <a href="/cadastropacientes">Cadastro</a>
            </div>
            <div class="col">
            </div>
        </div>

        <br/><br/>
    
        <form method="POST" action="/search-paciente">
            @csrf       
            <div class="row">
                <div class="col-4">
                    <input type="text" name="pesquisar" placeholder="Pesquise aqui" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="80"/>              
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-primary btn-sm" value="Pesquisar"></input>
                </div>
            </div>
        </form>

        <span> <span/>

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">CNS</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pacientes as $paciente)
                    <tr>
                        <th scope="row">{{ $paciente->id }}</th>
                        <td>{{ $paciente->nome }}</td>
                        <td>{{ $paciente->cpf }}</td>
                        <td>{{ $paciente->cns }}</td>
                        <td>
                            <span onclick="excluirPaciente('{{ $paciente->id }}')" type="button" class="btn btn-danger btn-sm">Excluir</span>
                            &nbsp;
                            <a href="edit-paciente/{{ $paciente->id }}" type="button" class="btn btn-primary btn-sm">Editar</a>
                            &nbsp;
                            <a href="edit-paciente/{{ $paciente->id }}/1" type="button" class="btn btn-success btn-sm">Vizualizar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pacientes->links() }}

    </div>

@endsection