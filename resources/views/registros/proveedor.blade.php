<a href="{{route('administradores.create', ['apellidos'=>$apellidos,'id' =>$id])}}" hidden></a>
<script>
    let anchor=document.getElementsByTagName("a")[0];
    anchor.click();
</script>