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
   

      $valor2=$request->fecha_final;
      $valor1=$request->fecha_inicio;
      $sql = "SELECT c.nombre As nom,c.monto AS vact,b.monto As valor_ant, c.monto-b.monto AS variacion From balances c, balances b WHERE c.fecha_final=$valor2 AND b.fecha_inicio=$valor1 AND c.nombre=b.nombre";
          return view('analisis.show1',compact('sql'));

    }

    public function show2($id)
    {
        // aqui ira analisis vertical
   

      return view('analisis.show2');
    
          


    }


}
