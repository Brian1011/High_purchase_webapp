<?php

namespace App\Http\Controllers;

use App\installments;
use App\Items;
use App\Manager;
use Illuminate\Http\Request;

class InstallmentsController extends Controller
{
    public function addInstallement(){

        $installemts = null;
        if (request('id') !== null) {

            $installemts = installments::find(request('id'));
            $installemts->user_id = request('user_id');
            $installemts->item_id = request('item_id');
            $installemts->amount_paid = request('amount_paid');
            $installemts->total_amount = request('total_amount');
            $installemts->save();
            //return $installemts;
           // return redirect('/myInstallement');
            return back()->with('message','Changes made sucessfully');

        }else{
            //new installment
            $installemts = new installments();
            $installemts->user_id = request('user_id');
            $installemts->item_id = request('item_id');
            $installemts->amount_paid = 0;
            $installemts->total_amount = request('total_amount');
            $installemts->save();

            /*
                also get the item using the
                item id and subtract 1
             */
            $items = new Items();
            $items::where('id',request('item_id'))->decrement('quantity',1);

            return back()->with('message','You have sucessfully bought this item. Click My purchases to view your items.');
           // return $installemts;
        }


    }

    public function editInstallement(){

    }

    public function viewSpecificInstallement($id){
        $installement = installments::all()->where('category', $id);
        return view('all_purchases', ['installement' => $installement]);
    }

    public function showallInstallements(){
        $installement = Manager::all();
        return view('A', ['installement' =>$installement]);
    }

    //see a specific user installments
    public function showCustomerInstallments(){
        //get the user session id
        $current_logged_user = session('user_id');
        $user_installments = installments::where('user_id','=',$current_logged_user)->get();

        //do a relation with the items table
        foreach ($user_installments as $ui){
            //loop through each item id
            $item_id = $ui->item_id;

            //get the details for each item from the items table
            $items = Items::find($item_id);
            $ui['item_image'] = $items->item_image;
            $ui['item_name']=$items->item_name;
            $ui['installment_per_month']=$items->installment_per_month;
            $ui['months']=$items->months;
        }

        return view('all_purchases',['user_installment'=>$user_installments]);
    }

    //show_user_payment
    public function show_user_payment($id){
        //return a view with details
        $user_installments = installments::find($id);
        $user_id = $user_installments->user_id;
        $item_id = $user_installments->item_id;

        //get the user name and email
        $user = Manager::find($user_id);
        $user_installments['name']=$user->name;
        $user_installments['email']=$user->email;

        //add item installment months
        $items = Items::find($item_id);
        $user_installments['item_image'] = $items->item_image;
        $user_installments['months']=$items->months;
        $user_installments['item_name']=$items->item_name;
        $user_installments['installment_per_month']=$items->installment_per_month;

        return view('add_customer_payment',['user_installment'=>$user_installments]);
    }

    //delete an installment record
    public function delete_installment($id){
        $installment = installments::find($id);
        $installment->delete();
        return back()->with('message','Record Erased Sucessfully');
    }

    //Update the payment of the user
    public function add_user_payment(Request $request){
        //take the payment plan
        $montly_installment = $request->input('montly_installment');
        $installment_id = $request->input('installment_id');

        //Add to the previous amount this amount
        installments::where('id',$installment_id)->increment('amount_paid',$montly_installment);

        return back()->with('message',''.$montly_installment.' Ksh has been added to this account');
    }

}
