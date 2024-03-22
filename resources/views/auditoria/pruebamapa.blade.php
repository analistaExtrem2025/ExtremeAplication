<!DOCTYPE html>

<html>

<head>

    <title>Desplegar un mapa básico</title>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />

    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

    <style>
        #map {
            width: 100%;
            height: 400px;
            border-radius: 0.75rem;
            border-color: black;
            border-style: double;
        }
        #container {
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
            width: 200px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            font-size: 16px;
            margin: 10px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
            text-align: left;
        }

        .randomBtn {
            background-color: #2196f3;
        }

        .randomBtn:hover {
            background-color: #1e87db;
        }

        .selected {
            background-color: #ffff00;
        }

        .selected:hover {
            background-color: #ffff00;
        }

        .sele {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
            width: 200px;

        }
    </style>
</head>
<body>
    <div id="map"></div>
    <br><br>
    <div id="container">
        <div class="row">
        {!! Form::select('Ciudad', $ciudades, null, [
            'class' => 'sele',
            'placeholder' => 'Selección de ciudad',
            'onchange' => 'selectCity()',
            'id' => 'Ciudad',
            'required',
        ]) !!}
        &nbsp;&nbsp;&nbsp;&nbsp;
        <div id="divbta" style="display: none">
            <select name="rutas" id="inputName" class="sele">
                <option value="" selected disabled>selección de ruta</option>
                @foreach ($bta as $key => $dr)
                    <option value="{{ $dr }}"> {{ $key }} - {{ $dr }}</option>
                @endforeach
            </select>
        </div>
        <div id="divmed" style="display: none">
            <select name="rutas" id="inputName" class="sele">
                <option value="" selected disabled>selección de ruta</option>
                @foreach ($med as $md)
                    <option value="{{ $md }}">{{ $md }}</option>
                @endforeach
            </select>
        </div>
        <div id="divcal" style="display: none">
            <select name="rutas" id="inputName" class="sele">
                <option value="" selected disabled>selección de ruta</option>
                @foreach ($cal as $cl)
                    <option value="{{ $cl }}">{{ $cl }}</option>
                @endforeach
            </select>
        </div>
        <div id="divbar" style="display: none">
            <select name="rutas" id="inputName" class="sele">
                <option value="" selected disabled>selección de ruta</option>
                @foreach ($bar as $br)
                    <option value="{{ $br }}">{{ $br }}</option>
                @endforeach
            </select>
        </div>
        <div id="divbuc" style="display: none">
            <select name="rutas" id="inputName" class="sele">
                <option value="" selected disabled>selección de ruta</option>
                @foreach ($buc as $bu)
                    <option value="{{ $bu }}">{{ $bu }}</option>
                @endforeach
            </select>
        </div>
    </div>
        <button id="addBtn">Agregar</button>
        {!! Form::open(['route' => 'mapsStore', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <ul id="nameList" name="nameList">

        </ul>
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <script>
        var coord = {!! json_encode($coord) !!};
        var map = L.map('map').setView(
            [10.9635, -74.7943],
            15);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: 'Datos &copy; <a href="http://osm.org/copyright" target="blanck">Colaboradores de OpenStreetMap</a> (<a href="http://www.openstreetmap.org/copyright" target="blanck">ODbL</a>) | Teselas <a href="https://github.com/gravitystorm/openstreetmap-carto" target="blanck">OSM Carto</a> &copy; Randy Allan y otros colaboradores (<a href="https://creativecommons.org/licenses/by-sa/2.0/deed.es" target="blanck">CC BY-SA 2.0</a>)'
        }).addTo(map);

        var cordenate1 = [-74.7943,	10.9635];
        var cordenate2 = [-74.7947,	10.9623];
        var cordenate3 = [-74.794697, 10.962875];
        var cordenate4 = [-74.7955,	10.9636];
        var cordenate5 = [-74.78927185,	10.96030892];

        var historic_features = {
            "type": "FeatureCollection",
            "features": [{
                    "type": "Feature",
                    "geometry": {
                        "type": "Polygon",
                        "coordinates": [
                            [
                                cordenate1,

                            ]
                        ]
                    },
                    "properties": {
                        "Nombre": "Mercado de Atarazanas",
                        "Descripción": "Mercado municipal central"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": cordenate2,
                    },
                    "properties": {
                        "Nombre": "CIGAR EL PUNTO",
                        "Descripción": "TIENDA SOCIAL"
                    }
                },

                {
                    "type": "Feature",
                    "geometry": {
                        "type": "LineString",
                        "coordinates": [
                            cordenate3,
                        ]
                    },
                    "properties": {
                        "Nombre": "Calle Carretería",
                        "Descripción": "Calle del Centro Histórico"
                    }
                }, {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": cordenate4
                    },
                    "properties": {
                        "Nombre": "este punto se lala de prueba",
                        "Descripción": "Fortificación palaciega medieval"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": cordenate5
                    },
                    "properties": {
                        "Nombre": "de otra forma ",
                        "Descripción": "Fortificación palaciega medieval"
                    }
                }




            ]
        };

        L.geoJson(historic_features, {
            onEachFeature: function(feature, layer) {
                layer.bindPopup(feature.properties.Nombre);
            }
        }).addTo(map)
    </script>

    <script>
        const inputName = document.getElementById('inputName');
        const addBtn = document.getElementById('addBtn');
        const nameList = document.getElementById('nameList');
        const randomBtn = document.getElementById('randomBtn');

        let names = [];

        function addName() {
            const name = inputName.value.trim();
            if (name !== '') {
                names.push(name);
                renderNames();
                inputName.value = '';
            }

            console.log(names.val())


        }

        function renderNames() {
            nameList.innerHTML = '';
            names.forEach(name => {
                const listItem = document.createElement('li');
                listItem.textContent = name;
                nameList.appendChild(listItem);
            });
        }

        function selectRandomName() {
            if (names.length > 0) {
                const randomIndex = Math.floor(Math.random() * names.length);
                const selectedName = names[randomIndex];
                const selectedListItem = nameList.childNodes[randomIndex];
                selectedListItem.classList.add('selected');
                selectedListItem.textContent += ` - Se ha elegido: ${selectedName}`;
            } else {
                alert('¡No hay nombres en la lista!');
            }
        }

        addBtn.addEventListener('click', addName);
        randomBtn.addEventListener('click', selectRandomName);
    </script>
    <script type="text/javascript">
        function selectCity() {
        var city = document.getElementById("Ciudad").value;
        var divBta = document.getElementById("divbta");
        var divMed = document.getElementById("divmed");
        var divCal = document.getElementById("divcal");
        var divBuc = document.getElementById("divbuc");
        var divBar = document.getElementById("divbar");

        if (city == "BOGOTA") {
            divBta.style.display = "block";
            divMed.style.display = "none";
            divBar.style.display = "none";
            divBuc.style.display = "none";
            divCal.style.display = "none";
        } else if (city == "MEDELLIN" ) {
            divMed.style.display = "block";
            divBta.style.display = "none";
            divBar.style.display = "none";
            divBuc.style.display = "none";
            divCal.style.display = "none";

        } else if (city == "BARRANQUILLA" ) {
            divBar.style.display = "block";
            divMed.style.display = "none";
            divBta.style.display = "none";
            divBuc.style.display = "none";
            divCal.style.display = "none";

        } else if (city == "BUCARAMANGA" ) {
            divBuc.style.display = "block";
            divBar.style.display = "none";
            divMed.style.display = "none";
            divBta.style.display = "none";
            divCal.style.display = "none";

        } else if (city == "CALI" ) {
            divCal.style.display = "block";
            divBuc.style.display = "none";
            divBar.style.display = "none";
            divMed.style.display = "none";
            divBta.style.display = "none";

        }
    }
    </script>
</body>

</html>
