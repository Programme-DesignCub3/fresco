<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(GeneralSettings $generalSettings)
    {
        $general = $generalSettings->toArray();

        return view('pages.contact', compact('general'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Message::create($request->all());
    }
}
