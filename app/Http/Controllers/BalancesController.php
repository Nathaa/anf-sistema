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


    public function create()
    {
        /*
        DB::select("CALL micursor()");  
        
        return view('balances.create',compact('balances'));*/
        $balances=balance::get();
         $cuentas = DB::table('cuentas')->get();
         return view('balances.create', ["cuentas"=> $cuentas],["balances"=> $balances]);
         
    
    }


    public function store(Request $request)
    {
        
        
        if( count($request->nombre) > 0){
            foreach ($request->nombre as $key => $value) {
               $balance = new Balance();

               $balance->nombre = $value;
               $balance->monto = $request->monto[$key];
               $balance->fecha_inicio = $request->get('fecha_inicio');
               $balance->fecha_final = $request->get('fecha_final');
               $balance->cuenta_id = $request->cuenta_id[$key];
               $balance->save();
              
            }
        }
        
        return redirect('balances');

    }
   
    
}
