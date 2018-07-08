<?php

namespace App\Http\Controllers;

use App\Items;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function purchaseItem($id){
        $items = Items::find($id);
        return view('purchase_item', ['items' => $items]);
    }

    public function showAddItemForm(){
        return view('Admin.addItem');
    }

    //checks if the form is blank if it is it updates the content if it is not it creates a new item
    public function addItem(Request $request){
        $items = null;
        if (request('id') !== null){
            //validate the data
            $request->validate([
                'item_name' => 'required',
                'item_price'=>'required|integer',
                'months'=>'required|integer',
                'installement'=>'required|integer',
                'quantity'=>'required|integer'
            ]);
            //when validation fails we return student to same page by default

            //deal with the image
            if(request('item_image')!=null){
                //a new image has been added
                //validate the image
                $request->validate([
                    'item_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                //change the image name
                $image = request('item_image');
                $new_name = rand().'.'.$image->getClientOriginalExtension(); //give it a random name
                $image->move(public_path("images"),$new_name);//take the new name and send it to the database
            }else{
                //there is no new image take the old image
                $new_name = request('old_item_image');
            }

            $items = Items::find(request('id'));
            $items->item_name = request('item_name');
            $items->item_image = $new_name;
            $items->item_price = request('item_price');
            $items->months = request('months');
            $items->installment_per_month = request('installement');
            $items->quantity = request('quantity');
            $items->save();
            return redirect('/Item_add')->with('message','Record has been updated');

        }else{
            //validate the data
            $request->validate([
                'item_name' => 'required',
                'item_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'item_price'=>'required|integer',
                'months'=>'required|integer',
                'installement'=>'required|integer',
                'quantity'=>'required|integer'
            ]);
            //when validation fails we return student to same page by default

            //deal with the image
            $image = request('item_image');
            $new_name = rand().'.'.$image->getClientOriginalExtension(); //give it a random name
            $image->move(public_path("images"),$new_name);//take the new name and send it to the database

            $items = new Items();
            $items->item_name = request('item_name');
            $items->item_image = $new_name;
            $items->item_price = request('item_price');
            $items->months = request('months');
            $items->installment_per_month = request('installement');
            $items->quantity = request('quantity');
            $items->save();
            return redirect('/Item_add')->with('message','Record saved successfully');
        }
    }




}
