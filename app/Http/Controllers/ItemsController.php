<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function showallItems(){
        $items = Items::all();
        return view('items', ['items' =>$items]);
    }

    public function viewSpecificItem($id){
        $items = Items::find($id);
        return view('items.specificitem', ['items' => $items]);
    }

    public function showAddItemForm(){
        return view('games.create');
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
            return redirect('/games');

        }else{
            $items = new Items();
            $items->item_name = request('item_name');
            $items->item_image = request('item_image');
            $items->item_price = request('item_price');
            $items->months = request('months');
            $items->installment_per_month = request('installement');
            $items->quantity = request('quantity');
            $items->save();
            return redirect('/games');
        }
    }
}
