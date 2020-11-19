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

    public function show2(Request $request, $id)
    {


      $empresa = Empresa::where("id", $id)->first();

      $inicial = $request->fecha_inicial;

      $final = $request->fecha_final;


      $balance1=DB::table('balances')

      ->select('balances.nombre', 'balances.monto')

      ->where('balances.fecha_inicio', $inicial)

      ->get();

     // dd($sql);



      $balance2=DB::table('balances')

      ->select('balances.nombre', 'balances.monto')

      ->where('balances.fecha_final', $final)

      ->get();


      $year1 = Carbon::createFromFormat('Y-m-d', $request->fecha_inicial)->year;
      $year2 = Carbon::createFromFormat('Y-m-d', $request->fecha_final)->year;
   

      return view('analisis.show2', compact('year1','year2', 'balance1', 'balance2', 'empresa'));


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

       return view('analisis.vertical',compact('balances','empress'));
    }




    public function estados(){


      return('ok');

    }


}
