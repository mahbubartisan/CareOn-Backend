<?php

namespace App\Livewire\Backend\CareProvider;

use App\Livewire\Forms\CareProviderForm;
use App\Models\CareProvider;
use App\Models\Media;
use Livewire\Attributes\Title;
use Livewire\Component;

class CareProviderDetail extends Component
{
    #[Title('Care Provider Detail')]

    public CareProviderForm $form;

    public function mount($providerId)
    {
        $this->form->providerId = $providerId;
        $this->form->provider = CareProvider::findOrFail($this->form->providerId);
    }

    public function downloadNidMedia(int $mediaId)
    {

        $media = Media::select('id', 'path')->findOrFail($mediaId);

        $filePath = public_path($media->path);

        if (! file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download(
            $filePath,
            basename($filePath)
        );
    }

    public function downloadSingleMedia(int $mediaId)
    {

        $media = Media::select('id', 'path')->findOrFail($mediaId);

        $filePath = public_path($media->path);

        if (! file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download(
            $filePath,
            basename($filePath)
        );
    }

    public function render()
    {
        return view('livewire.backend.care-provider.care-provider-detail')->extends('livewire.backend.layouts.app');
    }
}
