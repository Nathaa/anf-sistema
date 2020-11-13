<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Cuenta;
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

    public function index2(Request $request, $id)
    {

       
        $balances=DB::table('balances')
        ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
        ->select('balances.fecha_inicio','balances.fecha_final','balances.id')
        ->where('cuentas.empresas_id', $id)
        ->groupBy('balances.fecha_inicio','balances.fecha_final','balances.id')
        ->get();
       

          return view('balances2',compact('balances'));
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

        

       $diferencia=DB::selectone("select micursor3() as valor");

        
        
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
        
        //DB::select("CALL micursor()");  

        //$cuentas=DB::table('cuentas')->get();
       
 
       $empresas=$id;
   
      $cuentas=DB::table('cuentas')
      ->join('empresas','cuentas.empresas_id','=', 'empresas.id')
      ->select('cuentas.nombre','cuentas.id','cuentas.codigo_padre')
      ->where('cuentas.empresas_id', $empresas)
      ->get();
      
        //$cuentas=Cuenta::findOrFail($id);
                
        return view('balances.edit',["cuentas"=>$cuentas],["empresas"=>$empresas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        if(count($request->nombre)>0)
        {
        

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
        
          DB::select("CALL micursor2($id)"); 
          DB::select("CALL micursor2($id)"); 
 
          return redirect('empresas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

   

   public function destroy($id)
    {
    $str_arr = preg_split("/\|/", $id);
    $inicio = $str_arr[0];
    $final = $str_arr[1];
     dd($inicio . "-" . $final);


     $borrar=DB::table('balances')
     ->where('balances.fecha_inicio', $inicio/*->fecha_inicio*/)
    ->where('balances.fecha_final', $final/*->fecha_final*/);
     
     $borrar->delete();
    

     return redirect('balances2');
    }
      
      //dd($inicio);
    
 


   
}