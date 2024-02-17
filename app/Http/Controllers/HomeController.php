<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function users()
    {
        $users = User::get();
        return view('users', compact('users'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data['name']      = $request->name;
        $data['email']     = $request->email;
        $data['password']  = Hash::make($request->password);

        User::create($data);
        return redirect()->route('user.index');
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data['name']      = $request->name;
        $data['email']     = $request->email;
        if ($request->password) {
            $data['password']  = Hash::make($request->password);
        }

        User::whereId($id)->update($data);
        return redirect()->route('user.index');
    }

    public function destroy($id) 
    {
        User::whereId($id)->delete();
        return redirect()->route('user.index');
    }
}
