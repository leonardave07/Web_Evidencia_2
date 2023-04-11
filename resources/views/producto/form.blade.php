<div class="form-group">
    
    <br>
    <label for="nombre"><h4>Nombre</h4></label>
    <input class="form-control" type="text" name="nombre" value="{{isset($producto->nombre)?$producto->nombre:' '}}" id="nombre"> 
    <br>

    <label for="descripcion"><h4>descripcion</h4></label>
    <input class="form-control" type="text" name="descripcion" value="{{isset($producto->descripcion)?$producto->descripcion:' '}}"id="descripcion"> 
    <br>

    <label for="cantidad"><h4>cantidad</h4></label>
    <input class="form-control" type="number" name="cantidad" value="{{isset($producto->cantidad)?$producto->cantidad:' '}}" id="cantidad"> 
    <br>

    <label for="precio"><h4>precio</h4></label>
    <input class="form-control" type="number" name="precio" value="{{isset($producto->precio)?$producto->precio:' '}}" id="precio"> 
    <br>

    <label for="imagen"><h4>imagen</h4></label>
    @if(isset($producto->imagen))
    <img width="50px" height="50x" src="{{asset('storage'.'/'.$producto->imagen)}}"/>
    @endif
    <input class="form-control" type="file" name="imagen" value="" id="imagen"> 
    <br><br>
    <input class="btn btn-success" type="submit" value="Guardar"> 
    <br><br>
    <a class="btn btn-danger" href="{{url('/producto/')}}">Regresar</a>