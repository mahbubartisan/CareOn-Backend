<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LabForm extends Form
{
    public $name, $photo, $charge, $status = true;
    public $search = '';
    public $rowsPerPage = 20;
    public $editMode = null;
    public $isOpen = false;

    public function rules()
    {
        return [
            'name' => 'required|string|max:150|unique:labs,name,' . $this->editMode,
            'charge' => 'required|integer|min:0',
            'photo' => $this->editMode
                ? 'nullable'
                : 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Lab name field is required.',
            'name.string'   => 'Lab name must be a valid string.',
            'name.max'      => 'Lab name must not be greater than 50 characters.',

            'name.unique'   => 'This Lab name already exists.',
            'charge.required' => 'Charge field is required.',
            'charge.integer' => 'Charge must be an integer.',
            'charge.min' => 'Charge must be at least 0.',

            'photo.required' => 'Logo field is required.',
            'photo.image'    => 'The uploaded file must be an image.',
            'photo.mimes'    => 'Logo must be a file of type: jpeg, png, jpg, webp.',
            'photo.max'      => 'Logo must not be greater than 2MB.',
        ];
    }
}
