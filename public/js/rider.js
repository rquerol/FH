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
        // Agregar popups a cada marca
        markersData.forEach(function (markerData) {
            var coordinates = markerData.coordinates;
            var nombrePua = puaNames[markerData.id];
            var description = "<h3>" + nombrePua + "</h3>"; // Obtener el nombre de la pua correspondiente

            new mapboxgl.Marker({
                color: "#FFFFFF",
                draggable: false
            })
            .setLngLat(coordinates)
            .setPopup(new mapboxgl.Popup().setHTML(description))
            .addTo(map);
        });
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
            // Obtener el nombre de la pua del usuario
            var nombrePua = prompt("Por favor, ingrese el nombre de la pua:");
            if (nombrePua && nombrePua.trim() !== '') {
                // Crear la pua en el mapa
                const nuevaPuaId = markersData.length + 1;

                // Guardar el nombre de la pua con su ID
                puaNames[nuevaPuaId] = nombrePua.trim();

                // Guardar los datos de la pua para su uso posterior
                markersData.push({
                    id: nuevaPuaId,
                    coordinates: e.lngLat
                });

                // Actualizar el mapa con el nuevo popup de la pua
                var description = "<h3>" + nombrePua + "</h3>"; // Mostrar el nombre de la pua en el popup

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
            } else {
                alert("El nombre de la pua no puede estar vacío.");
            }
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

    // Función para borrar una pua
    map.on('click', function (e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['markers'] });
        if (!features.length) {
            return;
        }
        var puaId = features[0].properties.id;
        var nombrePua = puaNames[puaId];
        if (confirm("¿Estás seguro de que quieres borrar la pua '" + nombrePua + "'?")) {
            markersData = markersData.filter(function (marker) {
                return marker.id !== puaId;
            });
            map.getSource('markers').setData({
                type: 'FeatureCollection',
                features: markersData.map(function (marker) {
                    return {
                        type: 'Feature',
                        geometry: {
                            type: 'Point',
                            coordinates: marker.coordinates
                        },
                        properties: {
                            id: marker.id
                        }
                    };
                })
            });
        }
    });
});
