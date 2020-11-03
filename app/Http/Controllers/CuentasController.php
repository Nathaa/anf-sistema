<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cuenta;

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

        $cuentas['cuentas']=Cuenta::paginate(5);
        return view('cuentas.index',$cuentas);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cuentas.create');
    
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

        return response()->json($cuentas);
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
        
        $cuenta=Cuenta::findOrFail($id);
        return view('cuentas.edit',compact('cuenta'));
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

        $Cuenta=Cuenta::findOrFail($id);
        $Cuenta->fill($request->all())->save();


        $Cuenta->update($request->all());

        Session::flash('info_message', 'Cuenta actualizado con éxito');
        return redirect()->route('cuentas.index',compact('Cuenta'));
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

 
  return back();
 }


}
