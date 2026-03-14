<?php

namespace App\Livewire\Backend\About;

use App\Models\About;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\AboutForm;

class EditAbout extends Component
{

    #[Title('Edit About')]

    public AboutForm $form;

    public function mount($aboutId)
    {
        $this->form->aboutId = $aboutId;

        $about = About::findOrFail($this->form->aboutId);

        $this->form->fill([
            'our_story' => $about->our_story,
            'our_mission' => $about->our_mission,
            'our_vision' => $about->our_vision,
        ]);
    }

    public function update()
    {
        $this->validate();

        $about = About::findOrFail($this->form->aboutId);

        $about->update([
            'our_story' => $this->form->our_story,
            'our_mission' => $this->form->our_mission,
            'our_vision' => $this->form->our_vision,
        ]);

        session()->flash('success', 'About information updated!');
        return redirect()->route('about');
    }

    public function render()
    {
        return view('livewire.backend.about.edit-about')->extends('livewire.backend.layouts.app');
    }
}
