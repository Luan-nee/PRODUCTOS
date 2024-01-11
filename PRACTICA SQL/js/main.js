let conteiner_product = document.querySelector("#conteiner_producto");
//eventos
conteiner_product.addEventListener("click", moveDescript, true);

//funciones
let padreTemp;
let padreActual;
let descripActual;
let descriptemp;
let height;
let flap = 0;
function moveDescript(e){
    if(e.target.localName == "img"){
        if(flap != 0){
            descriptemp.style.top = "0px";
            padreTemp.style.zIndex = "0";
        }

        descripActual = e.target.nextElementSibling.nextElementSibling;
        padreActual = e.target.offsetParent;
        height = padreActual.clientHeight;
        
        descripActual.style.top = height+"px";
        padreActual.style.zIndex = "2";

        descriptemp = e.target.nextElementSibling.nextElementSibling;
        padreTemp = e.target.offsetParent;

        flap++;
    }
}
