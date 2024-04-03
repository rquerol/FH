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
                    if(event.target.id==="aceptar")
                    {
                        // if(!validaciones())
                        // {
                        //     event.preventDefault();
                        // }
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
        function validaciones()
        {
            let mensajeValidacionFormulario=document.getElementById("mensajeValidacionFormularioCrearRider")
            let nickname=document.getElementById("nickname");
            let nombre=document.getElementById("nombre");
            let apellidos=document.getElementById("apellidos");
            let contrasenia=document.getElementById("contrasenia");
            let confirmarContrasenia=document.getElementById("confirmarContrasenia");
            let email=document.getElementById("email");
            let telefono=document.getElementById("telefono");

            let laTareaPasoTodasLasValidaciones=false;
            principal();
            function principal()
            {
                let validacionCampoVacioNickname=false;
                let validacionLongitudNickname=false;
                let campoNicknamePasoTodasLasValidaciones=false;
                validacionCampoVacioNickname=verificarQueElCampoNoEsteVacio(validacionCampoVacioNickname,nickname);
                validacionLongitudNickname=verificarLongitud(validacionLongitudNickname,nickname,2,13);

                let validacionCampoVacioNombre=false;
                let validacionCaracteresExtraniosNombre=false;
                let validacionLongitudNombre=false;
                let campoNombrePasoTodasLasValidaciones=false;
                validacionCampoVacioNombre=verificarQueElCampoNoEsteVacio(validacionCampoVacioNombre,nombre);
                validacionCaracteresExtraniosNombre=verificarQueElCampoNoContengaCaracteresExtranios(validacionCaracteresExtraniosNombre,nombre);
                validacionLongitudNombre=verificarLongitud(validacionLongitudNombre,nombre,2,30);

                let validacionCampoVacioApellidos=false;
                let validacionCaracteresExtraniosApellidos=false;
                let validacionLongitudApellidos=false;
                let campoApellidosPasoTodasLasValidaciones=false;
                validacionCampoVacioApellidos=verificarQueElCampoNoEsteVacio(validacionCampoVacioApellidos,apellidos);
                validacionCaracteresExtraniosApellidos=verificarQueElCampoNoContengaCaracteresExtranios(validacionCaracteresExtraniosApellidos,apellidos);
                validacionLongitudApellidos=verificarLongitud(validacionLongitudApellidos,apellidos,);


                ///////////////////////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////








                // if()
                // {
                //     let mensajeError = document.getElementById("");
                //     mensajeError.textContent = "";
                //     =true;
                // }

                
                if(campoNombrePasoTodasLasValidaciones&&campoPrimerApellidoPasoTodasLasValidaciones&&campoSegundoApellidoPasoTodasLasValidaciones&&campoCorreoElectronicoPasoTodasLasValidaciones&&campoContraseniaPasoTodasLasValidaciones&&campoConfirmarContraseniaPasoTodasLasValidaciones&&campoTelefonoPasoTodasLasValidaciones&&campoFechaDeNacimientoPasoTodasLasValidaciones)
                {
                    mensajeValidacionFormulario.textContent = "";
                    laTareaPasoTodasLasValidaciones=true;
                }
                else
                {
                    mensajeValidacionFormulario.style.color = "red";
                    mensajeValidacionFormulario.textContent = "Por favor, complete el formulario correctamente.";  
                }
            }
            function verificarQueElCampoNoEsteVacio(validacionCampoVacio,elementoInput)
            {
                // Elimina los espacios en blanco del valor del elemento input
                let elementoInputSinEspacios = elementoInput.value.trim();

                // Verifica si el campo nombre está vacío
                if (elementoInputSinEspacios === "")
                {
                    // El campo nombre está vacío
                    // Muestra un mensaje de error
                    let mensajeError = document.getElementById("mensajeValidacion"+elementoInput.name);
                    mensajeError.style.color = "red";
                    mensajeError.textContent = "El campo '"+elementoInput.name+"' no puede quedar vacío.";

                    // Evita que el formulario se envíe
                    event.preventDefault();
                }
                else
                {
                    validacionCampoVacio=true;
                }
                return validacionCampoVacio;
            }
            function verificarLongitud(validacionLongitud,elementoInput,longitudMinima,longitudMaxima)
            {
                // Verifica si la longitud del campo nombre es menor a 35
                longitudMaxima=longitudMaxima+1;
                let longitudMuyCorta=elementoInput.value.length < longitudMinima;
                let longitudMuyLarga=elementoInput.value.length >= longitudMaxima;
                console.log("Longitud muy corta: "+longitudMuyCorta);
                console.log("Longitud muy larga: "+longitudMuyLarga);
                console.log(" ");

                // Si la longitud del campo nombre es mayor o igual a 35, muestra un mensaje de error
                if(longitudMuyCorta||longitudMuyLarga)
                {
                    // Muestra un mensaje de error
                    const mensajeError = document.getElementById("mensajeValidacion"+elementoInput.name);
                    mensajeError.style.color = "red";
                    longitudMaxima=longitudMaxima-1;
                    if(longitudMuyCorta)
                    {
                        mensajeError.textContent = "La longitud del campo no puede ser menor a "+longitudMinima+" caracter(es).";
                    }
                    else if(longitudMuyLarga)
                    {
                        mensajeError.textContent = "La longitud del campo no puede ser mayor a "+longitudMaxima+" caracteres.";
                    }
                    // Evita que el formulario se envíe
                    event.preventDefault();
                }
                else
                {
                    validacionLongitud=true;
                }
                return validacionLongitud;
            }
            function verificarQueElCampoNoContengaCaracteresExtranios(validacionCaracteresExtranios,elementoInput)
            {
                // Verifica si el campo nombre tiene algún caracter que no sea una letra del alfabeto español
                const contieneCaracteresNoEspanoles = /[^a-záéíóúüññç\s]/i.test(elementoInput.value);

                // Si el campo nombre tiene algún caracter que no sea una letra del alfabeto español, muestra un mensaje de error
                if (contieneCaracteresNoEspanoles)
                {
                    // El campo nombre tiene algún caracter que no sea una letra del alfabeto español
                    // Muestra un mensaje de error
                    const mensajeError = document.getElementById("mensajeValidacion"+elementoInput.name);
                    mensajeError.style.color = "red";
                    mensajeError.textContent = "Este campo solo puede contener letras del alfabeto español.";

                    // Evita que el formulario se envíe
                    event.preventDefault();
                }
                else
                {
                    validacionCaracteresExtranios=true;
                }
                return validacionCaracteresExtranios;
            }
            function verificarSintaxisCorreo(validacionSintaxisCorreo,correo)
            {
                // Verifica si el valor del input coincide con el patrón
                const coincideConElPatron = correo.value.match(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/);

                // Si el valor del input no coincide con el patrón, muestra un mensaje de error
                if (!coincideConElPatron)
                {
                    // El valor del input no coincide con el patrón
                    // Muestra un mensaje de error
                    const mensajeError = document.getElementById("mensajeValidacionCorreo");
                    mensajeError.style.color = "red";
                    mensajeError.textContent = "El correo electrónico no es válido.";

                    // Evita que el formulario se envíe
                    event.preventDefault();
                }
                else
                {
                    validacionSintaxisCorreo=true;
                }
                return validacionSintaxisCorreo;
            }
            function verificarQueElCampoSoloContengaNumeros(validacionNumeros,elementoInput)
            {
                /*if(elementoInput.value==="")
                {
                    elementoInput.value=1;
                }*/
                if (!elementoInput.value.match(/^[0-9]+$/))
                {
                    const mensajeError = document.getElementById("mensajeValidacion"+elementoInput.name);
                    mensajeError.style.color = "red";
                    mensajeError.textContent = "Este campo solo puede contener numeros naturales.";
                    event.preventDefault();
                }
                else
                {
                    validacionNumeros=true;
                }
                return validacionNumeros; 
            }
            function verificarQueLosCamposCoincidan(losCamposCoinciden,elementoInputUno,elementoInputDos)
            {
                let valorElementoInputUno=elementoInputUno.value;
                let valorElementoInputDos=elementoInputDos.value;
                /*console.log("Dentro de la funcion verificarQueLosCamposCoincidan");
                console.log("Valor contraseña "+valorElementoInputDos);
                console.log("Valor verificar contraseña "+valorElementoInputUno);*/
                if (valorElementoInputUno!==valorElementoInputDos)
                {
                    // Muestra un mensaje de error
                    const mensajeError = document.getElementById("mensajeValidacion"+elementoInputUno.name);
                    mensajeError.style.color = "red";
                    mensajeError.textContent = "Las contraseñas no coinciden.";

                    // Evita que el formulario se envíe
                    event.preventDefault();
                }
                else
                {
                    losCamposCoinciden=true;
                }
                return losCamposCoinciden;
            }
            return laTareaPasoTodasLasValidaciones;
        }
    }
);