<?php

namespace App\Livewire\Backend\BookingManage;

use App\Models\NursingServiceBooking;
use App\Models\Settings;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mpdf\Mpdf;

class NursingServiceBookingDetail extends Component
{
    #[Title('Emergency Nursing Booking Details')]

    public $booking;
    public $bookingId;  
    
    public function mount($bookingId) 
    {
        $this->bookingId = $bookingId;
        $this->booking = NursingServiceBooking::with(['patient', 'user'])->findOrFail($this->bookingId);
    }

    public function downloadInvoice()
    {
        $booking = $this->booking;

        $settings = Settings::with('siteLogo')->first();

        // Absolute path for mPDF
        $logoPath = null;

        if ($settings && $settings->siteLogo) {
            $logoPath = $settings->siteLogo->path;
        }

        $html = view('pdf.nursing-service-invoice', [
            'booking' => $booking,
            'logoPath' => $logoPath,
        ])->render();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'autoLangToFont' => true,
            'autoScriptToLang' => true
        ]);

        $mpdf->WriteHTML($html);

        return response()->streamDownload(
            function () use ($mpdf) {
                echo $mpdf->Output('', 'S');
            },
            str()->slug($booking->service_name) . '-' . now()->format('d-m-Y') . '.pdf'
        );
    }
    
    public function render()
    {
        return view('livewire.backend.booking-manage.nursing-service-booking-detail')->extends('livewire.backend.layouts.app');
    }
}
