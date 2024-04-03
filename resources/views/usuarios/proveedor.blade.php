<form action="{{action([App\Http\Controllers\ProveedorController::class,'store'])}}" class="row" method="POST" hidden>   
    @csrf

    <label for="id">
        id
    </label>
    <div>
        <input type="text" id="id" name="Id" value="{{$id}}" readonly>
    </div>

    <label for="calle">
        Calle
    </label>
    <div>
        <input type="text" id="calle" name="Calle" value="{{$calle}}" readonly>
    </div>

    <label for="numero">
        Numero
    </label>
    <div>
        <input type="text" id="numero" name="Numero" value="{{$numero}}" readonly>
    </div>

    <label for="cp">
        Cp
    </label>
    <div>
        <input type="text" id="cp" name="Cp" value="{{$cp}}" readonly>
    </div>

    <label for="ciudad">
        Ciudad
    </label>
    <div>
        <input type="text" id="ciudad" name="Ciudad" value="{{$ciudad}}" readonly>
    </div>

    <label for="logp">
        Logo
    </label>
    <div>
        <input type="text" id="logo" name="Logo" value="{{$logo}}" readonly>
    </div>

    <button type="submit">
        Aceptar
    </button>
</form>
<script>
    let boton=document.getElementsByTagName("button")[0];
    boton.click();
</script>