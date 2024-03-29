<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => ["required", "max:255", "unique:projects,title"], //titolo
            "client" => ["required", "max:255"], //cliente
            "description" => ["required", "max:255"], //descrizione
            "type_id" => ["exists:types,id"] //id del tipo di progetto
        ];
    }
}
