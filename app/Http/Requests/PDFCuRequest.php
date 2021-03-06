<?php

namespace GIDV\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PDFCuRequest extends FormRequest
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
     *En el request se realizan todas las validaciones dentro del formulario
     * @return array
     */
    public function rules()
    {
        return [
            'periodoCu'=>'requeried|not_in:0',
            'curso'=>'requeried|not_in:0',
            'anioCu'=>'requeried|not_in:0',
        ];
    }
}
