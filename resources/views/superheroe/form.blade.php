    <label for="Nombre">Nombre </label>
    <input type="text" name="nombreSuper" value="{{isset($superheroe->nombreSuper)?$superheroe->nombreSuper:' '}}" id="nombreSuper"> 
    <br>
    <label for="Nombre Real">Nombre real </label>
    <input type="text" name="nombreReal" value="{{isset($superheroe->nombreReal)?$superheroe->nombreReal:' '}}"id="nombreReal"> 
    <br>
    <label for="ApellidoMaterno">Informacion</label>
    <input type="text" name="informacion" value="{{isset($superheroe->informacion)?$superheroe->informacion:' '}}" id="informacion"> 
    <br>
    <label for="Foto">imagen</label>
    @if(isset($empleado->imagen))
    <img width="50px" height="50x" src="{{asset('storage'.'/'.$superheroe->imagen)}}"/>
    @endif
    <input type="file" name="imagen" value="" id="imagen"> 
    <br>
    <input type="submit" value="Guardar datos"> 
    <br>
    <a href="{{url('/superheroe/')}}"> REGRESAR </a>