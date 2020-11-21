<?php

namespace App\Http\Controllers;
use App\Empresa;
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

    public function index(Request $request)
    {

      
        $empresas = Empresa::get();
        

     
        //dd($balan);

      

        return view('comparaciones.index',compact('empresas'));


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
        
      return view('comparaciones.show1',compact('empresas'));
    }
}
