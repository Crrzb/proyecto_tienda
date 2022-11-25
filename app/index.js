function login(){
    let clave = document.querySelector("#input_clave").value;
    if((clave=="" || clave==" ") || (isNaN(clave))){
        
        alert("Clave incorrecta");
    }else{
        window.location.href = "./caja_inicio.php";
    }
    
}

function validar(){
    let txt_box = document.querySelector("#input_clave");
    if(isNaN(txt_box.value)){
        txt_box.value ="";
    }
}

