<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;//recordar poner la ruta del modelo
use App\Http\Requests\create_productos_request;//ruta de la clase request creada por nosotros

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "inicio";//probando esto literalmente envia inicio
        $productos= Producto::all();
        return view("productos.index",compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');//envia la vista create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(create_productos_request $request)
    {
        //return view('productos.insert');

        //$this->validate($request,['seccion'=>'required','nombreArticulo'=>'required','paisOrigen'=>'required']);//con este metodo indicamos que campos y que tipo de validacion se requiere, en el formulario los errores llegan en un array llamado $errors


        //como cambiamos el parametro $request al tipo create_productos_request, el se trae las reglas de alla, por lo que no hay que usar el $this->validate()

       /*  $producto= new Producto;
        $producto->nombreArticulo= $request->nombreArticulo;
        $producto->seccion= $request->seccion;
        $producto->precio= $request->precio;
        $producto->fecha= $request->fecha;
        $producto->paisOrigen= $request->paisOrigen;//$producto->nombreArticulo es el campo de la tabla, $request->nombreArticulo es lo que llega del formulario
        $producto->save();
        return redirect("/productos"); */

        $entrada= $request->all();//esto recoge todo lo de arriba que llega desde el form

        if($archivo=$request->file('file')){//si se ha enviado alguna imagen desde el formulario

            $nombreImagen=$archivo->getClientOriginalName();//este metodo obtiene el nombre de la imagen

            $archivo->move('images',$nombreImagen);//este movera el archivo a la carpeta images que esta en public, de no estarlo el la crea
            $entrada['ruta']=$nombreImagen;//este seria el registro que se guardara en la columna ruta de la tabla en la bd
        }

        Producto::create($entrada);//esto registrara de una vez lo que tenga entrada en la bd
        return redirect("/productos");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto= Producto::findOrFail($id);
        return view("productos.show",compact("producto"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto= Producto::findOrFail($id);
        return view("productos.edit",compact("producto"));
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
        $producto= Producto::findOrFail($id);
        $producto->update($request->all());//request es lo que llega del formulario de update
        return redirect("/productos");//redireccionamos al index
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto= Producto::findOrFail($id);
        $producto->delete();
        return redirect("/productos");
    }
}
