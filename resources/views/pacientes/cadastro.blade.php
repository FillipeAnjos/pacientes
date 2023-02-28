@extends('layouts.main')

@section('title', 'Cadastro de Paciente')

    <style>
        
    </style>

@section('content')

    <br/>

    @include('alert.cadastropaciente');

    <div class="container">
    <div class="row">
        <div class="col-2" >
            <h5><b>Cadastro de Paciente</b></h5>
            <p></p>
            <div class="input-group input-group-sm mb-3">
                <a href="/" type="submit" class="btn btn-primary">&nbsp;&nbsp; Voltar &nbsp;&nbsp;</a>
            </div>

        </div>
        <div class="col-10" >

            <form method="POST" action="/save-paciente" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-6">  
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >Foto</span>
                                <input type="file" name="foto" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >Nome</span>
                                <input type="text" name="nome" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="200"/>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >Nome da Mãe</span>
                                <input type="text" name="nomemae" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="200"/>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >Nascimento</span>
                                <input type="date" name="nascimento" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="50"/>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >CPF</span>
                                <input type="text" name="cpf" id="cpf" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="15"/>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >CNS</span>
                                <input type="text" name="cns" id="cns" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="20"/>
                            </div>

                    </div>
                    <div class="col-6">
                        One of three columns
                    </div>
                </div>


                <div class="input-group input-group-sm mb-3">
                    <input type="submit" class="btn btn-success" value="Cadastrar"></input>
                </div>
                

            </form>

        </div>
    </div>
    </div>

@endsection