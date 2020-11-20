<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Balance;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Empresa;

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
      $valant=$request->fecha_inicial;
      $valact=$request->fecha_final;
       return view('analisis.show1',compact('valant','valact'));
    }    

    
    public function show11(Request $request,$id)
    {
      $valant=$request->fecha_inicial;
      $valact=$request->fecha_final;
       return view('analisis.show11',compact('valant','valact'));
    }
    
    public function show2(Request $request, $id)
    {

      $activoCorriente = 0;
      $activoNcorriente = 0;
      $pasivoCorriente = 0;
      $pasivoNcorriente = 0;

      $empresa = Empresa::where("id", $id)->first();

      $final = $request->fecha_final;


      $balance1=DB::table('balances')

      ->select('balances.nombre', 'balances.monto')

      ->where('balances.fecha_final', $final)

      ->get();

      foreach ($balance1 as $key => $value) {
        # code...
        if ($value->nombre=='ACTIVO CORRIENTE') {
          # code...
          $activoCorriente = $value->monto;
        }
        if ($value->nombre=='ACTIVO NO CORRIENTE') {
          # code...
          $activoNcorriente = $value->monto;
        }
        if ($value->nombre=='PASIVO CORRIENTE') {
          # code...
          $pasivoCorriente = $value->monto;
        }
        if ($value->nombre=='PASIVO NO CORRIENTE') {
          # code...
          $pasivoNcorriente = $value->monto;
        }


      }


      $year1 = Carbon::createFromFormat('Y-m-d', $request->fecha_final)->year;
   

      return view('analisis.show2', compact('year1','balance1', 'empresa', 'activoCorriente', 'activoNcorriente', 'pasivoCorriente', 'pasivoNcorriente'));

    }


    public function verticalestados(Request $request, $id)
    {

      $ventas = 0;
      $costoventas = 0;
      $utilidadB = 0;

      $empresa = Empresa::where("id", $id)->first();


      $final = $request->fecha_final;

      $balance1=DB::table('resultados')

      ->select('resultados.nombre', 'resultados.monto')

      ->where('resultados.fecha_final', $final)

      ->get();


      foreach ($balance1 as $key => $value) {
        # code...
        if ($value->nombre=='VENTAS NETAS') {
          # code...
          $ventas = $value->monto;
        }

        if ($value->nombre=='COSTO DE VENTAS') {
          # code...
          $costoventas = $value->monto;
        }

        if ($value->nombre=='UTILIDAD BRUTA') {
          # code...
          $utilidadB = $value->monto;
        }

      }


    //  $year1 = Carbon::createFromFormat('Y-m-d', $request->fecha_inicial)->year;
      $year1 = Carbon::createFromFormat('Y-m-d', $request->fecha_final)->year;
   

      return view('analisis.verticalestado', compact('year1','balance1', 'empresa', 'ventas', 'utilidadB', 'costoventas'));


    }




    public function vertical($id)
    {
        
     
      $empress=($id);

      $balances=DB::table('balances')
      ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
      ->select('balances.fecha_inicio','balances.fecha_final')
      ->where('cuentas.empresas_id', $id)
      ->groupBy('balances.fecha_inicio','balances.fecha_final')
      ->get();


      $estados=DB::table('resultados')
      ->join('cuentas','cuentas.id','=', 'resultados.cuentas_id')
      ->select('resultados.fecha_inicio','resultados.fecha_final')
      ->where('cuentas.empresas_id', $id)
      ->groupBy('resultados.fecha_inicio','resultados.fecha_final')
      ->get();

       return view('analisis.vertical',compact('balances','empress', 'estados'));
    }


}
