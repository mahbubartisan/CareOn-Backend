<?php

namespace App\Livewire\Backend\CareProvider;

use App\Livewire\Forms\CareProviderForm;
use App\Models\CareProvider as ModelsCareProvider;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class CareProvider extends Component
{
    use WithPagination;

    #[Title('Care Providers')]

    public CareProviderForm $form;

    public function render()
    {
        $providers = ModelsCareProvider::query()
            ->with([
                'licenseMedia:id,path',
                'trainingMedia:id,path',
                'policeMedia:id,path',
            ])
            ->when($this->form->search, function ($query) {

                $search = trim($this->form->search);

                $query->where(function ($q) use ($search) {
                    $q->where('full_name', 'like', $search . '%')
                        ->orWhere('email', 'like', $search . '%')
                        ->orWhere('phone', 'like', $search . '%')
                        ->orWhere('gender', 'like', $search . '%')
                        ->orWhere('service_category', 'like', $search . '%');
                });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);


        return view('livewire.backend.care-provider.care-provider', [
            'providers' => $providers
        ])->extends('livewire.backend.layouts.app');
    }
}
