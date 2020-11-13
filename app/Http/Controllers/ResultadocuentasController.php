<?php

namespace App\Http\Controllers;

use App\resultadocuenta;
use App\Empresa;
use Illuminate\Http\Request;

class ResultadoresultadoresultadocuentasController extends Controller
{
    //

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $resultadocuentas=resultadocuenta::paginate(4);
        $empresas = Empresa::get();

        return view('resultadoresultadocuentas.index',compact('resultadocuentas','empresas'));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('resultadocuentas.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$resultadoresultadocuentas = resultadocuenta::create($request->all());

        $resultadocuentas=request()->except('_token');

        resultadocuenta::insert($resultadocuentas);

        return view('resultadocuentas.create');
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
        $resultadocuentas=Resultadocuenta::findOrFail($id);
        return view('resultadocuentas.show', compact('resultadocuentas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        //$resultadocuentas=resultadocuenta::findOrFail($id);
        


        $empresas=$id;
   
        $cuentas=DB::table('cuentas')
        ->join('empresas','cuentas.empresas_id','=', 'empresas.id')
        ->select('cuentas.nombre','cuentas.id','cuentas.codigo_padre')
        ->where('cuentas.empresas_id', $empresas)
        ->and('cuentas.tipocuentas_id', 6)
        ->get();
        
          //$cuentas=Cuenta::findOrFail($id);
          
          
          return view('resultadocuentas.edit',compact('resultadocuentas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

       $resultadocuentas=request()->except(['_token','_method']);


        resultadocuenta::where('id','=',$id)->update($resultadocuentas);

        $resultadocuentas=resultadocuenta::findOrFail($id);
        //$resultadoresultadocuentas->update($request->all());
        return view('resultadocuentas.edit',compact('resultadocuentas'));

            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
  // $resultadocuenta=resultadocuenta::findOrFail($id);
  resultadocuenta::destroy($id);

 
  return redirect('resultadocuentas');
 }

}
