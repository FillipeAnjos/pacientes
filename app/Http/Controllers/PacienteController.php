<?php

namespace App\Http\Controllers;

use Session;
use File;

use App\Services\Validacao;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\PacienteModel;
use App\Models\ResidenciaModel;
use App\Http\Controllers\ResidenciaController;
use App\WebService\ViaCep;
use Illuminate\Support\Facades\DB;

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

        $pacientes = DB::table('pacientes')->simplePaginate(5); 

        return view('welcome', compact('pacientes'));

    }

    public function destroy($id){

        $residenciaController = new ResidenciaController();
        $residenciaController->destroy($id);
        
        $paciente = PacienteModel::findOrFail($id);
        $paciente->delete();

        return redirect()->back();

    }

    public function edit($id, $condicao = null){

        $paciente = PacienteModel::find($id);
        $residencia = DB::table('residencia')->where([['paciente_id','=',$id]])->first();
        
        return view('pacientes/editar',  compact('paciente', 'residencia', 'condicao'));

    }

    public function update(StoreRequest $request){

        $imagem = $this->fetchImage($request->foto);
        if($imagem == false){
            return view('pacientes/cadastro');
        }
        $this->moveImage($request->foto, $imagem->path);

        $residenciaController = new ResidenciaController();
        $residenciaController->update($request);

        $produto = PacienteModel::findOrFail($request->id);
        $produto->update([
            'foto' => $imagem->nome,
            'nome' => $request->nome,
            'nomemae' => $request->nomemae,
            'nascimento' => $request->nascimento,
            'cpf' => $request->cpf,
            'cns' => $request->cns,
        ]);

        $pacientes = DB::table('pacientes')->simplePaginate(5); 

        return view('welcome', compact('pacientes'));

    }

    public function registerPatients(){

        return view('pacientes/cadastro');

    }

    public function save(StoreRequest $request){

        $foto = $request->foto;
        
        $validarCampos = $this->validarCampos($request); 
        if(!$validarCampos){
            return view('pacientes/cadastro');
        }

        $imagem = $this->fetchImage($foto);
        if($imagem == false){
            return view('pacientes/cadastro');
        }

        

        $insertPaciente = $this->savePatient($imagem->nome, $request);
        if(!$insertPaciente){
            Session::flash('cadastropaciente-error', 'Ocorreu um erro ao cadastrar o paciente!');
            return view('pacientes/cadastro');
        }

        $residenciaController = new ResidenciaController();
        $residenciaController->save($request, $insertPaciente->id);

        $moverImagem = $this->moveImage($foto, $imagem->path);




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

        $imagem = new \stdClass();
        $imagem->path = public_path().'\imgpacientes\foto\imagem_'.$nomeImagem.'.'.$randomico.'.'.$extensaoImagem;
        $imagem->nome = 'imagem_'.$nomeImagem.'.'.$randomico.'.'.$extensaoImagem;

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
