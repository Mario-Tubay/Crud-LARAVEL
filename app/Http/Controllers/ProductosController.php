<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    public function index(){
       
        $datos = DB::table('productos as p')
            ->where('p.estado','0')
            ->join('categorias as c','c.id', 'p.id_categoria' )
            ->select('c.nombre as cnombre', 'p.id as pid', 'p.nombre as pnombre', 'p.descripcion as pdes', 'p.foto as pfoto')
            ->get();
            
          //  dd($datos);
        return view('welcome', ['datos'=>$datos]);
    }

    

    public function categoria(){
        $datos = DB::table('categorias')
        ->where('estado', '0')->get();

        return view('categorias', ['datos'=> $datos]);
    }

    public function inserts(){
        $tipo = request('tipo');
        if($tipo == "categoria"){
            
            DB::table('categorias')->insert([
                'nombre' => request('nombre'),
                'estado' => '0'
            ]);
            return redirect()->route('categoria');
    
        }
    }

    public function modificar($id){
        $datos = DB::table('categorias')->where('id', $id) ->first();

       return view('editar_categoria', ['datos'=> $datos]);
    }
    public function update(){
        DB::table('categorias')
              ->where('id', request('id'))
              ->update(['nombre' => request('nombre')]);
        return redirect()->route('categoria');
    }
    public function eliminar(){
        DB::table('categorias')
              ->where('id', request('id'))
              ->update(['estado' => '1']);
        return redirect()->route('categoria');
    }

    public function productoIndex(){
        $categoria = DB::table('categorias')
        ->where('estado', '0')->get();

        return view('productos', ['datos'=>$categoria]);
    }

    public function insertProducto(Request $request ){
        //dd($request->file('file')->store('public'));
       $file= $request->file('file');
        $destino = 'storage/';
        $fileName= time(). " - " . $file->getClientOriginalName();
        $upload = $request->file('file')->move($destino,$fileName);
        
        $upload;

        DB::table('productos')->insert([
            'nombre' => request('nombre'),
            'descripcion'=> request('descripcion'),
            'id_categoria'=> request('categoria'),
            'foto'=> $destino. $fileName,
            'estado' => '0'
        ]);
        return redirect()->route('index.producto');
   
    }

    public function deleteProducto($id){
        DB::table('productos')
        ->where('id', $id)
        ->update(['estado' => '1']);
        return redirect()->route('index');
    }

    public function updateProducto($id){
        $productos = DB::table('productos')
            ->where('estado','0')
             ->first();
        $datos = DB::table('categorias')
            ->where('estado', '0')->get();
    
        return view('editar_producto',  ['productos'=>$productos, 'datos' => $datos]);
    }

    public function cambiarProducto(Request $request){

    
        $file= $request->file('file');
        $destino = 'storage/';
        $fileName= time(). " - " . $file->getClientOriginalName();
        $upload = $request->file('file')->move($destino,$fileName);
        
        $upload;




        DB::table('productos')
        ->where('id', request('tipo'))
        ->update([ 'nombre' => request('nombre'),
            'descripcion'=> request('descripcion'),
            'id_categoria'=> request('categoria'),
            'foto'=> $destino. $fileName]);
        return redirect()->route('index');
    }


}
