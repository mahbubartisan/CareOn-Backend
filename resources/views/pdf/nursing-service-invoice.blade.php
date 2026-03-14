<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Nursing Service Invoice</title>

        <style>
            body {
                font-family: "Times New Roman", Times, serif;
                font-size: 13px;
                color: #1f2937;
                background: #ffffff;
            }

            .container {
                width: 100%;
                padding: 28px;
            }

            /* HEADER */
            .header-table {
                width: 100%;
                border-bottom: 2px solid #0f766e;
                padding-bottom: 10px;
                margin-bottom: 18px;
            }

            .invoice-title {
                text-align: right;
            }

            .invoice-title h2 {
                margin: 0;
                font-size: 18px;
                color: #0c0c0c;
            }

            /* SECTIONS */
            .section-title {
                font-size: 14px;
                font-weight: 700;
                color: #0f766e;
                border-left: 4px solid #0f766e;
                padding-left: 8px;
                margin: 18px 0 10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            .info-table td {
                padding: 6px 4px;
                vertical-align: top;
            }

            .label {
                width: 32%;
                color: #6b7280;
            }

            .value {
                font-weight: 600;
                color: #111827;
            }

            /* FOOTER */
            .footer {
                margin-top: 28px;
                text-align: center;
                font-size: 11px;
                color: #6b7280;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <!-- HEADER -->
            <table class="header-table">
                <tr>
                    <td>
                        <div class="logo">
                            <img src="{{ $logoPath }}" alt="CareOn" style="height: 50px;">
                        </div>
                    </td>
                    <td class="invoice-title"
                        style="width:100%; border-bottom:2px solid #0f766e; padding-bottom:10px; margin-bottom:18px;">
                        <h2 style="margin:0; font-size:18px; color:#0c0c0c;">
                            Nursing Service Invoice
                        </h2>

                        <table style="width:100%; margin-top:6px;">
                            <tr>
                                <td style="font-size:12px; color:#1c1d1e; text-align:right;">
                                    <strong>Invoice Date:</strong>
                                    {{ now()->format("F d, Y") }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- BOOKING SUMMARY -->
            <div class="section-title">Booking Summary</div>

            <table class="info-table">

                <tr>
                    <td class="label">Booking ID</td>
                    <td class="value">#{{ $booking->booking_id }}</td>
                </tr>

                <tr>
                    <td class="label">Location Group</td>
                    <td class="value">
                        {{ $booking->location_group ?: "N/A" }}
                    </td>
                </tr>

                <tr>
                    <td class="label">Location Name</td>
                    <td class="value">
                        {{ $booking->location_name ?: "N/A" }}
                    </td>
                </tr>

                <tr>
                    <td class="label">Location Charge</td>
                    <td class="value" style="color:#0f766e; font-weight:600;">
                        ৳ {{ number_format($booking->location_price) }}
                    </td>
                </tr>

            </table>

            <div class="section-title">Selected Services</div>

            <table class="info-table">

                @php
                    $servicesTotal = 0;
                @endphp

                @foreach ($booking->selected_services ?? [] as $service)
                    @php
                        $servicesTotal += $service["price"];
                    @endphp

                    <tr>
                        <td class="label">
                            {{ $service["name"] }}
                        </td>

                        <td class="value" style="color:#0f766e; font-weight:600;">
                            ৳ {{ number_format($service["price"]) }}
                        </td>
                    </tr>
                @endforeach

            </table>

            <div class="section-title">Payment Summary</div>

            @php
                $locationPrice = $booking->location_price ?? 0;
                $grandTotal = $servicesTotal + $locationPrice;
            @endphp

            <table class="info-table">

                <tr>
                    <td class="label">Services Total</td>
                    <td class="value">৳ {{ number_format($servicesTotal) }}</td>
                </tr>

                <tr>
                    <td class="label">Location Charge</td>
                    <td class="value">৳ {{ number_format($locationPrice) }}</td>
                </tr>

                <tr style="border-top:2px solid #0f766e;">
                    <td class="label" style="font-weight:700;">Grand Total</td>
                    <td class="value" style="font-weight:700; color:#0f766e;">
                        ৳ {{ number_format($grandTotal) }}
                    </td>
                </tr>

                <tr>
                    <td class="label">Payment Method</td>
                    <td class="value">{{ ucfirst($booking->payment_method) ?: "N/A" }}</td>
                </tr>

            </table>

            <!-- PATIENT INFORMATION -->
            <div class="section-title">Patient Information</div>
            <table class="info-table">
                <tr>
                    <td class="label">Patient Name</td>
                    <td class="value">{{ $booking->patient->name ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Gender</td>
                    <td class="value">{{ ucfirst($booking->patient->gender) ?: "N/A" }}</td>
                </tr>
                
                <tr>
                    <td class="label">Age</td>
                    <td class="value">{{ $booking->patient->age ?: "N/A" }} Years</td>
                </tr>

                <tr>
                    <td class="label">Height</td>
                    <td class="value">{{ $booking->patient->height ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Weight</td>
                    <td class="value">{{ $booking->patient->weight ?: "N/A" }}Kg</td>
                </tr>

                <tr>
                    <td class="label">Patient Type</td>
                    <td class="value">{{ $booking->patient->patient_type ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Language Preference</td>
                    <td class="value">{{ $booking->patient->language ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Gender Preference</td>
                    <td class="value">{{ $booking->patient->gender_preference ?: "N/A" }}</td>
                </tr>
            </table>

            <!-- CONTACT INFORMATION -->
            <div class="section-title">Contact Information</div>
            <table class="info-table">
                <tr>
                    <td class="label">Patient Contact</td>
                    <td class="value">{{ $booking->patient->patient_contact ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Emergency Contact</td>
                    <td class="value">{{ $booking->patient->emergency_contact ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Address</td>
                    <td class="value">{{ $booking->patient->address ?: "N/A" }}</td>
                </tr>
            </table>

            <!-- NOTES -->
            @if (!empty(@$booking->patient?->special_notes))
                <div class="section-title">Additional Information</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Notes</td>
                        <td class="value">{{ @$booking->patient?->special_notes ?: "N/A" }}</td>
                    </tr>
                </table>
            @endif

            <!-- FOOTER -->
            <div class="footer">
                This invoice is system generated and does not require a signature.<br>
                © {{ date("Y") }} CareOn. All rights reserved.
            </div>

        </div>

    </body>

</html>
