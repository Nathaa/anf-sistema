<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Http\Request;
use DB;

class BalancesController extends Controller
{
    //

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

       


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        DB::select("CALL micursor()");  
        $balances = balance::get();
        return view('balances.create',compact('balances'));
    
    }

    public function store(Request $request)
    {
        //
        //$cuentas = Cuenta::create($request->all());

        $balances=request()->except('_token');
        
     
        $balances = new balance;

    $balances->nombre = $request->nombre;
    $balances->monto = $request->monto;
    $balances->suburb = $request->suburb;
    $balances->street = $request->street;
    $balances->o_number = $request->onumber;
    $balances->i_number = $request->inumber;
    $balances->postal_code = $request->postal_code;
    $balances->phone_s = $request->phone_s;
    $balances->email_s = $request->email_s;
    $balances->google_map = $request->map;
    $balances->customer_id = $customer_id;

    $success = $balances->save()
        Balance::insert($balances);

        return view('cuentas.create');
    }
}
