<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'foto' => 'required',
            'nome' => 'required',
            'nomemae' => 'required',
            'nascimento' => 'required',
            'cpf' => 'required',
            'cns' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'foto.required' => 'O campo foto é obrigatório.',
            'nome.required' => 'O campo nome é obrigatório.',
            'nomemae.required' => 'O campo nome da mãe é obrigatório.',
            'nascimento.required' => 'O campo nascimento é obrigatório.',
            'cpf.required' => 'O campo cpf é obrigatório.',
            'cns.required' => 'O campo cns é obrigatório.',
            'cep.required' => 'O campo cep é obrigatório.',
            'endereco.required' => 'O campo endereço é obrigatório.',
            'numero.required' => 'O campo numero é obrigatório.',
            'complemento.required' => 'O campo complemento é obrigatório.',
            'bairro.required' => 'O campo bairro é obrigatório.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'estado.required' => 'O campo estado é obrigatório.',
        ];
    }
}
