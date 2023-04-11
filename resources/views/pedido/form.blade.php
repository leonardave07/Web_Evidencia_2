<div class="form-group">
        
    <div class="form-group my-3">
    <label class="my-2" for="producto_id"><h4>Producto</h4>
    </label>
        <select class="form-select" name="producto_id" id="producto_id"> --}}
            @foreach ($productos as $producto)
                <option value="{{ $producto -> id }}" data-precio="{{ $producto->precio }}">
                    {{ $producto -> nombre }}
                </option> 
            @endforeach
        </select> 
    </div>

    <label for="cantidad"><h4>Cantidad</h4></label>
    <input class="form-control" type="text" name="cantidad" value="{{isset($pedido->descripcion)?$pedido->cantidad:'1'}}"id="cantidad" oninput="calcularTotal()"> 
    <br>

    <label for="precio"><h4>Precio</h4></label>
    <p id="precio" data-precio="{{ $productos[0]->precio }}">{{ $productos[0]->precio }}</p>
    <br>

    <label for="total"><h4>Total</h4></label>
    <p id="total">{{ $productos[0]->precio }}</p>
    <br><br>

    <input type="hidden" name="producto_id" id="producto_id_seleccionado" value="{{ $producto->id }}">

    <script>
        // Obtener el campo select y el campo de precio
        const selectProducto = document.querySelector('#producto_id');
        const precioProducto = document.querySelector('#precio');
        const totalPedido = document.querySelector('#total');
        const productoSeleccionado = document.querySelector('#producto_id_seleccionado');


        // Agregar un detector de eventos de cambio al campo select
        selectProducto.addEventListener('change', () => {
            // Obtener el precio del producto seleccionado
            const precio = selectProducto.options[selectProducto.selectedIndex].getAttribute('data-precio');
            
            // Actualizar el campo de precio con el nuevo precio
            precioProducto.textContent = precio;
            productoSeleccionado.value = selectProducto.value;
            calcularTotal()
        });

        function calcularTotal() {
            let cantidad = parseFloat(document.getElementById('cantidad').value);
            let precio = parseFloat(selectProducto.options[selectProducto.selectedIndex].getAttribute('data-precio'));
            let total = cantidad * precio;
            totalPedido.textContent = total.toFixed(2);
        }
    </script>