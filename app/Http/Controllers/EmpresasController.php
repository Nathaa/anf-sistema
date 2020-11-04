<?php

namespace App\Http\Controllers;
use App\Empresa;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
        //
        public function __construct()
        {
            $this->middleware('auth');
        }
    
    
        public function index(Request $request)
        {
            if($request){
                $query = trim($request->get('search'));
                //$empresas=Empresa::where('nombre','LIKE','%'.$query.'%')
                $empresas=DB::table('empresas as emp')
                ->join('users as us', 'us.id', '=', 'emp.user_id')
                ->select('emp.id','emp.nombre', 'emp.codigo', 'emp.rubro', 'emp.descripcion', 'us.name as nombre_usu')
                ->where('emp.nombre','LIKE','%'.$query.'%')
                ->orderBy('emp.id','asc')
                ->paginate(5);
                return view("empresas.index", ["empresas"=>$empresas, "search"=>$query]);
            
            }
    
        }
   
        public function create()
        {
           // $usuarios = DB::table('users')->get() , ["usuarios"=> $usuarios];
            return view("empresas.create");
        
        }
    
        public function store(Request $request)
        {
                $user = Auth::user();
                $empresa = $user->empresa;
                if(!$empresa) {
            
            $request->user()->empresa()->create([
                'nombre' => $request->nombre,
                'codigo' => $request->codigo,
                'descripcion' => $request->descripcion,
                'rubro' => $request->rubro
            ]);
            } else{
                Session::flash('flash_message','ya se agrego una empresa con este usuario');
                //return 'ya se agrego una empresa con este usuario';
            }

            /*$request->user()->empresa()->create([
                'nombre' => $request->nombre,
                'codigo' => $request->codigo,
                'descripcion' => $request->descripcion,
                'rubro' => $request->rubro

                
            ]);*/

            return redirect('empresas');
            /*$empresa->nombre = $request->get('nombre');
                $empresa->codigo = $request->get('codigo');
                $empresa->descripcion = $request->get('descripcion');
                $empresa->rubro = $request->get('rubro');*/

           /* $empresa = new Empresa();
           // $empresas->create($request->all());
            $empresa->nombre = $request->get('nombre');
            $empresa->codigo = $request->get('codigo');
            $empresa->descripcion = $request->get('descripcion');
            $empresa->rubro = $request->get('rubro');
            $empresa->users_id = $request->input('users_id');
            $empresa->save();
            return redirect('empresas');*/
           
           
        }
    
       
        public function show($id)
        {
            $empresa=empresa::findOrFail($id);
            return view('empresas.show', compact('empresa'));
            
        }
    
       
        public function edit($id)
        {
            $empresa=empresa::findOrFail($id);
            return view('empresas.edit',compact('empresa'));
            
           
        }
    
    
        public function update(Request $request,$id)
        {
            $empresa=empresa::findOrFail($id);
            $empresa->nombre = $request->input('nombre');
            $empresa->codigo = $request->input('codigo');
            $empresa->descripcion = $request->input('descripcion');
            $empresa->rubro = $request->input('rubro');
            $empresa->update();
            return redirect()->route('empresas.index',compact('empresa'));
            
        }
    
     
        public function destroy($id)
        {
            
            Empresa::destroy($id);
            return back();
    
        }
}
