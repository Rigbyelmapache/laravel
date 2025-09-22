<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nombre' => 'required|string|max:255',
            'codigo_producto' => 'required|string|unique:productos,codigo_producto',
            'descripcion' => 'string|max:255',
            'precio' => 'required|decimal:2',
            'marca' => 'required|string|max:150',
            'categoria_id' => 'required|numeric|exists:categoriastable,categoria_id',
        ];
    }
    public function messages()
    {

        // existen  , "required ,numeric ,string ,max ,exists, boolean , nullable"
        // reglas de comparacion "min:valueo(max) "
        // reglas bd " unique:table,column,except,id " 
        // texto "email,url,alpha,alpha_num , alpha_dash"
        // fechas "date,  date_format:y-m-d"
        // archivos "file,image,mimes, max , dimensions"
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'codigo_producto.required' => 'El código del producto es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'marca.required' => 'La marca es obligatoria.',
            'categoria_id.exists' => 'La categoría no existe.',
            // etc.
        ];
    }
     public function attributes()
    {
        return [
            'categoria_id' => 'categoría',
            'codigo_producto' => 'código del producto',
        ];
    }

}
