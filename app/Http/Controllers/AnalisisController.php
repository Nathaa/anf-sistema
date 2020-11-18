<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Balance;
use Illuminate\Support\Facades\Input;

class AnalisisController extends Controller
{
    //


    public function show($id)
    {
        //
     
     $empress=($id);

    //$fi=$id->fecha_inicial;
    
    //dd($fecha_inicial);

      $balances=DB::table('balances')
      ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
      ->select('balances.fecha_inicio','balances.fecha_final')
      ->where('cuentas.empresas_id', $id)
      ->groupBy('balances.fecha_inicio','balances.fecha_final')
      ->get();

       return view('analisis.show',compact('balances','empress'));
    }

    public function show1(Request $request,$id)
    {
      $val1='2020-10-01';
      $val2='2020-11-30';

      $sql=DB::table('balances')
      ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
      ->select('balances.nombre')
      ->where('balances.fecha_final', $val1)
      ->get();

      $sql2=DB::table('balances')
      ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
      ->select('balances.monto')
      ->where('balances.fecha_final', $val2)
      ->get();
       return view('analisis.show1',compact('sql','sql2','valor1','valor2'));
    }

    public function show2($id)
    {
        // aqui ira analisis vertical
   

      return view('analisis.show2');
    
          


    }


}
