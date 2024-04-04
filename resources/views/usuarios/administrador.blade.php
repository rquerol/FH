<div style="text-align: center;">
    <img src="{{asset('media/img/iconos/reloj_de_arena.gif')}}" alt="imagen reloj" height="600vh" width="600vw">
</div>
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