<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cuenta;
use App\Empresa;
use App\Tipocuenta;
use App\Imports\CuentasImport;
use Session;
use DB;
use Maatwebsite\Excel\Facades\Excel;


class CuentasController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function importExcel(Request $request)
    {

        //$file=$request->file('pruebaexcel.xlsx');

       // Excel::import(new CuentasImport, request()->file('file'));

        // $path = $request->file('file')->getRealPath();

        ///$data = Excel::import(new CuentasImport,$path)->get();

        // if($data->count() > 0)
        //{
        //foreach($data->toArray() as $key => $value)
        // {
        //  foreach($value as $row)
        // {
        // $insert_data[] = array(
        //  'codigo'  => $row['codigo'],
        //  'codigo_padre'   => $row['codigo_padre'],
        // 'nombre'   => $row['nombre'],
        // 'descripcion'    => $row['descripcion'],
        // 'empresas_id'  => $row['empresas_id'],
        // 'tipocuentas_id'   => $row['tipocuentas_id']
        //  );
        //  }
        // }
        //   dd($insert_data);
        // if(!empty($insert_data))
        //  {
        //  DB::table('cuentas')->insert($insert_data);
        // }
        //}

        $file = $request->file('file');
        Excel::import(new CuentasImport, $file);




        return back()->with('message', 'Importancion de cuentas completadas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($user_id)
    {
        //$empresaas = Empresa::get();
        $cuentas=Cuenta::get();
        
        $empresas = Empresa::where("user_id", $user_id)->first();

        if($empresas){

        return view('cuentas.index', compact('empresas'));
    
        }
        else{

              Session::flash('message', "Debe crear un empresa para esta acción.");



            return view("empresas.create");

        }



    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
      
        $tipocuentas = Tipocuenta::get();
        $empresa = Empresa::where("user_id", $user_id)->first();

        if($empresa){

        return view('cuentas.create', compact('empresa','tipocuentas'));
    
        }
        else{

              Session::flash('message', "Debe crear un empresa para esta acción.");



            return view("empresas.create");

        }
        //return view('cuentas.create', ["empresa" => $empresa, "tipocuentas" => $tipocuentas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuentas = Cuenta::create($request->all());
        $cuentas->save();

        return back();
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

        $empresas = $id;

        //dd($empresas);

        $cuentas = DB::table('cuentas')
            ->join('empresas', 'cuentas.empresas_id', '=', 'empresas.id')
            ->select('cuentas.nombre', 'cuentas.codigo', 'cuentas.codigo_padre', 'cuentas.id')
            ->where('cuentas.empresas_id', $empresas)
            ->get();

       // return view('cuentas.show',compact('cuentas','empresas'));
        return view('cuentas.show', ["cuentas" => $cuentas], ["empresas" => $empresas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuentas = Cuenta::findOrFail($id);
        $empresa = Empresa::get();
        $tipocuentas = Tipocuenta::get();

        return view('cuentas.edit', ['cuentas' => $cuentas, 'tipocuentas' => $tipocuentas, 'empresa' => $empresa]);
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

        $cuentas = Cuenta::findOrFail($id);
        $cuentas->codigo = $request->input('codigo');
        $cuentas->codigo_padre = $request->input('codigo_padre');
        $cuentas->nombre = $request->input('nombre');
        $cuentas->descripcion = $request->input('descripcion');
        $cuentas->empresas_id = $request->get('empresas_id');
        $cuentas->tipocuentas_id = $request->get('tipocuentas_id');
        $cuentas->update();

        return redirect()->to('cuentash/'.$cuentas->empresas_id);
       // return redirect()->route('cuentas.show');
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
        $ids = $id;
   
        $cuentas = cuenta::where('cuentas.id', $ids);
        $cuentas->delete();



        return back();
    }
}
