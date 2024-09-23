@extends('layouts.plantilla')

@section('contenido')
<div class="row">
      <br>
      <br>
      <br>
      <br>
      <div style="height:256px; display:flex; justify-content: center; margin-bottom: 18px;">
        @for ($i = 0; $i < 4; $i++)
            <img src="{{ $imagesArray[$i] }}" class="img-responsive" style="max-width:100%; max-height:100%;">
        @endfor
      </div>
      <hr>
      <h1 style="text-align:center;"><span style="color:black"> Para que encontrar tus tragos favoritos sea</span><span  class="lite"> más simple </span></h1>
      <hr>
      <div style="height:256px; display:flex; justify-content: center;">
        @for ($i = 4; $i < 8; $i++)
            <img src="{{ $imagesArray[$i] }}" class="img-responsive" style="max-width:100%; max-height:100%;">
        @endfor
      </div>
  </div>

@endsection