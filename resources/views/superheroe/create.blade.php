Formulario de creación 

<form action="{{ url('/superheroe')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('superheroe.form')
</form>