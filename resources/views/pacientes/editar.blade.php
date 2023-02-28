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

            <br/>

            <div class="input-group input-group-sm mb-3">
                <img src="/imgpacientes/foto/{{ $paciente->foto }}" height="150" width="150">
            </div>  

        </div>
        <div class="col-10" >

            <form method="POST" action="/update-paciente" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-6">  

                        <input type="hidden" name="id" value="{{ $paciente->id }}" />
                    
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >Foto</span>
                                <input type="file" name="foto" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >Nome</span>
                                <input type="text" name="nome" value="{{ $paciente->nome }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="200"/>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >Nome da Mãe</span>
                                <input type="text" name="nomemae" value="{{ $paciente->nomemae }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="200"/>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >Nascimento</span>
                                <input type="date" name="nascimento" value="{{ $paciente->nascimento }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="50"/>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >CPF</span>
                                <input type="text" name="cpf" id="cpf" value="{{ $paciente->cpf }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="15"/>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" >CNS</span>
                                <input type="text" name="cns" id="cns" value="{{ $paciente->cns }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="20"/>
                            </div>

                    </div>
                    <div class="col-6">
                        
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" >Cep</span>
                            <input type="text" name="cep" id="cep" value="{{ $residencia->cep }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="9"/>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" >Endereço</span>
                            <input type="text" name="endereco" value="{{ $residencia->endereco }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="80"/>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" >Número</span>
                            <input type="text" name="numero" value="{{ $residencia->numero }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="10"/>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" >Complemento</span>
                            <input type="text" name="complemento" value="{{ $residencia->complemento }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="100"/>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" >Bairro</span>
                            <input type="text" name="bairro" value="{{ $residencia->bairro }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="80"/>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" >Cidade</span>
                            <input type="text" name="cidade" value="{{ $residencia->cidade }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="80"/>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" >Estado</span>
                            <select name="estado" id="estado" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <option value="{{ $residencia->estado }}">Selecione</option>
                                <option value="RO">Rondônia</option>
                                <option value="AC">Acre</option>
                                <option value="AM">Amazonas</option>
                                <option value="RR">Roraima</option>
                                <option value="PA">Pará</option>
                                <option value="AP">Amapá</option>
                                <option value="TO">Tocantins</option>
                                <option value="MA">Maranhão</option>
                                <option value="PI">Piauí</option>
                                <option value="CE">Ceará</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="PB">Paraíba</option>
                                <option value="PE">Pernambuco</option>
                                <option value="AL">Alagoas</option>
                                <option value="SE">Sergipe</option>
                                <option value="BA">Bahia</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="SP">São Paulo</option>
                                <option value="PR">Paraná</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="GO">Goiás</option>
                                <option value="DF">Distrito Federal</option>
                            </select>

                        </div>

                    </div>
                </div>

                <div class="input-group input-group-sm mb-3">
                    @if($condicao == null)
                        <input type="submit" class="btn btn-success" value="Cadastrar"></input>
                    @endif
                </div>
                
            </form>

        </div>
    </div>
    </div>

@endsection