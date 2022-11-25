function salir(){
    window.location.href = ".";
}

function goto_inventario(){
    window.location.href = "./inventario.php";
}

function cobrar(){
    let p_total = document.querySelector("#p_total");
    let total = p_total.innerHTML.split(': ')[1];
    
    let input_cobro = document.querySelector("#input_cobro");
    let cobro = input_cobro.value;

    let cambio = total - cobro;

    let p_cambio = document.querySelector("#cambio");
    p_cambio.innerHTML = "Cambio: "+cambio*-1;
}

function cancelar_pago(){
    window.location.href = "./caja_inicio.php";
}

let input_cobro = document.querySelector("#input_cobro");
input_cobro.addEventListener('keyup', function (evt) {

    var key = evt.keyCode;

    if(key===32){
        evt.preventDefault();
        input_cobro.value =""
        document.querySelector("#cobrar_btn").classList.add("disabled");
    }else{
        if(isNaN(input_cobro.value)){
            evt.preventDefault();
            input_cobro.value =""
            document.querySelector("#cobrar_btn").classList.add("disabled");
        }else{
            document.querySelector("#cobrar_btn").classList.remove("disabled");
        }
    }

    
});

input_cobro.addEventListener('emptied', function (evt) {

    var key = evt.keyCode;

    if(key===32){
        evt.preventDefault();
        input_cobro.value =""
        document.querySelector("#cobrar_btn").classList.add("disabled");
    }else{
        if(isNaN(input_cobro.value)){
            evt.preventDefault();
            input_cobro.value =""
            document.querySelector("#cobrar_btn").classList.add("disabled");
        }else{
            document.querySelector("#cobrar_btn").classList.remove("disabled");
        }
    }

    
});