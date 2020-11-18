<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Empresa;
use Session;

class MiembrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('miembros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('miembros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $empresa = Empresa::where([
            'user_id' => $request->admin
        ])->first();
        //

        $validacion= User::where([
            'email' => $request->email
        ])->first();

        if($validacion)
        {
            Session::flash('message', "Ya existe un usuario con ese correo.");
            return redirect()->back();

        }else{

        $miembro = User::create([

        'name'      => $request->nombre,
        'email'     => $request->email,    
        'password' => bcrypt($request->password),
        'empresa'   => $empresa->id,
        'rol'       => $request->rol,
        'admin'     =>  $request->admin     

        ]);

        Session::flash('message', "Analista creado.");


        return redirect()->back();


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
        $analistas = User::where([

            'rol'   => 'Analista',
            'admin' => $id


        ])->get();

        $empresa = Empresa::where([
            'user_id' => $id
        ])->first();



         $empresa = Empresa::where("user_id", $id)->first();

            if($empresa){

                return view('miembros.index', compact('analistas', 'empresa'));
        
            }
            else{

                Session::flash('message', "Debe crear un empresa para esta acción.");
                
                return view("empresas.create");

            }


        


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
        //
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

        Session::flash('message', "Analista eliminado.");

        User::destroy($id);

        return redirect()->back();

    }
}
