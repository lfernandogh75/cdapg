<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Articulo;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class SuperadminController extends Controller
{
    //funcion contructor
public function __construct(){
    $this->middleware('superadmin');
}
//funcion para los usuarios con roll administrador
public function index(){
       // return 'si estas leyendo sos super administrador';
       $articulos = Articulo::paginate(5);
       $productos = Producto::paginate(5);
       
       $usuarios = User::paginate(5);
       return view('superadmin.index',compact('productos','articulos','usuarios'));
}
public function create()
{
    $roles=Role::all();
    return view('superadmin.create',compact('roles'));
}

public function store(Request $request)
{
    $request->validate([
        'name'=>'required', 'email'=>'required|unique:users','imagen'=>'required|image|mimes:jpeg,png,svg|max:2024'
    ]);
    $usuario=$request->all();
     
    if($imagen=$request->file('imagen')){
        $rutaGuardarImg='imagen/';
        $imagenUsuario=date('YmdHis').".".$imagen->getClientOriginalExtension();
        $imagen->move($rutaGuardarImg,$imagenUsuario);
        $usuario['profile_photo_path']=$imagenUsuario;
                 
    }
    
    $usuario['password']=Hash::make('password');
    User::create($usuario);
    return redirect()->route('superadmin.index');
}

public function destroy($id)
    {
     /*   $image_path = 'imagen/'.$user->profile_photo_path;
        
        if(file_exists($image_path)){
            unlink($image_path); //borra la imagen de la carpeta
        }

        $user->delete();
        return redirect()->route('superadmin.index');*/
        $user=User::find($id);
        $image_path = 'imagen/'.$user->profile_photo_path;
        
        if(file_exists($image_path)){
            unlink($image_path); //borra la imagen de la carpeta
        }
    
        
        $user->delete();
        return redirect()->route('superadmin.index');
    }

    public function edit($id)
    {
        $usuario=User::find($id);
        $roles=Role::All();
        return view('superadmin.edit', compact('usuario','roles'));
    }
    public function update(Request $request,$id)
    {
        $usuario=User::find($id);
        $request->validate([
            'name'=>'required', 'email'=>'required'
        ]);
        $prod=$request->all();
        if($imagen=$request->file('profile_photo_path')){
            $rutaGuardarImg='imagen/';
            $imagenProducto=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg,$imagenProducto);
            $prod['profile_photo_path']="$imagenProducto";
        }
        else{
            unset($prod['profile_photo_path']);
        }
        $usuario->update($prod);
        return redirect()->route('superadmin.index');
    }

}
