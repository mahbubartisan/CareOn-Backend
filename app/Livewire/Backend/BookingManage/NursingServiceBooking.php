<?php

namespace App\Livewire\Backend\BookingManage;

use App\Livewire\Forms\BookingForm;
use App\Models\NursingServiceBooking as ModelsNursingServiceBooking;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class NursingServiceBooking extends Component
{
    use WithPagination;

    #[Title('Emergency Nursing Bookings')]

    public BookingForm $form;

    public function render()
    {
        $bookings = ModelsNursingServiceBooking::with(['patient', 'user'])
            ->when($this->form->search, function ($query) {

                $search = $this->form->search;

                $query->where(function ($q) use ($search) {

                    $q->where('id', 'like', "%{$search}%")
                        ->orWhere('booking_id', 'like', "%{$search}%")
                        ->orWhere('payment_method', 'like', "%{$search}%")

                        // Search inside patient
                        ->orWhereHas('patient', function ($patientQuery) use ($search) {
                            $patientQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('gender', 'like', "%{$search}%")
                                ->orWhere('patient_contact', 'like', "%{$search}%")
                                ->orWhere('emergency_contact', 'like', "%{$search}%");
                        });

                    // Search by related user
                    // ->orWhereHas('user', function ($userQuery) use ($search) {
                    //     $userQuery->where('name', 'like', "%{$search}%")
                    //         ->orWhere('email', 'like', "%{$search}%");
                    // });
                });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.booking-manage.nursing-service-booking', [
            'bookings' => $bookings,
        ])->extends('livewire.backend.layouts.app');
    }
}
