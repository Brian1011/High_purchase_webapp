<?php

namespace App\Http\Controllers;

use App\Manager;
use App\User;
use Illuminate\Http\Request;

class UsersConroller extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showCustomerEditDetailsForm($customer_id)
    {
        $user = User::find($customer_id)->where('category', '1');
        return view('auth.register', ['customer' => $user]);
    }

    public function registerCustomer()
    {

        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'category' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->category = "1";
        $user->paswword = request('password');
        $user->save();
        return redirect('/home');
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
    public function addManager(){
//        $manager = null;
//        if (request('id') !== null){
//            $manager = User::find(request('id'));
//            $manager->name = request('name');
//            $manager->email = request('email');
//            $manager->category = "2";
//            $manager->password = request('password');
//            $manager->save();
//            return redirect('/games');
//
//        }else{
            $manager = new Manager();
            $manager->name = request('name');
            $manager->email = request('email');
            $manager->category = request('category');
            $manager->password = request('password');
            return redirect('/Managers');
       // }
    }
}
