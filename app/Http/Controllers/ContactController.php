<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(GeneralSettings $generalSettings)
    {
        /**
         * Settings Resources
         */
        $general = $generalSettings->toArray();

        return view('pages.contact', compact('general'));
    }

    public function sendMessage(Request $request)
    {
        try {
            $validateRequest = Validator::make($request->all(), [
                'name' => 'required|min:3|max:120',
                'email' => 'required|email',
                'subject' => 'required|min:3|max:120',
                'message' => 'required|max:2000',
            ], [
                'name.required' => 'Nama harus diisi',
                'name.min' => 'Nama minimal 3 karakter',
                'name.max' => 'Nama maksimal 120 karakter',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email harus valid',
                'subject.required' => 'Subject harus diisi',
                'subject.min' => 'Subject minimal 3 karakter',
                'subject.max' => 'Subject maksimal 120 karakter',
                'message.required' => 'Pesan harus diisi',
                'message.max' => 'Pesan maksimal 2000 karakter',
            ]);

            if($validateRequest->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validateRequest->errors()
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
