<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\ResidenciaModel;
use Illuminate\Support\Facades\DB;

class ResidenciaController extends Controller
{
    public function __invoke(Request $request)
    {
        //
    }

    public function __construct(){

    }

    public function index(){
    }

    public function destroy($id){

        $residencia = ResidenciaModel::where('paciente_id', $id)->delete();
    }

    public function edit($id){
    }

    public function update(Request $request){

        $residenciaModel = ResidenciaModel::where('paciente_id', $request->id);

        $residenciaModel->update([
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'paciente_id' => $request->id,
        ]);

    }

    public function save(StoreRequest $request, $paciente_id){

        $residenciaModel = new ResidenciaModel();

        $retorno = $residenciaModel->create(['cep'            => $request->cep,
                                                'endereco'    => $request->endereco,
                                                'numero'      => $request->numero,
                                                'complemento' => $request->complemento,
                                                'bairro'      => $request->bairro,
                                                'cidade'      => $request->cidade,
                                                'estado'      => $request->estado,
                                                'paciente_id' => $paciente_id,
                                            ]);

        return $retorno;

    }
}
