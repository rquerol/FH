document.addEventListener
(
    "DOMContentLoaded",
    function()
    {
        let contenedorPrincipal=document.getElementById("contenedorPrincipal")
        principal();
        function principal()
        {
            generarAvatares();
        }
        function generarAvatares()
        {
            let contenedorAvatares=document.getElementById("contenedorAvatares");
            let imagenGrandeAvatar=document.getElementById("imagenAvatar");
            let avatares=JSON.parse(imagenGrandeAvatar.getAttribute("data-avatares"));
            for (let i = 0; i < avatares.length; i++)
            {
                let imagenAvatar=document.createElement("img");
                imagenAvatar.setAttribute("src","../media/img/avatares/"+avatares[i]);
                imagenAvatar.setAttribute("alt","imagenAvatar "+avatares[i]);
                imagenAvatar.setAttribute("height","120");
                imagenAvatar.setAttribute("width","120");
                imagenAvatar.setAttribute("class","imagenAvatarPequeña");
                imagenAvatar.setAttribute("id",avatares[i]);
                if(i===0)
                {
                    imagenAvatar.setAttribute("style","box-shadow: 0 0 10px 2px rgb(0, 240, 0);")
                }
                
                let contenedorImagenAvatar=document.createElement("div");
                contenedorImagenAvatar.setAttribute("class","col-6 text-center mb-4");
                contenedorImagenAvatar.appendChild(imagenAvatar);
                contenedorAvatares.appendChild(contenedorImagenAvatar);
            }
        }
    }
);