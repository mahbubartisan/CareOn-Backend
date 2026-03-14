<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nursing Service Booking Confirmation</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f4f5f7;
                margin: 0;
                padding: 20px;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                background: #ffffff;
                border-radius: 12px;
                padding: 32px;
                border: 1px solid #e5e7eb;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            }

            .header {
                text-align: center;
                margin-bottom: 30px;
            }

            .logo {
                font-size: 26px;
                font-weight: bold;
                color: #2563eb;
            }

            .title {
                font-size: 24px;
                font-weight: bold;
                margin-top: 10px;
                color: #111827;
            }

            .subtitle {
                font-size: 15px;
                margin: 10px 0 20px;
                color: #4b5563;
                line-height: 1.6;
            }

            .section-title {
                font-size: 18px;
                margin: 25px 0 12px;
                font-weight: bold;
                color: #111827;
                border-left: 4px solid #2563eb;
                padding-left: 8px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }

            td {
                padding: 10px;
                border: 1px solid #e5e7eb;
                font-size: 14px;
                color: #374151;
            }

            td.label {
                background: #f9fafb;
                font-weight: bold;
                width: 40%;
                color: #111827;
            }

            .highlight {
                color: #16a34a;
                font-weight: bold;
            }

            .note-box {
                margin-top: 30px;
                background: #fef2f2;
                border-left: 5px solid #dc2626;
                padding: 20px;
                color: #7f1d1d;
                border-radius: 6px;
            }

            .footer {
                margin-top: 40px;
                font-size: 14px;
                color: #6b7280;
                text-align: center;
                line-height: 1.6;
            }
        </style>
    </head>

    <body>
        <div class="container">

            <div class="header">
                <div class="logo">CareOn</div>
                <h1 class="title">Nursing Service Booking Details</h1>
            </div>

            <p class="subtitle">
                @if ($recipientType === "admin")
                    A new nursing service booking has been placed.
                    Below are the complete booking details.
                @else
                    Hello {{ $booking->patient->name ?? "Customer" }},<br>
                    Thank you for choosing
                    <span style="color: #16a34a; font-weight: 600">CareOn</span>.
                    Your nursing service booking has been successfully confirmed.
                    Please find your booking details below.
                @endif
            </p>

            {{-- ================= BOOKING INFO ================= --}}
            <h2 class="section-title">Booking Information</h2>

            <table>
                <tr>
                    <td class="label">Booking Code</td>
                    <td>#{{ $booking->booking_id }}</td>
                </tr>

                {{-- <tr>
                    <td class="label">Location Group</td>
                    <td>{{ $booking->location_group ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Location Name</td>
                    <td>{{ $booking->location_name ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Location Charge</td>
                    <td>৳ {{ $booking->location_price ?: 0 }}</td>
                </tr> --}}

                <tr>
                    <td class="label">Payment Method</td>
                    <td>{{ ucfirst($booking->payment_method) }}</td>
                </tr>
                <tr>
                    <td class="label">Created At</td>
                    <td>{{ $booking->created_at->format('d M Y') }}</td>
                </tr>
            </table>

            {{-- ================= SELECTED SERVICES ================= --}}
            <h2 class="section-title">Selected Nursing Services</h2>

            <table>
                @if (!empty($booking->selected_services))
                    @foreach ($booking->selected_services as $service)
                        <tr>
                            <td class="label">{{ $service["name"] }}</td>
                            <td>৳ {{ $service["price"] }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">No additional services selected.</td>
                    </tr>
                @endif
            </table>

            {{-- ================= TOTAL ================= --}}
            <h2 class="section-title">Payment Summary</h2>

            <table>
                <tr>
                    <td class="label">Total Price</td>
                    <td><strong>৳ {{ $booking->total_price ?: 0 }}</strong></td>
                </tr>
            </table>

            {{-- ================= PATIENT INFO ================= --}}
            <h2 class="section-title">Patient Information</h2>

            <table>
                <tr>
                    <td class="label">Patient Name</td>
                    <td>{{ @$booking->patient?->name ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Gender</td>
                    <td>{{ ucfirst(@$booking->patient?->gender ?: "N/A") }}</td>
                </tr>
                
                <tr>
                    <td class="label">Age</td>
                    <td>{{ @$booking->patient?->age ?: "N/A" }} Years</td>
                </tr>

                <tr>
                    <td class="label">Height</td>
                    <td>{{ @$booking->patient?->height ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Weight</td>
                    <td>{{ @$booking->patient?->weight ?: "N/A" }}Kg</td>
                </tr>

                <tr>
                    <td class="label">Patient Type</td>
                    <td>{{ ucfirst(@$booking->patient?->patient_type ?: "N/A") }}</td>
                </tr>

                <tr>
                    <td class="label">Country</td>
                    <td>{{ @$booking->patient?->country ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Patient Contact</td>
                    <td>{{ @$booking->patient?->patient_contact ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Emergency Contact</td>
                    <td>{{ @$booking->patient?->emergency_contact ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Address</td>
                    <td>{{ @$booking->patient?->address ?: "N/A" }}</td>
                </tr>

                <tr>
                    <td class="label">Preferred Nurse Gender</td>
                    <td>{{ ucfirst(@$booking->patient?->gender_preference ?: "N/A") }}</td>
                </tr>

                <tr>
                    <td class="label">Preferred Language</td>
                    <td>{{ @$booking->patient?->language ?: "N/A" }}</td>
                </tr>
            </table>

            @if (!empty(@$booking->patient?->special_notes))
                <div class="note-box">
                    <strong>Important Information:</strong><br>
                    {{ @$booking->patient?->special_notes }}
                </div>
            @endif

            {{-- ================= FOOTER ================= --}}
            <div class="footer">
                @if ($recipientType === "admin")
                    This is an automated system notification.<br>
                    Please review and process the booking accordingly.
                @else
                    This is an automated confirmation message.<br>
                    Our team will contact you shortly.
                @endif

                <br>
                <strong>CareOn System</strong>
            </div>

        </div>

    </body>

</html>
