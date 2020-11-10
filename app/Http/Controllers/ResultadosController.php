<?php

namespace App\Http\Controllers;

use App\Resultado;
use Illuminate\Http\Request;
use DB;

class ResultadosController extends Controller
{
    //

    public function index(Request $request)
    {

        
          $resultados=Resultado::get();
       

          return view('resultados.index',compact('resultados'));
    }

    public function index2(Request $request)
    {

       
          $resultados=resultado::paginate(4);
       

          return view('resultados.index2',compact('resultados'));
    }
    
    
    
    
   


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //DB::select("CALL micursor()");  

        //$cuentas=DB::table('cuentas')->get();
       
 
       $empresas=$id;
   
      $cuentas=DB::table('cuentas')
      ->join('empresas','cuentas.empresas_id','=', 'empresas.id')
      ->select('cuentas.nombre','cuentas.id','cuentas.codigo_padre')
      ->where('cuentas.empresas_id', $empresas)
      ->get();
      
        //$cuentas=Cuenta::findOrFail($id);
        
        
        return view('resultados.edit',["cuentas"=>$cuentas],["empresas"=>$empresas]);
    }


    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        if(count($request->nombre)>0)
        {
        

            foreach ($request->nombre as $key=>$value) {
                $resultado = new resultado;
                //resultado::updateOrCreate($request->cuentas_id[$key]);
                $resultado->nombre= $value;
                $resultado->monto = $request->monto[$key];
                $resultado->fecha_inicio = $request->get('fecha_inicio');
                $resultado->fecha_final = $request->get('fecha_final');
                $resultado->cuentas_id = $request->cuentas_id[$key];
                $resultado->save();
            }
            
        } 
    
            DB::select("CALL micursor2($id)"); 
          DB::select("CALL micursor2($id)"); 
 
          return redirect('empresas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

}
