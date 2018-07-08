<?php

namespace App\Http\Controllers;

use App\installments;
use App\Items;
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
}
