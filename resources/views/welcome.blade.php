@extends('layouts.main')

@section('title', 'Cadastro de Pacientes')

    <style>
        
    </style>

@section('content')

    <br/>

    <div class="container">
        <div class="row">
            <div class="col">

                <div class="jumbotron">
                <h1>Cadastro de Pacientes!</h1>
                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
                </div>

            </div>
        </div>
    </div>

    <br/><br/>

    <div class="container">
        <div class="row">
            <div class="col">

                <span>Faça seu <b>cadastro</b>, no link abaixo</span>
                <br/>

                <a href="/cadastropacientes">Cadastro</a>
            </div>
            <div class="col">

                <span>Visualize seus <b>pacientes</b>, no link abaixo</span>
                <br/>

                <a href="/visualizarpacientes">Visualizar</a>
            </div>
        </div>
    </div>

@endsection