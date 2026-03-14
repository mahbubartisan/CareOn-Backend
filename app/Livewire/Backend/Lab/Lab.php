<?php

namespace App\Livewire\Backend\Lab;

use App\Livewire\Forms\LabForm;
use App\Models\Lab as ModelsLab;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Lab extends Component
{
    use WithPagination, WithFileUploads, MediaTrait;

    #[Title('Labs')]

    public LabForm $form;

    public function openModal()
    {
        $this->form->isOpen = true;
    }

    public function toggleStatus($id)
    {
        $lab = ModelsLab::findOrFail($id);
        $lab->status = !$lab->status;
        $lab->save();

        $this->dispatch('toastr:success', 'Lab status updated!');
    }

    public function closeModal()
    {
        $this->form->isOpen = false;
        $this->reset(['form.name', 'form.photo', 'form.charge', 'form.status']);
    }

    public function store()
    {
        $this->validate();

        // Handle image upload if present
        if ($this->form->photo) {
            $image = $this->uploadMedia($this->form->photo, 'images/lab', 80);
            $imagePath = $image->id;
        }

        ModelsLab::create([
            'name' => $this->form->name,
            'charge' => $this->form->charge,
            'photo' => $imagePath ?? null,
            'status' => $this->form->status,
        ]);

        $this->form->isOpen = false;
        $this->reset(['form.name', 'form.photo', 'form.charge', 'form.status']);
        $this->dispatch('toastr:success', 'Lab created successfully!');
    }

    public function edit($id)
    {
        $lab = ModelsLab::findOrFail($id);
        $this->form->editMode = $lab->id;
        $this->form->name = $lab->name;
        $this->form->photo = $lab->photo;
        $this->form->charge = $lab->charge;
        $this->form->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->form->editMode) {
            $lab = ModelsLab::findOrFail($this->form->editMode);

            if ($this->form->photo && !is_int($this->form->photo)) {
                // Delete the old media if it exists
                if ($lab->photo) {
                    $this->deleteMedia($lab->photo);
                }
    
                // Upload the new image
                $newPhoto = $this->uploadMedia(
                    $this->form->photo,
                    'images/lab',
                    80
                );
    
                $newPhotoId = $newPhoto->id;
            } else {
                $newPhotoId = $lab->photo; // keep the existing image
            }

            $lab->update([
                'name' => $this->form->name,
                'charge' => $this->form->charge,
                // Handle image upload if present
                'photo' => $newPhotoId,
            ]);

            $this->form->isOpen = false;
            $this->reset(['form.editMode', 'form.name', 'form.charge', 'form.photo']);
            $this->dispatch('toastr:success', 'Lab updated successfully!');
        }
    }

    public function delete($id)
    {
        $lab = ModelsLab::with('media')->findOrFail($id);

        if ($lab->photo) {
            $this->deleteMedia($lab->photo);
        }

        $lab->delete();
        $this->dispatch('toastr:success', 'Lab deleted successfully!');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $labs = ModelsLab::with('media')->where('name', 'like', '%' . $this->form->search . '%')
            ->latest()->paginate($this->form->rowsPerPage);
        return view('livewire.backend.lab.lab', [
            'labs' => $labs
        ])->extends('livewire.backend.layouts.app');
    }
}
