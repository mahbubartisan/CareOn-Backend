<?php

namespace App\Livewire\Frontend\Footer;

use App\Models\Service;
use App\Models\Settings;
use Livewire\Component;

class Footer extends Component
{
    public $services;
    public $settings;

    public function mount()
    {
        $this->settings = Settings::with('siteLogo')->first();
        // $this->services = Service::where('status', 1)->get(['id', 'name', 'slug', 'form_key']);
        $this->services = Service::where('status', 1)
            ->orderByRaw("
        CASE 
            WHEN service_type_id = 1 THEN 1
            WHEN service_type_id = 3 THEN 3
            ELSE 4
        END
    ")
            ->orderBy('sort_order')
            ->get(['id', 'name', 'slug', 'form_key']);
    }

    public function redirectToServiceForm($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        match ($service->form_key) {
            'special-care' => $this->redirectRoute('frontend.service.detail', ['slug' => $service->slug]),
            'physiotherapy' => $this->redirectRoute('frontend.service.physiotherapy', ['slug' => $service->slug]),
            'diagnostic'   => $this->redirectRoute('frontend.service.diagnostic', ['slug' => $service->slug]),
            'ambulance'    => $this->redirectRoute('frontend.service.ambulance', ['slug' => $service->slug]),
            'doctor-consultation'  => $this->redirectRoute('frontend.service.consultation', ['slug' => $service->slug]),
            'doctor-visit'  => $this->redirectRoute('frontend.service.doctor.visit', ['slug' => $service->slug]),
            'nursing-service'  => $this->redirectRoute('frontend.service.nursing-service', ['slug' => $service->slug]),
            default        => abort(404),
        };
    }

    public function render()
    {
        return view('livewire.frontend.layouts.footer');
    }
}
