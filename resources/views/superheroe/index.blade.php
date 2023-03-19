<a href="{{url('/superheroe/create')}}"> Agregar nuevo superheroe</a>
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Nombre real</th>
                <th></th>
                <th>Informacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($superheroes as $superheroe) 
            <tr>
             <td>{{$superheroe->id}}</td>
             <td>
                <img width="50px" height="50x" src="{{asset('storage'.'/'.$superheroe->imagen)}}"/>
             {{$superheroe->Foto}}
            
            
            </td>
             <td>{{$superheroe->Nombre}}</td>
             <td>{{$superheroe->nombreReal}}</td>
             <td>{{$superheroe->informacion}}</td>
             <td>

             <a href="{{url('/superheroe/'.$superheroe->id.'/edit')}}"> editar</a>
                
             <form action="{{url('/superheroe/'.$superheroe->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit"  onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
             
              </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>
