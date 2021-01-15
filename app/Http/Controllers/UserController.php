<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    // public function __construct()
    //     {
    //         $this->middleware('checkuser');
    //     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function login(Request $request)
    {
        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !$request->password){
            return 'Password Or Email Not Mached';
        }else{
            
                $request->session()->put('user', $user);
                return redirect('users');
            
            
        }
        // return view('pages.login');

        
    }
    public function index(){
            $users = User::get();
            return view('pages.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (session()->has('user')) {
        //     return redirect('users');
        // }else{
            return view('pages.register');
        // }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'Name is required',
            'password.required' => 'Password is required'
        ]);
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        return redirect('login')->with('success','Registraion Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userEdit = User::where('id',$id)->first();
        return view('pages.edit',compact('userEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        User::where('id',$request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        return redirect('users')->with('updated', 'Updated Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         User::where('id',$id)->delete();
        return redirect('logout');
    }
}
