<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        return view('editProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $data = request()->validate([
            'name'       => ['required', 'string'],
            'username'   => ['required', 'string'],
            'photo_url'  => ['required', 'url'],
            'bio'        => ['required', 'string'],
            'url'        => ['required', 'url'],
        ]);
        
        $user =Auth::user();
        $user->update([
            'name' => $data['name'],
            'username' => $data['username'],
            'photo_url' => $data['photo_url'],
            'bio' => $data['bio'],
            'url' => $data['url'],
        ]);
        $username = Auth::user()->username;
        //$user->save();
        return redirect('/user/{username}');
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
