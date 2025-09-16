<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: sans-serif;
                font-size: 14px;
            }
        </style>
        <title>{{ env('APP_NAME') }}</title>
    </head>
    <body style="background: #eeeeee">
        <table width="100%" cellspacing="0" cellpadding="0" style="min-height: max-content; background: #eeeeee; padding: 120px 20px 120px 20px">
            <tr>
                <td align="center">
                    <table width="100%" cellspacing="0" cellpadding="0" style="max-width: 768px; width: 100%; background: #dfdfdf; border-top-left-radius: 16px; border-top-right-radius: 16px; padding: 16px 32px">
                        <tr>
                            <td>
                                <img style="width: 100%; max-width: 150px" src="{{ asset('assets/images/logo.png') }}" alt="Fresco" draggable="false" />
                            </td>
                            <td align="right">
                                <p style="font-size: 18px; font-weight: 600">Contact Form Response</p>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" style="max-width: 768px; width: 100%; padding: 40px; background: white; border-bottom-left-radius: 16px; border-bottom-right-radius: 16px">
                        <tr>
                            <td>
                                <div style="margin-bottom: 16px">
                                    <p style="font-weight: 700; margin-bottom: 6px">Nama</p>
                                    <p>{{ $data['name'] }}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="margin-bottom: 16px">
                                    <p style="font-weight: 700; margin-bottom: 6px">Email</p>
                                    <p>{{ $data['email'] }}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="margin-bottom: 16px">
                                    <p style="font-weight: 700; margin-bottom: 6px">Subject</p>
                                    <p>{{ $data['subject'] }}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <p style="font-weight: 700; margin-bottom: 6px">Pesan</p>
                                    <p>{{ $data['message'] }}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
