<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBarRequest;

class BarController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','can:bar.create'])->only('create','store');
        $this->middleware(['auth','can:bar.edit'])->only('edit','update');
        $this->middleware(['auth','can:bar.destroy'])->only('destroy');
    }

    public function index(){
        $bares = Bar::all()->sortBy('nombre');
        return view('bar.bares')->with('bares',$bares);
    }

    public function create(){
        $etiquetas = Etiqueta::all();
        return view('bar.create',compact('etiquetas'));
    }

    public function store(CreateBarRequest $request){
        $bar = new Bar();
        $bar->nombre = $request->nombre;    
        $bar->horarios = $request->horarios;  
        $bar->ubicacion = $request->ubicacion; 
        $bar->descripcion = $request->descripcion;
        $archivo = $request->file('archivos_adjuntos');
        if($archivo != NULL){
            $contenido = $archivo->openFile()->fread($archivo->getSize());
            $bar->archivos_adjuntos = base64_encode($contenido);
        }
        else{
            $bar->archivos_adjuntos=NULL;
        }
        $bar->save();
        $bar->etiquetas()->sync($request->etiquetas);
        return redirect()->route('bar.show',$bar);
    }

    public function show(Bar $bar){
        return view('bar.show',compact('bar')); 
    }

    public function edit(Bar $bar){
        $etiquetas = Etiqueta::all();
        return view('bar.edit',compact('bar','etiquetas'));
    }

    public function update (Request $request,Bar $bar){
        $request->validate([
            'nombre' => 'required',
            'horarios' => 'required|string',
            'ubicacion'=> 'required|string',
            'descripcion' => 'required|string',
        ]);
        $bar->nombre= $request->nombre;
        $bar->horarios= $request->horarios;
        $bar->ubicacion= $request->ubicacion;
        $bar->descripcion= $request->descripcion;
        $archivo = $request->file('archivos_adjuntos');
        if($archivo != NULL){
            $contenido = $archivo->openFile()->fread($archivo->getSize());
            $bar->archivos_adjuntos = base64_encode($contenido);
        }
        $bar->etiquetas()->sync($request->etiquetas);
        $bar->save();
        $bar->update();
        return redirect()->route('bar.show',$bar);
    }

    public function destroy(Bar $bar){
        $bar->delete();
        return redirect()->route('bar.index');
    }

    public function etiqueta(Etiqueta $etiqueta){
        $bares = $etiqueta->bares;
        return view('bar.etiqueta',compact('etiqueta','bares'));
    }
}
