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
        $user = new User();
        $email = request('email');
        $password = request('password');


        if (User::where('email', '=', $email)->first()) {

            if (($user = User::where('password', '=', $password))){

                return redirect('/purchase');
            }
        }else{

            return redirect('/addmanager');
        }

    }
    public function addCustomer(){

//        $this->validate(request(),[
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//             'category' => 'required',
//        ]);

            $managers = new Manager();
            $managers->name = request('name');
            $managers->email = request('email');
            $managers->password = Hash::make(request('password'));
            $managers->category = request('category');
            $managers->save();
            return redirect('/login');

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
            'email' => 'required|string|email|max:255|unique:users',
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
}
