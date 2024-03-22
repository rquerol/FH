<a href="{{route('administradores.create', ['apellidos'=>$apellidos,'id' =>$id])}}" hidden>
    Administrador
</a>
<script>
    let boton=document.getElementsByTagName("a")[0];
    boton.click();
</script>