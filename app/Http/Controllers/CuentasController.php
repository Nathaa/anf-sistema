<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cuenta;
use App\Empresa;
use App\Tipocuenta;

class CuentasController extends Controller
{
    //
   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $cuentas=Cuenta::paginate(4);
        $empresas = Empresa::get();

        return view('cuentas.index',compact('cuentas','empresas'));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipocuentas = Tipocuenta::get();
        return view('cuentas.create',compact('tipocuentas'));
    
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
        //$cuentas = Cuenta::create($request->all());

        $cuentas=request()->except('_token');

        Cuenta::insert($cuentas);

        return view('cuentas.create');
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
        $Cuenta=Cuenta::findOrFail($id);
        return view('cuentas.show', compact('Cuenta'));
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
        
        $cuentas=Cuenta::findOrFail($id);
        return view('cuentas.edit',compact('cuentas'));
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

       $cuentas=request()->except(['_token','_method']);


        Cuenta::where('id','=',$id)->update($cuentas);

        $cuentas=Cuenta::findOrFail($id);
        //$cuentas->update($request->all());
        return view('cuentas.edit',compact('cuentas'));

            
        
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
  // $Cuenta=Cuenta::findOrFail($id);
  Cuenta::destroy($id);

 
  return redirect('cuentas');
 }


}
