<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\View\View;

use function PHPSTORM_META\type;

class RegisterController extends Controller
{
    //
    public function registerForm(): View
    {
        return view('registration.register');
    }

    public function register(Request $request)
    {
        $email = $request->request->all()['email'];
        if(!User::where('email', $email )->first()){
            $data = $request->request->all();
            // $data['password'] = hash("sha256", $data['password']);
            $data['remember_token'] = Str::random(10);
            $user = User::create($data);
            $user->save();
            return redirect('/login');
            
        }else{
            return('User already exists');
        }
        // dd($request->request->all()['email'], $user);
    }
    public function loginForm(): View
    {
        return view('registration.login');
    }
    public function login(Request $request)
    {
        // dd($request);
        $user = User::where('email',$request->request->all()['email'])->first();
        if($user &&  Hash::check($request->request->all()['password'],$user->password) )
        {
            return("Success Login".  $user->name);
        }else{
            return("Wrong Username | password");
        }
    }
}
