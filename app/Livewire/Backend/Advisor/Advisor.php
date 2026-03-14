<?php

namespace App\Livewire\Backend\Advisor;

use App\Livewire\Forms\AdvisorForm;
use App\Models\Advisor as ModelsAdvisor;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Advisor extends Component
{
    use WithPagination, MediaTrait;

    #[Title('Advisors')]

    public AdvisorForm $form;

    public function toggleStatus($id)
    {
        $advisor = ModelsAdvisor::findOrFail($id);
        $advisor->status = !$advisor->status;
        $advisor->save();

        $this->dispatch('toastr:success', 'Status updated!');
    }

    public function delete($id)
    {
        $advisor = ModelsAdvisor::findOrFail($id);

        // Delete advisor image if exists
        if ($advisor->image) {
            $this->deleteMedia($advisor->image);
        }

        // Delete advisor record
        $advisor->delete();

        $this->dispatch('toastr:success', 'Advisor information deleted!');
        return redirect()->back();
    }

    public function render()
    {
        $advisors = ModelsAdvisor::with('media')
            ->where('name', 'like', '%' . $this->form->search . '%')
            ->orWhere('designation', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.advisor.advisor', [
            'advisors' => $advisors,
        ])->extends('livewire.backend.layouts.app');
    }
}
