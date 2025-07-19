
document.getElementById('categoria').onchange = function(){
    var categoriaID= this.value;
    var peticion= new XMLHttpRequest();
    peticion.open('POST', '../../../ProyectoAvance2/CONFIG/obtenerMotos.php?categoria=' + categoriaID);
    peticion.onload=function(){
        //limpiar
        var motoSelect = document.getElementById('moto');
        for(var i=motoSelect.options.length;i>0;i--){
            motoSelect.options.remove(i);
        }
        if(peticion.status===200){
            var motos = JSON.parse(peticion.responseText);
            for(var j=0;j<motos.length;j++){
                var moto = motos[j];
                var option = document.createElement('option');
                option.value = moto.nombre;
                option.text = moto.nombre;
                motoSelect.options.add(option);
            }
        }
    };
    peticion.send();
};

//funciona para caundo requieren el financiamiento de una moto desde el catalogo
function alCargarFinanciamiento(cat,nombre){
    console.log(cat);
    var categoriaID= cat;
    var peticion= new XMLHttpRequest();
    peticion.open('POST', '../../../ProyectoAvance2/CONFIG/obtenerMotos.php?categoria=' + categoriaID);
    peticion.onload=function(){
        //limpiar
        var motoSelect = document.getElementById('moto');
        for(var i=motoSelect.options.length;i>0;i--){
            motoSelect.options.remove(i);
        }
        if(peticion.status===200){
            var motos = JSON.parse(peticion.responseText);
            for(var j=0;j<motos.length;j++){
                var moto = motos[j];
                var option = document.createElement('option');
                option.value = moto.nombre;
                option.text = moto.nombre;
                if(nombre===moto.nombre){
                    option.selected=true;
                }
                motoSelect.options.add(option);
            }
        }
    };
    peticion.send();
};