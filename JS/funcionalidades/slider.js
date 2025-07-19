//guardamos en una constante el rango
const ran_max=document.getElementById("rango_max");
const rango = document.querySelectorAll(".rango input");
let deslizante = document.querySelector(".Cont_deslizante .deslizante");
let precio = document.querySelectorAll(".SelecPrec input");
function crearSlider(tope){
    rango.forEach(input =>{
        //obtenemos el minimo y el maximo valor del slider
        input.addEventListener("input",e =>{
            let min = parseInt(rango[0].value);
            let max = parseInt(rango[1].value);
            if((max-min)<tope){ //ponemos un tope para que el min y max no se toquen
                if(e.target.id==="rango_min"){
                    rango[0].value = max - tope;
                } else {
                    rango[1].value = min + tope;
                }
            } else {
                precio[0].value=min;
                precio[1].value=max;
                deslizante.style.left=((min/rango[0].max) * 100) + "%";
                deslizante.style.right= 100 - ((max/rango[1].max) * 100) + "%";
            }
    
        });
    })
    
    precio.forEach(input =>{
        //obtenemos el minimo y el maximo valor del input
        input.addEventListener("input",e =>{
            let min = parseInt(precio[0].value);
            let max = parseInt(precio[1].value);
            if(((max-min)>=tope) && (max<=ran_max.value)){ //ponemos un tope para que el min y max no se toquen
                if(e.target.id==="min-precio"){
                    rango[0].value = min;
                    deslizante.style.left=((min/rango[0].max) * 100) + "%";
                } else {
                    rango[1].value = max;
                    deslizante.style.right= 100 - ((max/rango[1].max) * 100) + "%";
                }
            }
        });
    })
}

const tope=5000;
crearSlider(tope)