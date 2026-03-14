<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Careon OTP Verification Email</title>
    </head>

    <body style="margin:0;background:#f5f5f5;font-family:Arial,Helvetica,sans-serif;">

        <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
            <tr>
                <td align="center">

                    <table width="520" cellpadding="0" cellspacing="0"
                        style="background:#ffffff;border-radius:10px;padding:40px;">

                        <!-- Logo -->
                        <tr>
                            <td style="font-size:24px;font-weight:700;color:#000;">
                                CareOn
                            </td>
                        </tr>

                        <tr>
                            <td height="25"></td>
                        </tr>

                        <!-- Title -->
                        <tr>
                            <td style="font-size:23px;font-weight:700;color:#000;">
                                Verify your Email
                            </td>
                        </tr>

                        <tr>
                            <td height="15"></td>
                        </tr>

                        <!-- Text -->
                        <tr>
                            <td style="font-size:16px;color:#555;line-height:1.6;">
                                Use the verification code below to complete your registration.
                                If you didn’t request this code, you can safely ignore this email.
                            </td>
                        </tr>

                        <tr>
                            <td height="30"></td>
                        </tr>

                        <!-- OTP Box -->
                        <tr>
                            <td align="center">

                                <div
                                    style="
                                    display:inline-block;
                                    font-size:32px;
                                    letter-spacing:6px;
                                    font-weight:700;
                                    background:#000;
                                    color:#fff;
                                    padding:16px 32px;
                                    border-radius:8px;
                                    ">
                                    {{ $otp }}
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td height="30"></td>
                        </tr>

                        <tr>
                            <td height="30"></td>
                        </tr>

                        <!-- Footer -->
                        <tr>
                            <td style="font-size:14px;color:#777;line-height:1.6;">
                                This verification code will expire in <strong>5 minutes</strong>.
                            </td>
                        </tr>

                        <tr>
                            <td height="25"></td>
                        </tr>

                        <tr>
                            <td style="font-size:14px;color:#777;">
                                Best,<br>
                                CareOn Team
                            </td>
                        </tr>

                    </table>

                </td>
            </tr>
        </table>

    </body>

</html>
