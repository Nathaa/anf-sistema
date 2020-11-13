<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Balance;

class AnalisisController extends Controller
{
    //


    public function show($id)
    {
        //
     
     $empress=($id);
    // dd($empress);

      $balances=DB::table('balances')
      ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
      ->select('balances.fecha_inicio','balances.fecha_final')
      ->where('cuentas.empresas_id', $id)
      ->groupBy('balances.fecha_inicio','balances.fecha_final')
      ->get();

          return view('analisis.show',compact('balances','empress'));
    }

    public function show1($id)
    {
        //
     
     //aqui ira analisis horizonal

          return view('analisis.show1');
    }

    public function show2($id)
    {
        // aqui ira analisis vertical
     
    
          return view('analisis.show2');
    }


}
