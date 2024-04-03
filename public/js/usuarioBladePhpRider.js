document.addEventListener
(
    "DOMContentLoaded",
    function()
    {
        let contenedorPrincipal=document.getElementById("contenedorPrincipal");
        let imagenGrandeAvatar=document.getElementById("imagenAvatar");
        principal();
        function principal()
        {
            let inputAvatar=document.getElementById("avatar");
            inputAvatar.setAttribute("value","avatar1.png");
            generarAvatares();
            contenedorPrincipal.addEventListener
            (
                "click",
                function(event)
                {
                    let rutaDelAvatarSeleccionada =imagenGrandeAvatar.getAttribute("src");
                    let nombreDelArchivoDelAvatarSeleccionado = rutaDelAvatarSeleccionada.split("/").pop();
                    if(event.target.className==="imagenAvatarPequenia"&&event.target.id!==nombreDelArchivoDelAvatarSeleccionado)
                    {
                        let imagenSeleccionada=document.getElementById(nombreDelArchivoDelAvatarSeleccionado);
                        imagenSeleccionada.removeAttribute("style");
                        event.target.setAttribute("style","border:2px solid blue; box-shadow: 0 0 20px 2px blue;");
                        imagenGrandeAvatar.setAttribute("src","../media/img/avatares/"+event.target.id);
                        inputAvatar.setAttribute("value",event.target.id);
                    }
                }
            );
        }
        function generarAvatares()
        {
            let contenedorAvatares=document.getElementById("contenedorAvatares");
            let avatares=JSON.parse(imagenGrandeAvatar.getAttribute("data-avatares"));
            let rutaDelAvatarSeleccionada =imagenGrandeAvatar.getAttribute("src");
            let nombreDelArchivoDelAvatarSeleccionado = rutaDelAvatarSeleccionada.split("/").pop();
            for (let i = 0; i < avatares.length; i++)
            {
                let imagenAvatar=document.createElement("img");
                imagenAvatar.setAttribute("src","../media/img/avatares/"+avatares[i]);
                imagenAvatar.setAttribute("alt","imagenAvatar "+avatares[i]);
                imagenAvatar.setAttribute("height","150");
                imagenAvatar.setAttribute("width","150");
                imagenAvatar.setAttribute("class","imagenAvatarPequenia");
                imagenAvatar.setAttribute("id",avatares[i]);

                if(avatares[i]===nombreDelArchivoDelAvatarSeleccionado)
                {
                    imagenAvatar.setAttribute("style","border:2px solid blue; box-shadow: 0 0 20px 2px blue;")
                }
                
                let contenedorImagenAvatar=document.createElement("div");
                contenedorImagenAvatar.setAttribute("class","col-sm-6 text-center mb-4");
                contenedorImagenAvatar.appendChild(imagenAvatar);
                contenedorAvatares.appendChild(contenedorImagenAvatar);
            }
        }
    }
);