<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator, Input, Redirect; 
use App\Models\User;

class AdminController extends Controller{
    // Home page.
    public function index() {
        // Send content to welcome view.
        // return view('/home/index', [
        //      'pageTitle'=>'Welcome'
        // ]);
    }

    // Displays login form.
    public function login() {
        return view('/');
    }

      public function createUser(Request $request)
    {
        // validate request
        $this->validate($request, [
            'name' => 'required',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6',
        ]);
        $password = bcrypt($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);
        return back()->with('success','Item created successfully!');
        return back()->with('error','You need to fill the form out ');
        return redirect('/about');
    }
    
    public function editUser(Request $request)
    {
        // validate request
        $this->validate($request, [
            'name' => 'required',
            'email' => "bail|required|email|unique:users,email,$request->id",
            'password' => 'min:6',
        ]);
        $data = [
            'fullName' => $request->fullName,
            'email' => $request->email,
        ];
        if ($request->password) {
            $password = bcrypt($request->password);
            $data['password'] = $password;
        }
        $user = User::where('id', $request->id)->update($data);
        return $user;
    }

    public function getUsers()
    {
        return User::get();
    }


    public function verifyLogin(Request $request)
    {
        // validate request
        $this->validate($request, [
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6',
        ]);
        $credentials = $request->except(['_token']);
        $user = User::where('name',$request->name)->first();

        if (auth()->attempt($credentials)) {
            return redirect('/about');
        } else{
            return back()->with('error',
            'An error occurred during login. Please try again.');
        }
    }


    // Accepts POST of new user data.
    public function store(Request $request) {   

        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 
                        'unique:users'],
            'password' => 'required'
        ]);
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'role'=>trim($request->input('role')),
        ]);
        return back()->with('success','Item created successfully!');
        return redirect('/');
    }   
    
    // Logs user out.
    public function logout()
    {
        \Auth::logout();
        return redirect('/home/login');
    }
}
