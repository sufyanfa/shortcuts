<?php

namespace App\Http\Controllers;

use App\Models\Shortcut;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class ShortcutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit',]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortcuts = Shortcut::all();
        return view('shortcuts.index', ['shortcuts' => $shortcuts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shortcuts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title'  => ['required', 'string'],
            'body'   => ['required', 'string'],
            'url'    => ['required', 'url'],
            'icon'   => ['required', 'string'],
            'color'  => ['required', 'string'],
        ]);

        auth()->user()->shortcuts()->create([
            'title' => $data['title'],
            'body' => $data['body'],
            'url' => $data['url'],
            'icon' => $data['icon'],
            'color' => $data['color'],
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shortcut  $shortcut
     * @return \Illuminate\Http\Response
     */
    public function show(Shortcut $shortcut)
    {
        if($shortcut == null)
        {
            abort(404);
        }
        return view('shortcuts.show', compact('shortcut'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shortcut  $shortcut
     * @return \Illuminate\Http\Response
     */
    public function edit(Shortcut $shortcut)
    {
        if($shortcut == null)
        {
            abort(404);
        }
        //$this->authorize('update', $shortcut);
        return view('shortcuts.edit', ['shortcut' => $shortcut]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shortcut  $shortcut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shortcut $shortcut)
    {
        if($shortcut == null)
        {
            abort(404);
        }
        //$this->authorize('update', $shortcut);
        $data = request()->validate([
            'title'  => ['required', 'string'],
            'body'   => ['required', 'string'],
            'url'    => ['required', 'url'],
            'icon'   => ['required', 'string'],
            'color'  => ['required', 'string'],
        ]);

        $shortcut->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'url' => $data['url'],
            'icon' => $data['icon'],
            'color' => $data['color'],
        ]);

        return redirect('/shortcuts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shortcut  $shortcut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shortcut $shortcut)
    {
        if($shortcut == null)
        {
            abort(404);
        }
        $this->authorize('update', $shortcut);
        $shortcut->delete();
        return redirect('/shortcuts');
    }
}
