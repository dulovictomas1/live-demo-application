<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services_list', [
            'services' => Service::all(),
        ]);
    }

    public function showdetail($id)
    {
        $service = Service::where('id', $id)->firstOrFail();

        return view('admin.service_update_form', [
            'service' => $service,
        ]);
    }

    public function create_service( Request $request )
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
        ]);

        Service::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['slug']),
            'content' => $validated['text'],
        ]);

        return back()->with('success', 'Služba bola úspešne vytovrená');
    }

    public function updateservice( Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
        ]);

        Service::where('id', $id)->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['slug']),
            'content' => $validated['text'],
        ]);

        return back()->with('success', 'Služba bola aktualizovaná');
    }

    public function deleteservice($id)
    {
        Service::findOrFail($id)->delete();

        return back()->with('success', 'Služba bola zmazaná');
    }

    public function servicepage($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('service', [
            'service' => $service,
        ]);
    }
}
