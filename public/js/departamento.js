< script >
    const depto = document.getElementById('depar')
    var inputDep = document.getElementById("departamento");
    var inputMun = document.getElementById("municipio");

    depto.addEventListener('change', (e) => {
    if (e.target.value == '0') {
        $("#div_bogota").show();
        $('#bogota').prop('disabled', false)
        $("#div_loc_bogota").show();
        $('#loc_bta').prop('disabled', false)
        $("#div_antioquia").hide();
        $('#antioquia').prop('disabled', true)
        $("#div_loc_antioquia").hide();
        $('#loc_ant').prop('disabled', true)
        $("#div_atlantico").hide();
        $('#atlantico').prop('disabled', true)
        $("#div_loc_atlantico").hide();
        $('#loc_atl').prop('disabled', true)
        $("#div_cundinamarca").hide();
        $('#cundi').prop('disabled', true)
        $("#div_loc_cundinamarca").hide();
        $('#loc_cund').prop('disabled', true)
        $("#div_santander").hide();
        $('#santander').prop('disabled', true)
        $("#div_loc_santander").hide();
        $('#loc_sant').prop('disabled', true)
        $("#div_valle").hide();
        $('#valleC').prop('disabled', true)
        $("#div_loc_valle").hide();
        $('#loc_vall').prop('disabled', true)
        inputDep.value = "Bogotá D.C.";
        inputMun.value = "Bogotá D.C.";
    } else if (e.target.value == '1') {
        $("#div_bogota").hide();
        $('#bogota').prop('disabled', true)
        $("#div_loc_bogota").hide();
        $('#loc_bta').prop('disabled', true)
        $("#div_antioquia").show();
        $('#antioquia').prop('disabled', false)
        $("#div_loc_antioquia").show();
        $('#loc_ant').prop('disabled', false)
        $("#div_atlantico").hide();
        $('#atlantico').prop('disabled', true)
        $("#div_loc_atlantico").hide();
        $('#loc_atl').prop('disabled', true)
        $("#div_cundinamarca").hide();
        $('#cundi').prop('disabled', true)
        $("#div_loc_cundinamarca").hide();
        $('#loc_cund').prop('disabled', true)
        $("#div_santander").hide();
        $('#santander').prop('disabled', true)
        $("#div_loc_santander").hide();
        $('#loc_sant').prop('disabled', true)
        $("#div_valle").hide();
        $('#valleC').prop('disabled', true)
        $("#div_loc_valle").hide();
        $('#loc_vall').prop('disabled', true)
        inputDep.value = "Antioquia";
        inputMun.value = "Medellín";
    } else if (e.target.value == '2') {
        $("#div_bogota").hide();
        $('#bogota').prop('disabled', true)
        $("#div_loc_bogota").hide();
        $('#loc_bta').prop('disabled', true)
        $("#div_antioquia").hide();
        $('#antioquia').prop('disabled', true)
        $("#div_loc_antioquia").hide();
        $('#loc_ant').prop('disabled', true)
        $("#div_atlantico").show();
        $('#atlantico').prop('disabled', false)
        $("#div_loc_atlantico").show();
        $('#loc_atl').prop('disabled', false)
        $("#div_cundinamarca").hide();
        $('#cundi').prop('disabled', true)
        $("#div_loc_cundinamarca").hide();
        $('#loc_cund').prop('disabled', true)
        $("#div_santander").hide();
        $('#santander').prop('disabled', true)
        $("#div_loc_santander").hide();
        $('#loc_sant').prop('disabled', true)
        $("#div_valle").hide();
        $('#valleC').prop('disabled', true)
        $("#div_loc_valle").hide();
        $('#loc_vall').prop('disabled', true)
        inputDep.value = "Atlántico";
        inputMun.value = "Barranquilla";
    } else if (e.target.value == '3') {
        $("#div_bogota").hide();
        $('#bogota').prop('disabled', true)
        $("#div_loc_bogota").hide();
        $('#loc_bta').prop('disabled', true)
        $("#div_antioquia").hide();
        $('#antioquia').prop('disabled', true)
        $("#div_loc_antioquia").hide();
        $('#loc_ant').prop('disabled', true)
        $("#div_atlantico").hide();
        $('#atlantico').prop('disabled', true)
        $("#div_loc_atlantico").hide();
        $('#loc_atl').prop('disabled', true)
        $("#div_cundinamarca").show();
        $('#cundi').prop('disabled', false)
        $("#div_loc_cundinamarca").show();
        $('#loc_cund').prop('disabled', false)
        $("#div_santander").hide();
        $('#santander').prop('disabled', true)
        $("#div_loc_santander").hide();
        $('#loc_sant').prop('disabled', true)
        $("#div_valle").hide();
        $('#valleC').prop('disabled', true)
        $("#div_loc_valle").hide();
        $('#loc_vall').prop('disabled', true)
        inputDep.value = "Cundinamarca";
        inputMun.value = "Soacha";
    } else if (e.target.value == '4') {
        $("#div_bogota").hide();
        $('#bogota').prop('disabled', true)
        $("#div_loc_bogota").hide();
        $('#loc_bta').prop('disabled', true)
        $("#div_antioquia").hide();
        $('#antioquia').prop('disabled', true)
        $("#div_loc_antioquia").hide();
        $('#loc_ant').prop('disabled', true)
        $("#div_atlantico").hide();
        $('#atlantico').prop('disabled', true)
        $("#div_loc_atlantico").hide();
        $('#loc_atl').prop('disabled', true)
        $("#div_cundinamarca").hide();
        $('#cundi').prop('disabled', true)
        $("#div_loc_cundinamarca").hide();
        $('#loc_cund').prop('disabled', true)
        $("#div_santander").show();
        $('#santander').prop('disabled', false)
        $("#div_loc_santander").show();
        $('#loc_sant').prop('disabled', false)
        $("#div_valle").hide();
        $('#valleC').prop('disabled', true)
        $("#div_loc_valle").hide();
        $('#loc_vall').prop('disabled', true)
        inputDep.value = "Santander";
        inputMun.value = "Bucaramanga";
    } else if (e.target.value == '5') {
        $("#div_bogota").hide();
        $('#bogota').prop('disabled', true)
        $("#div_loc_bogota").hide();
        $('#loc_bta').prop('disabled', true)
        $("#div_antioquia").hide();
        $('#antioquia').prop('disabled', true)
        $("#div_loc_antioquia").hide();
        $('#loc_ant').prop('disabled', true)
        $("#div_atlantico").hide();
        $('#atlantico').prop('disabled', true)
        $("#div_loc_atlantico").hide();
        $('#loc_atl').prop('disabled', true)
        $("#div_cundinamarca").hide();
        $('#cundi').prop('disabled', true)
        $("#div_loc_cundinamarca").hide();
        $('#loc_cund').prop('disabled', true)
        $("#div_santander").hide();
        $('#santander').prop('disabled', true)
        $("#div_loc_santander").hide();
        $('#loc_sant').prop('disabled', true)
        $("#div_valle").show();
        $('#valleC').prop('disabled', false)
        $("#div_loc_valle").show();
        $('#loc_vall').prop('disabled', false)
        inputDep.value = "Valle del Cauca";
        inputMun.value = "Cali";
    }
})

        var loc1 = document.getElementById("loc_bta");
        var loc2 = document.getElementById("loc_ant");
        var loc3 = document.getElementById("loc_atl");
        var loc4 = document.getElementById("loc_cund");
        var loc5 = document.getElementById("loc_sant");
        var loc6 = document.getElementById("loc_vall");
        var inputLoc = document.getElementById("localidad");

        loc1.addEventListener('change', (f)=>{
        if (f.target.value == '0') {

            inputLoc.value = "Usaquén - 1";
        } else if (f.target.value == '1') {
            inputLoc.value = "Chapinero - 2";
        } else if (f.target.value == '2') {
            inputLoc.value = "Santa Fe - 3";
        } else if (f.target.value == '3') {
            inputLoc.value = "San Cristóbal - 4";
        } else if (f.target.value == '4') {
            inputLoc.value = "Usme - 5";
        } else if (f.target.value == '5') {
            inputLoc.value = "Tunjuelito - 6";
        } else if (f.target.value == '6') {
            inputLoc.value = "Bosa - 7";
        } else if (f.target.value == '7') {
            inputLoc.value = "Kennedy - 8";
        } else if (f.target.value == '8') {
            inputLoc.value = "Fontibón - 9";
        } else if (f.target.value == '9') {
            inputLoc.value = "Engativá - 10";
        } else if (f.target.value == '10') {
            inputLoc.value = "Suba - 11";
        } else if (f.target.value == '11') {
            inputLoc.value = "Barrios Unidos - 12";
        } else if (f.target.value == '12') {
            inputLoc.value = "Teusaquillo - 13";
        } else if (f.target.value == '13') {
            inputLoc.value = "Los Mártires - 14";
        } else if (f.target.value == '14') {
            inputLoc.value = "Antonio Nariño - 15";
        } else if (f.target.value == '15') {
            inputLoc.value = "Puente Aranda - 16";
        } else if (f.target.value == '16') {
            inputLoc.value = "La Candelaria - 17";
        } else if (f.target.value == '17') {
            inputLoc.value = "Rafael Uribe Uribe - 18";
        } else if (f.target.value == '18') {
            inputLoc.value = "Ciudad Bolívar - 19";
        } else if (f.target.value == '19') {
            inputLoc.value = "Sumapaz - 20";
        }
    })
        loc2.addEventListener('change', (g) => {
        if (g.target.value == '0') {
            inputLoc.value = "Comuna 1 - Popular";
        } else if (g.target.value == '1') {
            inputLoc.value = "Comuna 2 - Santa Cruz";
        } else if (g.target.value == '2') {
            inputLoc.value = "Comuna 3 - Manrique";
        } else if (g.target.value == '3') {
            inputLoc.value = "Comuna 4 - Aranjuez";
        } else if (g.target.value == '4') {
            inputLoc.value = "Comuna 5 - Castilla";
        } else if (g.target.value == '5') {
            inputLoc.value = "Comuna 6 - Doce de Octubre";
        } else if (g.target.value == '6') {
            inputLoc.value = "Comuna 7 - Robledo";
        } else if (g.target.value == '7') {
            inputLoc.value = "Comuna 8 - Villa Hermosa";
        } else if (g.target.value == '8') {
            inputLoc.value = "Comuna 9 - Buenos Aires";
        } else if (g.target.value == '9') {
            inputLoc.value = "Comuna 10 - La Candelaria";
        } else if (g.target.value == '10') {
            inputLoc.value = "Comuna 11 - Laureles-Estadio";
        } else if (g.target.value == '11') {
            inputLoc.value = "Comuna 12 - La América";
        } else if (g.target.value == '12') {
            inputLoc.value = "Comuna 13 - San Javierz";
        } else if (g.target.value == '13') {
            inputLoc.value = "Comuna 14 - El Poblado";
        } else if (g.target.value == '14') {
            inputLoc.value = "Comuna 15 - Guayabal";
        } else if (g.target.value == '15') {
            inputLoc.value = "Comuna 16 - Belén";
        }
    })
    </script>
