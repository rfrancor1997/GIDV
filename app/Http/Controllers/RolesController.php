<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\RolesFormRequest;

use GIDV\Roles;

use DB;

class RolesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /*
    *index
    *Este metodo permite mostrar todos los registros que estan dentro de la tabla buscada y realizar la busqueda en la misma
    *@return view
    */
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$roles=DB::table('roles')->where('ro_nombre','LIKE','%'.$query.'%')
    		-> where ('ro_estado','=','1')
    		-> orderBy('ro_idRol','asc')
    		-> paginate(8);
    		return view('configuracion.roles.index',["roles"=>$roles,"searchText"=>$query]);
       	}
    }

    /*
    *create
    *Este metodo permite realizar la busqueda de las tablas necesarias para la creación
    */
     public function create(){
        return view("configuracion.roles.create");
    }

    /*
    *store
    *Este metodo permite realizar el guardado
    *@return view
    */
    public function store(RolesFormRequest $request){
        $rol = new Roles;
        $rol->ro_nombre = $request->get('nombre');
        $rol->ro_estado = '1';
        $rol->save();
        return Redirect::to('roles')->with('status', 'Rol creado con éxito');
    }

    /*
    *show
    *Permite mostrar las busquedas realizadas dentro de la pagina
    *return view
    */
    public function show($id){
        return view("configuracion.roles.show",["roles"=>Roles::findOrFail($id)]);
    }

    /*
    *edit
    *Permite realizar la busqueda en la base de datos para la edición
    *return view
    */
    public function edit($id){
        return view("configuracion.roles.edit",["roles"=>Roles::findOrFail($id)]);
    }

    /*
    *update
    *Permite realizar la actualización del item seleccionado
    *return view
    */
    public function update(RolesFormRequest $request,$id){
        $rol=Roles::findOrFail($id);
        $rol->ro_nombre=$request->get('nombre');
        $rol->update();
        return Redirect::to('roles')->with('status', 'Rol actualizado con éxito');
    }

    /*
    *destroy
    *Permite cambiar el estado a 0 y desactivar el item de la tabla
    *return view
    */
    public function destroy($id){
        $rol=Roles::findOrFail($id);
        $rol->ro_estado='0';
        $rol->update();
        return Redirect::to('roles')->with('status', 'Rol inactivado con éxito');
    }
}
