<?php

namespace App\Http\Controllers;

use App\Models\Shortcut;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('profile','search');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile($username)
    {
        $username = User::all()->where('username', $username)->first();
        if($username == null)
        {
            abort(404);
        }
        $shortcuts = Shortcut::all()->where('user_id', $username->id);
        return view('profile', ['username' => $username, 'shortcuts' => $shortcuts]);
    }

    public function edit(User $user)
    {
        if($user == null)
        {
            abort(404);
        }
        return view('edit', ['user' => $user]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $shortcuts = Shortcut::where([ 
            ['title', 'LIKE', '%' . $search . '%'],
            ['body', 'LIKE', '%' . $search . '%'],
        ])->get();

        return view('search', compact('shortcuts', 'search'));
    }
}
