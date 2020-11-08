<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Http\Request;
use DB;

class BalancesController extends Controller
{
    
    public function index(Request $request)
    {

        
          $balances=balance::get();
       

          return view('balances.index',compact('balances'));
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        DB::select("CALL micursor()");  

        $cuentas=DB::table('cuentas')->get();
        
        return view('balances.create',["cuentas"=>$cuentas]);
    
    }


    public function store(Request $request)
    {
        //
        //$cuentas = Cuenta::create($request->all());

        
        //$balances=$request->except('_method', '_token');
        // $balance = new balance;
        if(count($request->nombre)>0){
        

        foreach ($request->nombre as $key=>$value) {
            $balance = new balance;
            //balance::updateOrCreate($request->cuentas_id[$key]);
            $balance->nombre= $value;
            $balance->monto = $request->monto[$key];
            $balance->fecha_inicio = $request->get('fecha_inicio');
            $balance->fecha_final = $request->get('fecha_final');
            $balance->cuentas_id = $request->cuentas_id[$key];
            $balance->save();
        }
	    
} 
        /*$i = $request->fecha_inicio;
        $f = $request->fecha_final;*/
        DB::select("CALL micursor2()"); 
        DB::select("CALL micursor2()"); 

        
        //return view('balances.create');
        //Balance::insert($balances);
        return redirect('balances');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        

            
        
    }


   
}