@props(['collection' =>[],'relation','mostrar' => 'nombre', 'identificador' => 'id'])

@forelse($collection as $elem)
    <div>
        <label class="h4" style='color:black; margin: 3px;'><input type="checkbox" name="{{$relation}}[]" value="{{$elem->$identificador}}">  {{$elem->$mostrar}}</label>
        <br>
    </div>
@Empty
    <div>
        <label class="h4">No hay {{$relation}} disponibles</label>
    </div>

@endforelse