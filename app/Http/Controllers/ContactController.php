<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Rules\MinWord;
use App\Settings\GeneralSettings;
use App\Settings\PageSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(GeneralSettings $generalSettings, PageSettings $pageSettings)
    {
        // Settings
        $general = $generalSettings->toArray();
        $pages = $pageSettings->toArray();

        return view('pages.contact', compact('general', 'pages'));
    }

    public function sendMessage(Request $request)
    {
        try {
            $validateRequest = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'subject' => 'required|min:3',
                'message' => ['required', new MinWord('Pesan', 3, 'id')],
                'g-recaptcha-response' => 'required'
            ], [
                'name.required' => 'Nama harus diisi',
                'name.min' => 'Nama minimal 3 karakter',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email harus valid',
                'subject.required' => 'Subject harus diisi',
                'subject.min' => 'Subject minimal 3 karakter',
                'message.required' => 'Pesan harus diisi',
                'g-recaptcha-response.required' => 'Please verify that you are not a robot'
            ]);

            if($validateRequest->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validateRequest->errors()
                ], 422);
            }

            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => $request->get('g-recaptcha-response')
            ];
            $options = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                ]
            ];
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $resultJson = json_decode($result);
            if ($resultJson->success != true) {
                return response()->json([
                    'status' => false,
                    'errors' => ['recaptcha' => 'reCaptcha Error!']
                ], 422);
            }

            Message::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'subject' => $request['subject'],
                'message' => $request['message']
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengirimkan pesan!'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
