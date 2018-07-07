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
            return redirect('/myInstallement');

        }else{

            $installemts = new installments();
            $installemts->user_id = request('user_id');
            $installemts->item_id = request('item_id');
            $installemts->amount_paid = request('amount_paid');
            $installemts->total_amount = request('total_amount');
            $installemts->save();
            return redirect('/myInstallement');
        }


    }

    public function editInstallement(){




    }

    public function viewSpecificInstallement($id){
        $installement = installments::all()->where('category', $id);
        return view('', ['installement' => $installement]);
    }

    public function showallInstallements(){
        $installement = Manager::all();
        return view('A', ['installement' =>$installement]);
    }
}
