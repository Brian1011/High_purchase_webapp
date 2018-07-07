<?php

namespace App\Http\Controllers;

use App\Items;
use App\Manager;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function showallItems(){
        $items = Items::all();
        return view('Admin.Item', ['items' =>$items]);
    }

    public function viewSpecificItem($id){
        $items = Items::find($id);
        return view('Admin.addItem', ['items' => $items]);
    }

    public function showAddItemForm(){
        return view('Admin.addItem');
    }

    //checks if the form is blank if it is it updates the content if it is not it creates a new item
    public function addItem(){
        $items = null;
        if (request('id') !== null){
            $items = Items::find(request('id'));
            $items->item_name = request('item_name');
            $items->item_image = request('item_image');
            $items->item_price = request('item_price');
            $items->months = request('months');
            $items->installment_per_month = request('installement');
            $items->quantity = request('quantity');
            $items->save();
            return redirect('/Item');

        }else{
            $items = new Items();
            $items->item_name = request('item_name');
            $items->item_image = request('item_image');
            $items->item_price = request('item_price');
            $items->months = request('months');
            $items->installment_per_month = request('installement');
            $items->quantity = request('quantity');
            $items->save();
            return redirect('/Item');
        }
    }

    public function add(){

        $managers = null;
        if (request('id') !== null){
            $managers = Manager::find(request('id'));
            $managers->name = request('name');
            $managers->email = request('email');
            $managers->password = request('password');
            $managers->category = request('category');
            $managers->save();
            return redirect('/Managers');
        }else{

            $managers = new Manager();
            $managers->name = request('name');
            $managers->email = request('email');
            $managers->password = request('password');
            $managers->category = request('category');
            $managers->save();
            return redirect('/Managers');
        }

    }


}
