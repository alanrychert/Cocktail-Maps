<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Etiqueta;

class EtiquetaController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth','can:etiqueta.create'])->only('create','store');
        $this->middleware(['auth','can:etiqueta.edit'])->only('edit,update');
        $this->middleware(['auth','can:etiqueta.destroy'])->only('destroy');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = Etiqueta::all()->sortBy('nombre');
        return view('etiqueta.etiquetas')->with('etiquetas',$etiquetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etiqueta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        $etiqueta = new etiqueta();
        $etiqueta->nombre = $request->nombre;

        $etiqueta->save();

        return redirect()->route('etiqueta.show',$etiqueta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(etiqueta $etiqueta)
    {
        return view('etiqueta.show',compact('etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(etiqueta $etiqueta)
    {
        return view('etiqueta.edit',compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, etiqueta $etiqueta)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        $etiqueta->nombre = $request->nombre;
        $etiqueta->update();

        return redirect()->route('etiqueta.show',$etiqueta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(etiqueta $etiqueta)
    {
        $etiqueta->delete();

        return redirect()->route('etiqueta.index');
    }
}
