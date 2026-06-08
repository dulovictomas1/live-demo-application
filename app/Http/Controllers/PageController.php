<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function index()
    {
        return view('admin.pages_list', [
            'pages' => Page::all(),
        ]);
    }


    public function store( Request $request )
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
        ]);

        $page = Page::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['slug']),
        ]);

        if ( $request->has('sections') ) {
            foreach ( $request->sections as $index => $section ) {
                $page->sections()->create([
                    'type' => $section['type'],
                    'content' => $section,
                    'sort_order' => $index,
                ]);
            }
        }

        return back()->with('success', 'Stránka bola vytvorená');
    }

    public function showpage( $slug )
    {
        $page = Page::with('sections')->where('slug', $slug)->firstOrFail();

        return view('page', [
            'page' => $page,
        ]);
    }


    public function edit( Page $page )
    {
        $page->load('sections');

        return view('admin.page-edit', [
            'page' => $page,
        ]);
    }

    public function update( Request $request, Page $page )
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'sections' => ['nullable', 'array'],
        ]);

        $page->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['slug']),
        ]);

        $page->sections()->delete();

        foreach ($validated['sections'] ?? [] as $index => $section) {
            $page->sections()->create([
                'type' => $section['type'],
                'content' => $section,
                'sort_order' => $index,
            ]);
        }

        return back()->with('success', 'Stránka bola upravená.');
    }
}
