<?php

namespace App\Http\Controllers;

use App\Events\UserUpdatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit()
    {
        return view('pages.profile-edit');

        /**
         * Poti face asta pentru a cache-ui view-ul daca e unul care nu se schimba prea des.

            return \Cache::tags('views')->remember('pages.profile-edit',60,function(){
                return \View::make('pages.profile-edit')->render();
            });
        */
    }

    public function update(Request $request)
    {
        if (empty($request->input('password'))) {
            $this->validate($request, [
                'name' => 'required|min:5'
            ]);
            $request->user()->update([
                'name' => $request->get('name')
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|min:5',
                'password' => 'required|min:6'
            ]);
            $request->user()->update([
                'name' => $request->get('name'),
                'password' => bcrypt($request->get('password'))
            ]);
        }

        event(new UserUpdatedData($request->user()));

        if($request->ajax()){
            return response()->json(auth()->user(),200);
        }
        else{
            return response(auth()->user(), 200);
        }
    }
}
