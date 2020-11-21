<?php

namespace App\Http\Controllers;
use App\Empresa;
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
        $empresas = Empresa::get();
        
        
      return view('comparaciones.show',compact('empresas'));
    }
}
