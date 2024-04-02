<form action="{{action([App\Http\Controllers\AdministradorController::class,'store'])}}" class="row" method="POST" hidden>   
    @csrf

    <label for="id">
        id
    </label>
    <div>
        <input type="text" id="id" name="Id" value="{{$id}}" readonly>
    </div>

    <label for="apellidos">
        Apellidos
    </label>
    <div>
        <input type="text" id="apellidos" name="Apellidos" value="{{$apellidos}}" readonly>
    </div>

    <button type="submit">
        Aceptar
    </button>
</form>
<script>
    let boton=document.getElementsByTagName("button")[0];
    boton.click();
</script>