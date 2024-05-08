<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    // protected function casts()
    // {
    //     return [
    //         'status' => 'boolean',

    //     ];
    // }

    public function messages(): array
    {
        return [
            'title.required' => 'El campo título es obligatorio',
            'title.min' => 'El campo título debe tener al menos 5 caracteres',
            'description.required' => 'El campo descripción es obligatorio',
            'description.min' => 'El campo descripción debe tener al menos 10 caracteres',
            'price.required' => 'El campo precio es obligatorio',
            'price.numeric' => 'El campo precio debe ser un número',
            'image.required' => 'El campo imagen es obligatorio',
            'image.image' => 'El campo imagen debe ser una imagen válida (jpg, jpeg, png, bmp, gif, svg, or webp)',
            'category.required' => 'El campo categoría es obligatorio',
            'status.required' => 'El campo estado es obligatorio',
        ];
    }
}
