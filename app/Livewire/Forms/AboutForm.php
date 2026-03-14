<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AboutForm extends Form
{
    public $aboutId, $our_story, $our_mission, $our_vision;

    public function rules()
    {
        return [

            'our_story' => 'required|string|max:4000',
            'our_mission' => 'required|string|max:4000',
            'our_vision' => 'required|string|max:4000',
        ];
    }

    public function messages()
    {
        return [
            'our_story.required' => 'Our Story field is required.',
            'our_story.string' => 'Our Story must be a valid string.',
            'our_story.max' => 'Our Story cannot exceed 4000 characters.',

            'our_mission.required' => 'Our Mission field is required.',
            'our_mission.string' => 'Our Mission must be a valid string.',
            'our_mission.max' => 'Our Mission cannot exceed 4000 characters.',

            'our_vision.required' => 'Our Vision field is required.',
            'our_vision.string' => 'Our Vision must be a valid string.',
            'our_vision.max' => 'Our Vision cannot exceed 4000 characters.',
        ];
    }
}
