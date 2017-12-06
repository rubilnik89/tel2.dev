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
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'middle_name' => 'nullable|string',
            'phone1' => 'sometimes|numeric',
            'phone2' => 'sometimes|numeric',
            'phone3' => 'sometimes|numeric',
            'phone4' => 'sometimes|numeric',
            'phone5' => 'sometimes|numeric',
            'phone6' => 'sometimes|numeric',
            'phone7' => 'sometimes|numeric',
            'phone8' => 'sometimes|numeric',
            'phone9' => 'sometimes|numeric',
            'phone10' => 'sometimes|numeric',
        ]);

        $phones = [];

        for($i = 1; $i < 11; $i++) {
            $var = 'phone' . $i;
            if(isset($request->$var)){
                array_push($phones, $request->$var);
            }
        }

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
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'middle_name' => 'nullable|string',
            'phone1' => 'sometimes|numeric',
            'phone2' => 'sometimes|numeric',
            'phone3' => 'sometimes|numeric',
            'phone4' => 'sometimes|numeric',
            'phone5' => 'sometimes|numeric',
            'phone6' => 'sometimes|numeric',
            'phone7' => 'sometimes|numeric',
            'phone8' => 'sometimes|numeric',
            'phone9' => 'sometimes|numeric',
            'phone10' => 'sometimes|numeric',
        ]);


        $user = User::find($request->id);

        $phones = [];
        for($i = 1; $i < 11; $i++) {
            $var = 'phone' . $i;
            if(isset($request->$var)){
                array_push($phones, $request->$var);
            }
        }

        $user->update([
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
