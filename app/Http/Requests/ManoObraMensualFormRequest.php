<?php

namespace sis5cs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManoObraMensualFormRequest extends FormRequest
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
            'descripcion_cargo'=>'string|nullable',
            'num_personas'=>'numeric',
            'sueldo_mensual'=>'numeric',
            'id_persona'=>'numeric'
        ];
    }
}
