<div class="form-group">
    
    <br>
    <label for="Nombre"><h4>Nombre</h4></label>
    <input class="form-control" type="text" name="nombreSuper" value="{{isset($superheroe->nombreSuper)?$superheroe->nombreSuper:' '}}" id="nombreSuper"> 
    <br>

    <label for="Nombre Real"><h4>Nombre real</h4></label>
    <input class="form-control" type="text" name="nombreReal" value="{{isset($superheroe->nombreReal)?$superheroe->nombreReal:' '}}"id="nombreReal"> 
    <br>

    <label for="ApellidoMaterno"><h4>Información</h4></label>
    <input class="form-control" type="text" name="informacion" value="{{isset($superheroe->informacion)?$superheroe->informacion:' '}}" id="informacion"> 
    <br>

    <label for="imagen"><h4>Imagen</h4></label>
    @if(isset($superheroe->imagen))
    <img width="50px" height="50x" src="{{asset('storage'.'/'.$superheroe->imagen)}}"/>
    @endif
    <input class="form-control" type="file" name="imagen" value="" id="imagen"> 
    <br><br>
    <input class="btn btn-success" type="submit" value="Guardar"> 
    <br><br>
    <a class="btn btn-danger" href="{{url('/superheroe/')}}">Regresar</a>