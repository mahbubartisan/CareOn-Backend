<?php

namespace App\Livewire\Backend;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;


class Dashboard extends Component
{
    #[Title('Dashboard')]

    public function render()
    {
        $dashboard = DB::selectOne("
            SELECT
                (SELECT COUNT(*) FROM patients)        as totalPatients,
                (SELECT COUNT(*) FROM blogs)           as totalBlogs,
                (SELECT COUNT(*) FROM packages)        as totalPackages,
                (SELECT COUNT(*) FROM labs)            as totalLabs,
                (SELECT COUNT(*) FROM advisors)        as totalAdvisors,
                (SELECT COUNT(*) FROM care_providers)  as totalCareProviders,
                (SELECT COUNT(*) FROM services WHERE service_type_id = 1) as specialCareCount,
                (SELECT COUNT(*) FROM services WHERE service_type_id = 3) as medicalCareCount
        ");


        return view('livewire.backend.dashboard', [
            'totalPatients'      => $dashboard->totalPatients,
            'totalBlogs'         => $dashboard->totalBlogs,
            'totalPackages'      => $dashboard->totalPackages,
            'totalLabs'          => $dashboard->totalLabs,
            'totalAdvisors'      => $dashboard->totalAdvisors,
            'totalCareProviders' => $dashboard->totalCareProviders,
            'specialCareCount'   => $dashboard->specialCareCount,
            'medicalCareCount'   => $dashboard->medicalCareCount,
        ])->extends('livewire.backend.layouts.app');
    }
}
