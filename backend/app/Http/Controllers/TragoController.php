<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTragoRequest;
use App\Models\Trago;
use App\Models\Etiqueta;
use App\Models\Bar;
use Illuminate\Http\Request;

class TragoController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','can:trago.create'])->only('create','store');
        $this->middleware(['auth','can:trago.edit'])->only('edit','update');
        $this->middleware(['auth','can:trago.destroy'])->only('destroy');
    }

    public function index(){
        $Tragos = Trago::all()->sortBy('id_trago');
        return view('trago.tragos')->with('tragos',$Tragos);
    }

    public function create(){
        $etiquetas = Etiqueta::all();
        $bares = Bar::all();
        return view('trago.create',compact('etiquetas','bares'));
    }

    public function store(CreateTragoRequest $request){
        $trago = new Trago();
        $trago->id_bar = $request->id_bar;
        $trago->nombre = $request->nombre;
        $trago->ingredientes = $request->ingredientes;
        $trago->precio = $request->precio;
        $trago->archivos_adjuntos = $request->archivo;
        $archivo = $request->file('archivos_adjuntos');
        if($archivo != NULL){
            $contenido = $archivo->openFile()->fread($archivo->getSize());
            $trago->archivos_adjuntos = base64_encode($contenido);
        }
        else{
            $trago->archivos_adjuntos=NULL;
        }
        $trago->save();
        $trago->etiquetas()->sync($request->etiquetas);
        return redirect()->route('trago.show',$trago);
    }

    public function show(Trago $trago){
        return view('trago.show')->with('trago',$trago);
    }

    public function edit(Trago $trago){
        $etiquetas = Etiqueta::all();
        return view('trago.edit',compact('trago','etiquetas'));
    }

    public function update (Request $request,Trago $trago){
        $trago->nombre = $request->nombre;
        $trago->ingredientes = $request->ingredientes;
        $trago->precio = $request->precio;
        $archivo = $request->file('archivos_adjuntos');
        if($archivo != NULL){
            $contenido = $archivo->openFile()->fread($archivo->getSize());
            $trago->archivos_adjuntos = base64_encode($contenido);
        }
        $trago->etiquetas()->sync($request->etiquetas);
        $trago->save();
        $trago->update();
        return redirect()->route('trago.show',$trago);
    }

    public function destroy(Trago $trago){
        $trago->delete();
        return redirect()->route('trago.index');
    }

    public function etiqueta(Etiqueta $etiqueta){
        $tragos = $etiqueta->tragos;
        return view('trago.etiqueta',compact('etiqueta','tragos'));
    }
}
