<?php

namespace App\Http\Controllers;
use App\Empresa;
use App\User;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Http\Request;

class ComparacionesController extends Controller
{
    //

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($user_id)
    {

      
        $empresas = Empresa::where("user_id", $user_id)->first();

            if($empresas){

            return view('comparaciones.index', compact('empresas'));
        
            }
            else{

                  Session::flash('message', "Debe crear un empresa para esta acción.");



                return view("empresas.create");

            }


    }

      /**
     * Display the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

          return view('comparaciones.show',compact('balances','empress'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show1($id)
    {
        //
       
        $emp = $id;
        $empresas = Empresa::get();
       
        $ffin = Input::get('fecha_final');
        $comparacion = Input::get('valor');

        DB::select('CALL analisis_ratios(?,?)',[$ffin,$comparacion]);  

        
        $balances=DB::table('comparaciones')
        ->select('nombre','bueno','malo','valor','promedio')
        ->where('tipo','Razones de Liquidez')
        ->get();

        $balances1=DB::table('comparaciones')
        ->select('nombre','bueno','malo','valor','promedio')
        ->where('tipo','Razones de Eficiencia o Actividad')
        ->get();

        $balances2=DB::table('comparaciones')
        ->select('nombre','bueno','malo','valor','promedio')
        ->where('tipo','Razones de Rentabilidad')
        ->get();

        $balances3=DB::table('comparaciones')
        ->select('nombre','bueno','malo','valor','promedio')
        ->where('tipo','Apalancamiento')
        ->get();

               
        
      return view('comparaciones.show1',compact('empresas','balances','balances1','balances2','balances3','comparacion'));
    }
}

