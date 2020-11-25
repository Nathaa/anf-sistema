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
    { $empresa = Empresa::where("id", $id)->first();
      $ide=$id;
      $valant=$request->fecha_inicial;
      $valact=$request->fecha_final;
       return view('analisis.show1',compact('valant','valact','empresa','ide'));
    }    

    
    public function show11(Request $request,$id)
    { $empresa = Empresa::where("id", $id)->first();
      $ide=$id;
      $valant=$request->fecha_inicial;
      $valact=$request->fecha_final;
       return view('analisis.show11',compact('valant','valact','empresa','ide'));
    }
    
    public function show2(Request $request, $id)
    {

      $activoCorriente = 1;
      $activoNcorriente = 1;
      $pasivoCorriente = 1;
      $pasivoNcorriente = 1;

      $pasivo1 = 1;
      $activo1 = 1;
      $patrimonio = 1;



      $empresa = Empresa::where("id", $id)->first();

      $final = $request->fecha_final;


      $balance1=DB::table('balances')

      ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')


      ->select('balances.nombre', 'balances.monto', 'cuentas.id')

      ->where('balances.fecha_final', $final)

      ->where('cuentas.empresas_id', $id)

      ->get();

      $a = 'ACTIVO';
      $p = 'PASIVO';
      $pt = 'PATRIMONIO';

      $cuentasActivo = DB::table('cuentas')

      ->join('tipocuentas', 'tipocuentas.id', '=', 'cuentas.tipocuentas_id')

      ->select('cuentas.nombre')

      ->where('tipocuentas.nombre', $a)

      ->where('cuentas.empresas_id', $id)

      ->get();

      $cuentasPasivo = DB::table('cuentas')

      ->join('tipocuentas', 'tipocuentas.id', '=', 'cuentas.tipocuentas_id')

      ->select('cuentas.nombre')

      ->where('tipocuentas.nombre', $p)

      ->where('cuentas.empresas_id', $id)

      ->get();

      $cuentasPatrimonio = DB::table('cuentas')

      ->join('tipocuentas', 'tipocuentas.id', '=', 'cuentas.tipocuentas_id')

      ->select('cuentas.nombre')

      ->where('tipocuentas.nombre', $pt)

      ->where('cuentas.empresas_id', $id)

      ->get();



//      dd($cuentasActivo);

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

        if ($value->nombre == 'ACTIVO') {
          # code...

        //  return ($value->monto);
          $activo1 = $value->monto;
        }

        if ($value->nombre == 'PASIVO') {
          # code...
          $pasivo1 = $value->monto;

        }

        if ($value->nombre == 'PATRIMONIO') {
          # code...
          $patrimonio = $value->monto;
        }

    


      }




      $year1 = Carbon::createFromFormat('Y-m-d', $request->fecha_final)->year;
   

      return view('analisis.show2', compact('year1','balance1', 'empresa', 'activoCorriente', 'activoNcorriente', 'pasivoCorriente', 'pasivoNcorriente', 'activo1', 'pasivo1', 'patrimonio', 'cuentasActivo', 'cuentasPatrimonio', 'cuentasPasivo'));

    }


    public function verticalestados(Request $request, $id)
    {

      $ventas = 0;
      $costoventas = 0;
      $utilidadB = 0;

      $empresa = Empresa::where("id", $id)->first();


      $final = $request->fecha_final;

      $balance1=DB::table('resultados')


      ->join('cuentas','cuentas.id','=', 'resultados.cuentas_id')

      ->select('resultados.nombre', 'resultados.monto')


      ->where('cuentas.empresas_id', $id)


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
