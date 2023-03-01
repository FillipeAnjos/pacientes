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
                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
                </div>

            </div>
        </div>

        <br/>

        <div class="row">
            <div class="col">
                <span>Faça seu <b>cadastro</b>, no link abaixo</span>
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

        <br/>

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pacientes as $paciente)
                    <tr>
                        <th scope="row">{{ $paciente->id }}</th>
                        <td>{{ $paciente->nome }}</td>
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