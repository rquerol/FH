document.addEventListener('DOMContentLoaded', function () {
    mapboxgl.accessToken = 'pk.eyJ1IjoiZG5lcml6IiwiYSI6ImNsdHJrN3ppZjAxYmsya3BqcWRsYzdkam8ifQ.gjTWrYyirEhh94V_agnuhQ';
    var modoPua = false;
    var markers = []; // Array para almacenar las marcas creadas

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

    document.getElementById('createMarkerButton').addEventListener('click', function () {
        modoPua = !modoPua;
        updateButtonStyle();

        if (modoPua) {
            map.getCanvas().style.cursor = 'pointer';
        } else {
            map.getCanvas().style.cursor = '';
        }
    });

    map.on('click', function (e) {
        if (modoPua) {
            const marker = new mapboxgl.Marker({
                color: "#FFFFFF",
                draggable: false
            }).setLngLat(e.lngLat)
                .addTo(map);
            
            markers.push(marker); // Agrega la marca al array de marcas

            console.log("Marca creada en: " + e.lngLat);
        }
    });

    function updateButtonStyle() {
        var button = document.getElementById('createMarkerButton');
        if (modoPua) {
            button.classList.add('active');
        } else {
            button.classList.remove('active');
        }
    }

    // Agregar popups a cada marca
    markers.forEach(function(marker) {
        var coordinates = marker.getLngLat().toArray();
        var description = "<h3>Información personalizada</h3>"; // Aquí puedes agregar información específica para cada marca

        new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(description)
            .addTo(marker);
    });

    // Agregar popups cuando se hace clic en marcas existentes
    map.on('click', 'markers', function (e) {
        if (!modoPua) {
            var coordinates = e.features[0].geometry.coordinates.slice();
            var description = "<h3>Información personalizada</h3>"; // Aquí puedes agregar información específica para cada marca

            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }

            new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML(description)
                .addTo(map);
        }
    });

    map.on('mouseenter', 'markers', function () {
        map.getCanvas().style.cursor = 'pointer';
    });

    map.on('mouseleave', 'markers', function () {
        map.getCanvas().style.cursor = '';
    });
});
