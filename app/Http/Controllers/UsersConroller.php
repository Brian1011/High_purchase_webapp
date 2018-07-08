<?php

namespace App\Http\Controllers;

use App\Manager;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersConroller extends Controller
{

    public function showCustomerEditDetailsForm($customer_id)
    {
        $user = User::find($customer_id)->where('category', '1');
        return view('auth.register', ['customer' => $user]);
    }

    public function login(Request $request){
        //no need for validation
        $user = new Manager();

        //check if the email address exists
        $email = $request->input('email');
        $user_pass = $request->input('password');
        $user['email'] = $email;

        if($user = Manager::where('email','=',$email)->first()){
            /*
             *  email exists
             *  Go to database and select password
             */

            if(Hash::check($user_pass,$user->password)){
                //$user['authorize'] = "authorized";

                //store a piece of info after login
                session(['user_id'=>$user->id]);
                session(['user_name'=>$user->name]);
                session(['user_email'=>$user->email]);
                session(['user_category'=>$user->category]);
                return view('profile');

            }else{
                //$user['authorize'] = "Not Authorized";
                return back()->with('message','Invalid Email or password');
            }

        }else{

            return back()->with('message','Invalid Email or password');
        }

    }
    public function addCustomer(){

        //1. ensure data is not empty
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customer',
            'password' => 'required|string|min:6|confirmed',
            'category' => 'required',
        ]);

            $managers = new Manager();
            $managers->name = request('name');
            $managers->email = request('email');
            $managers->password = Hash::make(request('password'));
            $managers->category = request('category');
            $managers->save();
            return view('login')->with('message','You have been signed Up');

    }

    public function editCustomerDetails($customer_id)
    {
        $user = User::find($customer_id);
        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        return redirect('/home');
    }

    public function showallManagers(){
        $manager = Manager::all()->where('category', '2');
        return view('Admin.Managers', ['manager' =>$manager]);
    }

    public function viewSpecificManager($id){
        $manager = Manager::find($id);
        return view('Admin.AddManager', ['manager' => $manager]);
    }

    public function showAddManagerForm(){
        return view('Admin.AddManager');
    }

    //checks if the form is blank if it is it updates the content if it is not it creates a new item
    public function addManager(Request $request){
        //validations
        //1. ensure data is not empty
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customer',
            'password' => 'required|string|min:6|confirmed',
            'category' => 'required',
        ]);

        $managers = null;
        if (request('id') !== null){
            $managers = Manager::find(request('id'));
            $managers->name = request('name');
            $managers->email = request('email');
            $managers->password = Hash::make(request('password'));
            $managers->category = request('category');
            $managers->save();
            return redirect('/Managers')->with('message','Record has been updated sucessfully');
        }else{

            $managers = new Manager();
            $managers->name = request('name');
            $managers->email = request('email');
            $managers->password = Hash::make(request('password'));
            $managers->category = request('category');
            $managers->save();
            return redirect('/Managers')->with('message','Record has been saved sucessfully');
        }

    }

    public function logout(Request $request){
        $request->session()->flush();//errase all sessions
        //go back to homepage
        return view('login')->with('message_logout','You have logged out sucessfully');
    }
}
