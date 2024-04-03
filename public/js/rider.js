document.addEventListener('DOMContentLoaded', function () {
    mapboxgl.accessToken = 'pk.eyJ1IjoiZG5lcml6IiwiYSI6ImNsdHJrN3ppZjAxYmsya3BqcWRsYzdkam8ifQ.gjTWrYyirEhh94V_agnuhQ';
    var modoPua = false;
    var markersData = []; // Array para almacenar datos de las marcas
    var puaNames = {}; // Objeto para almacenar los nombres de las puas

    var removeAttributionControl = function () {
        var attribControl = document.querySelector('.mapboxgl-ctrl-attrib');
        if (attribControl) {
            attribControl.parentNode.removeChild(attribControl);
        }
    };

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [2.1734, 41.3851],
        zoom: 13
    });

    map.on('load', function () {
        removeAttributionControl();
    });

    var createMarkerButton = document.getElementById('createMarkerButton');

    createMarkerButton.addEventListener('click', function () {
        // Cambiar el estado del modoPua
        modoPua = !modoPua;

        // Actualizar el estilo del botón
        updateButtonStyle();

        // Cambiar el cursor del mapa según el estado de modoPua
        if (modoPua) {
            map.getCanvas().style.cursor = 'pointer';
        } else {
            map.getCanvas().style.cursor = '';
        }
    });

    map.on('click', function (e) {
        if (modoPua) {
            // Mostrar modal para preguntas
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            document.getElementById("puaForm").reset();
            var closeButton = document.getElementById("closeButton");
            
            closeButton.onclick = function() {
                modal.style.display = "none";
            }
            // Obtener elementos del modal
            var nombrePuaInput = document.getElementById("nombrePua");
            var pregunta1Input = document.getElementById("pregunta1");
            var pregunta2Input = document.getElementById("pregunta2");
            var submitButton = document.getElementById("submitForm");

            // Definir evento de clic para el botón de envío del formulario
            submitButton.onclick = function () {
                var nombrePua = nombrePuaInput.value;
                var pregunta1 = pregunta1Input.value;
                var pregunta2 = pregunta2Input.value;

                // Validar que el nombre de la pua no esté vacío
                if (nombrePua.trim() === '') {
                    alert("El nombre de la pua no puede estar vacío.");
                    return;
                }

                // Crear la pua en el mapa
                const nuevaPuaId = markersData.length + 1;

                // Guardar los datos de la pua para su uso posterior
                markersData.push({
                    id: nuevaPuaId,
                    coordinates: e.lngLat,
                    nombre: nombrePua,
                    pregunta1: pregunta1,
                    pregunta2: pregunta2
                });

                // Actualizar el mapa con el nuevo popup de la pua
                var description = "<h3>" + nombrePua + "</h3>" +
                    "<p>Pregunta 1: " + pregunta1 + "</p>" +
                    "<p>Pregunta 2: " + pregunta2 + "</p>"; // Mostrar el nombre y las preguntas en el popup

                new mapboxgl.Marker({
                    color: "#FFFFFF",
                    draggable: false
                })
                .setLngLat(e.lngLat)
                .setPopup(new mapboxgl.Popup().setHTML(description))
                .addTo(map);

                // Reiniciar el modoPua
                modoPua = false;
                updateButtonStyle();
                map.getCanvas().style.cursor = '';

                // Cerrar el modal
                modal.style.display = "none";
            };
        }
    });

    function updateButtonStyle() {
        // Actualizar el estilo del botón según el estado de modoPua
        if (modoPua) {
            createMarkerButton.classList.add('active');
        } else {
            createMarkerButton.classList.remove('active');
        }
    }

    // Cambiar el cursor al pasar sobre una pua
    map.on('mouseenter', function () {
        map.getCanvas().style.cursor = 'pointer';
    });

    map.on('mouseleave', function () {
        map.getCanvas().style.cursor = '';
    });
});
