<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Doctor Visit Invoice</title>

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
                            Doctor Visit Invoice
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

            <!-- BOOKING INFORMATION -->
            <div class="section-title">Booking Information</div>
            <table class="info-table">
                <tr>
                    <td class="label">Booking ID</td>
                    <td class="value">#{{ $booking->booking_id }}</td>
                </tr>

                <tr>
                    <td class="label">Doctor Type</td>
                    <td class="value">{{ $booking->doctor_type }}</td>
                </tr>

                <tr>
                    <td class="label">Appointment Date</td>
                    <td class="value">
                        {{ \Carbon\Carbon::parse($booking->appointment_date)->format("F d, Y") }}
                    </td>
                </tr>

                <tr>
                    <td class="label">Appointment Time</td>
                    <td class="value">
                        {{ \Carbon\Carbon::parse($booking->appointment_time)->format("h:i A") }}
                    </td>
                </tr>
            </table>


            <!-- PATIENT INFORMATION -->
            <div class="section-title">Patient Details</div>
            <table class="info-table">
                <tr>
                    <td class="label">Patient Name</td>
                    <td class="value">{{ $booking->patient_name }}</td>
                </tr>

                <tr>
                    <td class="label">Age</td>
                    <td class="value">{{ $booking->patient_age }} Years</td>
                </tr>

                <tr>
                    <td class="label">Gender</td>
                    <td class="value">{{ ucfirst($booking->gender) }}</td>
                </tr>

                <tr>
                    <td class="label">Phone</td>
                    <td class="value">{{ $booking->phone }}</td>
                </tr>

                <tr>
                    <td class="label">Email</td>
                    <td class="value">{{ $booking->email }}</td>
                </tr>

                <tr>
                    <td class="label">Nationality</td>
                    <td class="value">{{ $booking->nationality }}</td>
                </tr>
            </table>

            <!-- NOTES -->
            <div class="section-title">Problem</div>
            <table class="info-table">
                <tr>
                    <td class="label">Notes</td>
                    <td class="value">{{ $booking->problem ?: "N/A" }}</td>
                </tr>
            </table>

            <!-- FOOTER -->
            <div class="footer">
                This invoice is system generated and does not require a signature.<br>
                © {{ date("Y") }} CareOn. All rights reserved.
            </div>

        </div>

    </body>

</html>
