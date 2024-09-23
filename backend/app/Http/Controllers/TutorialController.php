<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTutorialRequest;
use App\Models\Tutorial;
use App\Models\Etiqueta;
use App\Models\Trago;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','can:tutorial.create'])->only('create','store');
        $this->middleware(['auth','can:tutorial.edit'])->only('edit','update');
        $this->middleware(['auth','can:tutorial.destroy'])->only('destroy');
    }

    public function index(){
        $tutoriales = Tutorial::all()->sortBy('id_tutorial');
        return view('tutorial.tutoriales')->with('tutoriales',$tutoriales);
    }

    public function create(){
        $etiquetas = Etiqueta::all();
        $tragos = Trago::all();
        return view('tutorial.create',compact('etiquetas','tragos'));
    }

    public function store(CreateTutorialRequest $request){
        $tutorial = new Tutorial();
        $tutorial->id_trago = $request->id_trago;
        $tutorial->nombre = $request->nombre;
        $tutorial->descripcion = $request->descripcion;
        $tutorial->autor = $request->autor;
        $tutorial->archivos_adjuntos = $request->archivo;
        $archivo = $request->file('archivos_adjuntos');
        if($archivo != NULL){
            $contenido = $archivo->openFile()->fread($archivo->getSize());
            $tutorial->archivos_adjuntos = base64_encode($contenido);
        }
        else{
            $tutorial->archivos_adjuntos=NULL;
        }
        $tutorial->save();
        $tutorial->etiquetas()->sync($request->etiquetas);
        return redirect()->route('tutorial.show',$tutorial);
    }

    public function show(Tutorial $tutorial){
        return view('tutorial.show',compact('tutorial'));
    }

    public function edit(Tutorial $tutorial){
        $etiquetas = Etiqueta::all();
        return view('tutorial.edit',compact('tutorial','etiquetas'));
    }

    public function update (Request $request,Tutorial $tutorial){
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'autor' => 'required|string',
            'archivo' => 'nullable|file',
        ]);
        $tutorial->nombre = $request->nombre;
        $tutorial->descripcion = $request->descripcion;
        $tutorial->autor = $request->autor;
        $archivo = $request->file('archivos_adjuntos');
        if($archivo != NULL){
            $contenido = $archivo->openFile()->fread($archivo->getSize());
            $tutorial->archivos_adjuntos = base64_encode($contenido);
        }
        $tutorial->etiquetas()->sync($request->etiquetas);
        $tutorial->save();
        $tutorial->update();
        return redirect()->route('tutorial.show',$tutorial);
    }

    public function destroy(Tutorial $tutorial){
        $tutorial->delete();
        return redirect()->route('tutorial.index');
    }

    public function etiqueta(Etiqueta $etiqueta){
        $tutoriales = $etiqueta->tutoriales;
        return view('tutorial.etiqueta',compact('etiqueta','tutoriales'));
    }
}
