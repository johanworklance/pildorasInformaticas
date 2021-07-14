<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class create_productos_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//pasar a true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['seccion'=>'required','nombreArticulo'=>'required','paisOrigen'=>'required','fecha'=>'required'];//las misma validaciones que se usan en el metodo validate en store del controlador
    }
}
