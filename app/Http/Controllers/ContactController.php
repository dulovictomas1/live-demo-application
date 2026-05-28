<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class ContactController extends Controller
{
    public function savemessage( Request $request )
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
        ]);

        Form::create([
            'first_name' => $validated['firstname'],
            'surname' => $validated['surname'],
            'message' => $validated['text'],
        ]);

        return back()->with('success', 'Vaša správa bola úspešne odoslaná');
    }

    public function index()
    {
        return view('admin.message_list', [
            'messages' => Form::latest()->get(),
        ]);
    }
}
