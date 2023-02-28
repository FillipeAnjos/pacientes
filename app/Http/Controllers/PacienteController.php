<?php

namespace App\Http\Controllers;

use Session;
use File;
use App\Services\Validacao;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\PacienteModel;

class PacienteController extends Controller
{
    public function __invoke(Request $request)
    {
        //
    }

    public function __construct(PacienteModel $pacienteModel){

        $this->pacienteModel = $pacienteModel;
    }

    public function index(){

        $pacientes = PacienteModel::all();

        return view('pacientes/index', compact('pacientes'));

    }

    public function destroy($id){
    }

    public function edit($id){
    }

    public function update(Request $request){
    }

    public function registerPatients(){
        
        //$categorias = CategoryModel::all();
        //$fornecedores = ProviderModel::all();
        //$marcas = brandModel::all();

        //compact('categorias', 'fornecedores', 'marcas')

        return view('pacientes/cadastro');

    }

    public function save(StoreRequest $request){

        $foto = $request->foto;
        
        $validarCampos = $this->validarCampos($request); 
        if(!$validarCampos){
            return view('pacientes/cadastro');
        }

        $fetchImage = $imagem = $this->fetchImage($foto);
        if($fetchImage == false){
            return view('pacientes/cadastro');
        }

        $insertPaciente = $this->savePatient($imagem, $request);

        $moverImagem = $this->moveImage($foto, $imagem);

        $insertPaciente = true;

        if($insertPaciente){
            Session::flash('cadastropaciente-success', 'Paciente cadastrado com sucesso!');
        }else{
            Session::flash('cadastropaciente-error', 'Ocorreu um erro ao cadastrar o paciente!');
        }

        return view('pacientes/cadastro');

    }

    public function fetchImage($foto){

        $nomeImagem = pathinfo($foto, PATHINFO_FILENAME);
        $extensaoImagem = $foto->extension();

        if($extensaoImagem != 'jpg' && $extensaoImagem != 'png'){
            Session::flash('cadastropaciente-error', 'Favor realizar o upload da foto com extensões jpg ou png.');
            return false;
        }

        $randomico = rand(1000, 9999);

        $imagem = public_path().'\imgpacientes\foto\imagem_'.$nomeImagem.'.'.$randomico.'.'.$extensaoImagem;

        return $imagem;

    }

    public function savePatient($imagem, $request){
        
        $retorno = $this->pacienteModel->create(['foto'      => $imagem,
                                                'nome'       => $request->nome,
                                                'nomemae'    => $request->nomemae,
                                                'nascimento' => $request->nascimento,
                                                'cpf'        => $request->cpf,
                                                'cns'        => $request->cns,
                                            ]);

        return $retorno;

    }

    public function moveImage($foto, $imagem){

        if(isset($foto)){
            File::move($foto, $imagem);
        }

    }

    public function validarCampos($request){

        $validacao = new Validacao();
        
        $cpf = $validacao->validaCPF($request->cpf);
        $cns = $validacao->validaCartaoNacionalSaude($request->cns);
        
        if($cpf != true){
            Session::flash('cadastropaciente-error', 'CPF inválido.');
            return false;
        }

        if($cns != true){
            Session::flash('cadastropaciente-error', 'CNS inválido.');
            return false;
        }

        return true;

    }

}
