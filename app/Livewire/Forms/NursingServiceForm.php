<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class NursingServiceForm extends Form
{
    public $service, $service_name, $price, $status = true;
    public $booking_for = 'self';

    public function rules()
    {
        return [
            'service_name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'status' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'service_name.required' => 'Service name is required.',
            'service_name.string' => 'Service name must be a string.',
            'service_name.max' => 'Service name may not be greater than 255 characters',
            'price.required' => 'Price is required.',
            'price.integer' => 'Price must be an integer.',
            'price.min' => 'Price must be at least 0.',
        ];
    }
}
