<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function main()
    {
        $people = User::all();

        return view('welcome', compact('people'));
    }

    public function add(Request $request)
    {
        $phones = get_phones_arr($request);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'phone' => json_encode($phones),
        ]);

        return redirect(route('main'));
    }

    public function single(Request $request)
    {
        $user = User::find($request->id);
        return view('single', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('edit', compact('user'));
    }

    public function edit_post(Request $request)
    {
        $phones = get_phones_arr($request);

        User::where('id', $request->id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'middle_name' => $request->middle_name,
                'phone' => json_encode($phones),
            ]);

        return redirect(route('main'));
    }

    public function delete(Request $request)
    {
        User::where('id', $request->id)->delete();
        return redirect(route('main'));
    }
}
