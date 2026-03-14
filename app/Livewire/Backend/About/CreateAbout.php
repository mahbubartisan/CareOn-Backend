<?php

namespace App\Livewire\Backend\About;

use App\Models\About;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\AboutForm;

class CreateAbout extends Component
{

    #[Title('Create About')]

    public AboutForm $form;

    public function store()
    {
        // Validate the form
        $this->validate();

        // Save the About data
        About::create([
            'our_story' => $this->form->our_story,
            'our_mission' => $this->form->our_mission,
            'our_vision' => $this->form->our_vision,
        ]);

        // flash success message
        session()->flash('success', 'About information created!');
        return redirect()->route('about');
    }

    public function render()
    {
        return view('livewire.backend.about.create-about')->extends('livewire.backend.layouts.app');
    }
}
