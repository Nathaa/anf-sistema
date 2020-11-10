<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\HomeController;
use DB;
Use Redirect;
use Illuminate\Support\Facades\Input;

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
        
        //DB::select("CALL micursor()");  

        $cuentas=DB::table('cuentas')->get();
        
        return view('balances.create',["cuentas"=>$cuentas]);
    
    }


    public function store(Request $request)
    {
       

        

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

        $input = Input::all(); 
        //Input::flash($input));  //ESTABLECE VARIABLE DE SESIÓN
        
        DB::select("CALL micursor2(1)"); 
        DB::select("CALL micursor2(1)"); 

        

       // $diferencia=DB::selectone("select micursor3() as valor");

        
        
       /* if ($diferencia->valor != 0) {
            
            
            return Redirect::route('balances.create')  //vale con: Redirect::
                    ->with('message', '<h4>There were validation errors<h4>')
                    ->withInput(Input::all());  

            //Session::flash('message','El Balance General tiene una diferencia de: $'. $diferencia->valor.' favor revisar.');
            //return Redirect::to('balances/balance')->withInput();
            //return redirect()->route('balances.create')->withInput();
            //return Redirect::back()->withInput();
            
              
        }*/

       
       // else{

            return redirect('balances');
            
       // }


       
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