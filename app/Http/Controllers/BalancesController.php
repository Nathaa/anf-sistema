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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        //$balances = balance::create($request->all());

        $balances=request()->except('_token');
    
        Balance::insert($balances);

        return view('cuentas.create');
    }


    
}
