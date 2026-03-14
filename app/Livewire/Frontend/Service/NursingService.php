<?php

namespace App\Livewire\Frontend\Service;

use App\Mail\NursingBookingMail;
use App\Models\Location;
use App\Models\LocationGroup;
use App\Models\NursingPatient;
use App\Models\NursingService as ModelsNursingService;
use App\Models\NursingServiceBooking;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class NursingService extends Component
{
    public $service;
    public $nursingServices = [];
    public $packages;
    public $locationGroups;
    public $careLevels = [];
    public $careOptions = [];
    public $payment_method; // 'cod' or 'bkash'
    public $bookingFor = 'self';
    // Form container (single row storage)
    public $bookingForm = [
        'location' => '',
        'packageType' => '',
        'care' => '',
        'payment' => '',
        'patientName' => '',
        'age' => '',
        'gender' => '',
        'height' => '',
        'weight' => '',
        'patientType' => '',
        'country' => '',
        'patientContact' => '',
        'emergencyContact' => '',
        'address' => '',
        'genderPreference' => '',
        'language' => '',
        'specialInstructions' => '',
        'date' => '',
        'time' => '',
        'location_price' => '',
        'nursingCare' => [],
        'total_price' => '',
        'payment_type' => '',
    ];


    public function mount($slug)
    {
        $this->service = Service::with([
            'type',
        ])->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $this->nursingServices = ModelsNursingService::select('id', 'name', 'price')
            ->where('service_id', $this->service->id)
            ->get();

        $this->locationGroups = LocationGroup::with('locations')->get();

        if (auth()->check()) {
            $this->updatedBookingFor('self');
        }
    }

    public function processOrder()
    {
        // Make sure the index exists
        $paymentType = $this->bookingForm['payment_type'] ?? null;

        // COD → store order immediately
        if ($paymentType === 'COD' || $paymentType === 'bkash' || $paymentType === 'bank') {
            return $this->storeOrder();
        }

        // bKash → redirect to payment flow
        // if ($paymentType === 'bkash') {
        //     return $this->initiateBkashPayment($this->generateBookingId($this->service->name));
        // }

        // Optional: handle unknown payment types
        throw new \Exception("Invalid payment type selected.");
    }

    // public function storeOrder()
    // {
    //     $data = $this->bookingForm;

    //     // $carePrice      = $this->getCarePrice($data['packageType'], $data['care']);
    //     $locationPrice  = $this->getLocationPrice($data['location']);
    //     $totalPrice     = $this->getTotalPrice($data['packageType'], $data['care'], $data['location']);

    //     $bookingId = $this->generateBookingId($this->service->name);

    //     $booking = Booking::create([
    //         'booking_id'        => $bookingId,
    //         'user_id'           => auth()->id(),
    //         'service_name'      => $this->service->name,
    //         // 'price'             => $carePrice,
    //         'location_price'    => $locationPrice,
    //         'total_price'       => $totalPrice,
    //         'location_group'    => $this->getLocationGroup($data['location']),
    //         'location_name'     => $data['location'],
    //         'payment_method'    => $data['payment_type'],
    //     ]);

    //     Patient::create([
    //         'booking_id'         => $booking->id,
    //         'name'               => $data['patientName'],
    //         'gender'             => $data['gender'],
    //         'height'             => $data['height'],
    //         'weight'             => $data['weight'],
    //         'patient_type'       => $data['patientType'],
    //         'country'            => $data['country'],
    //         'patient_contact'    => $data['patientContact'],
    //         'emergency_contact'  => $data['emergencyContact'],
    //         'address'            => $data['address'],
    //         'gender_preference'  => $data['genderPreference'],
    //         'language'           => $data['language'],
    //         'special_notes'      => $data['specialInstructions'],
    //     ]);


    //     // Send to user
    //     Mail::to(auth()->user()->email)
    //         ->send(new NursingBookingMail($booking, 'user'));

    //     // Send to admin
    //     Mail::to(config('mail.admin_address'))
    //         ->send(new NursingBookingMail($booking, 'admin'));

    //     session()->put('booking_id', $booking->id);
    //     return redirect()->route('frontend.confirm');
    // }

    public function storeOrder()
    {
        $data = $this->bookingForm;

        $locationPrice = $this->getLocationPrice($data['location']);

        // Get selected service IDs
        $selectedIds = $data['nursingCare'] ?? [];

        // Fetch services from DB
        $services = ModelsNursingService::whereIn('id', $selectedIds)->get();

        // Prepare JSON structure
        $selectedServices = [];
        $servicesTotal = 0;

        foreach ($services as $service) {
            $selectedServices[] = [
                'name'  => $service->name,
                'price' => $service->price,
            ];

            $servicesTotal += $service->price;
        }

        $totalPrice = $locationPrice + $servicesTotal;

        $bookingId = $this->generateBookingId($this->service->name);

        $booking = NursingServiceBooking::create([
            'booking_id'         => $bookingId,
            'service_name'       => $this->service->name,
            'user_id'            => auth()->id(),
            'booking_for'        => $this->bookingFor ? $this->bookingFor : 'self',
            'location_price'     => $locationPrice,
            'total_price'        => $totalPrice,
            'location_group'     => $this->getLocationGroup($data['location']),
            'location_name'      => $data['location'],
            'payment_method'     => $data['payment_type'],
            'selected_services'  => $selectedServices,
        ]);

        NursingPatient::create([
            'booking_id'         => $booking->id,
            'name'               => $data['patientName'],
            'gender'             => $data['gender'],
            'age'                => $data['age'],
            'height'             => $data['height'],
            'weight'             => $data['weight'],
            'patient_type'       => $data['patientType'],
            'country'            => $data['country'],
            'patient_contact'    => $data['patientContact'],
            'emergency_contact'  => $data['emergencyContact'],
            'address'            => $data['address'],
            'gender_preference'  => $data['genderPreference'],
            'language'           => $data['language'],
            'special_notes'      => $data['specialInstructions'],
        ]);

        Mail::to(auth()->user()->email)
            ->send(new NursingBookingMail($booking, 'user'));

        Mail::to(config('mail.admin_address'))
            ->send(new NursingBookingMail($booking, 'admin'));

        session()->put('booking_confirmation', [
            'model' => get_class($booking),
            'id'    => $booking->id,
        ]);

        return redirect()->route('frontend.confirm');
    }

    public function initiateBkashPayment($bookingId)
    {
        $data = $this->bookingForm;

        dd($data);

        // Calculate all needed values
        // $carePrice     = $this->getCarePrice($data['packageType'], $data['care']);
        // $locationPrice = $this->getLocationPrice($data['location']);
        // $hours         = $this->getHours($data['care']);
        // $totalPrice    = $this->getTotalPrice($data['packageType'], $data['care'], $data['location']);

        // // Extra values you requested
        // $serviceName     = $this->service->name;
        // $locationGroup   = $this->getLocationGroup($data['location']);
        // $packageName     = $this->getPackageName($data['packageType']);
        // $careLevelName   = $this->getCareLevelName($data['care']);

        // // Call controller
        // $controller = app(BkashTokenizePaymentController::class);

        // $response = $controller->createPayment(new \Illuminate\Http\Request([
        //     'booking_id'        => $bookingId,
        //     'total_price'       => $totalPrice,
        //     'care_price'        => $carePrice,
        //     'location_price'    => $locationPrice,
        //     'hours'             => $hours,

        //     // NEWLY ADDED FIELDS
        //     'service_name'      => $serviceName,
        //     'location_group'    => $locationGroup,
        //     'package_name'      => $packageName,
        //     'care_level_name'   => $careLevelName,

        //     // Full form
        //     'booking_form'      => $this->bookingForm,
        // ]));

        // return $response;
    }

    public function updatedBookingFor($value)
    {
        if ($value === 'self' && auth()->check()) {
            $user = auth()->user();
            $this->bookingForm['patientName'] = $user->name;
            $this->bookingForm['patientContact'] = $user->phone ?? null;
            $this->bookingForm['gender'] = strtolower($user->gender);
        }

        if ($value === 'other') {
            $this->resetPatientFields();
        }
    }

    protected function resetPatientFields()
    {
        $this->bookingForm['patientName']    = null;
        $this->bookingForm['gender']         = null;
        $this->bookingForm['patientContact'] = null;
    }

    private function generateBookingId($serviceName)
    {
        // Short prefix from service name: "Nursing Care" → "NC"
        $prefix = strtoupper(
            collect(explode(' ', $serviceName))
                ->map(fn($w) => substr($w, 0, 1))
                ->join('')
        );

        // Six–digit numeric code
        $random = random_int(100000, 999999);

        return $prefix . $random;
    }

    private function getLocationGroup($locationName)
    {
        foreach ($this->locationGroups as $group) {
            if ($group->locations->contains('name', $locationName)) {
                return $group->name;
            }
        }

        return '';
    }

    public function getLocationPrice($locationName)
    {
        $location = Location::where('name', $locationName)->first();

        if (!$location) {
            return 0;
        }

        return $location->group->price ?? 0;
    }

    public function render()
    {
        return view('livewire.frontend.service.nursing-service')->extends('livewire.frontend.layouts.app');
    }
}
