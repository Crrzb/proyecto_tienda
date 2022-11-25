
document.addEventListener('load', al_cargar());
let lista_productos, lista_categorias,guardar_item;

function al_cargar() {
    const request = new XMLHttpRequest();
    request.open("GET", './scripts/get_categorias.php');
    request.send();

    request.onload = () => {
        if (request.status == 200) {
            lista_categorias = JSON.parse(request.responseText);
            imprimir_categorias();
            request.open("GET", './scripts/get_productos.php');
            request.send();

            request.onload = () => {
                if (request.status == 200) {
                    lista_productos = JSON.parse(request.responseText);
                    
                }
            }

        }
    }

}

function guardar_categoria(){
    let input_categoria = document.querySelector("#input_categoria");
    let nombre = input_categoria.value;

    var url = "./scripts/post_categorias.php";
    var params = "n="+nombre;
    var req = new XMLHttpRequest();
    req.open("POST",url,true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send(params);

    req.onload = () => {
        if (req.status == 200) {
            al_cargar();
            input_categoria.value ="";
            
        }
    }
}

function guardar_producto(){
    let select = document.querySelector("#select_categoria");
    let categoria = select.options[select.selectedIndex].value;
    
    let input_name_producto = document.querySelector("#input_name_producto");
    let nombre = input_name_producto.value;

    let input_precio = document.querySelector("#input_precio");
    let precio = input_precio.value;

    var url = "./scripts/post_productos.php";
    var params = "c="+categoria+"&n="+nombre+"&p="+precio;
    var req = new XMLHttpRequest();
    req.open("POST",url,true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send(params);

    req.onload = () => {
        if (req.status == 200) {
            
            input_name_producto.value ="";
            input_precio.value = "";
            select.options[select.selectedIndex].value = 1;
            al_cargar();
            
            
        }
    }
}

function guardar(){
    if(guardar_item ==="categoria"){
        let nombre = document.querySelector("#input_categoria").value;
        if(nombre==""){
            alert("Debe escribir un nombre");
        }else{
            guardar_categoria();
        }
       

 
    }

    if(guardar_item === "producto"){
        let precio = document.querySelector("#input_precio").value;
        let nombre = document.querySelector("#input_name_producto").value;
        if(nombre="" || precio=="" || isNaN(precio)){
            alert("Datos faltantes o incorrectos");
        }else{
            guardar_producto();
        }
        
    }
}

function imprimir_categorias() {
    let col = document.querySelector("#col_categorias_section");
    let size_lista = Object.keys(lista_categorias).length;

    col.innerHTML = "";
    for(let i = 0;i<size_lista;i++){

        let id = lista_categorias[i]['id_categoria'];
        let nombre = lista_categorias[i]['nombre_categoria'];

        col.innerHTML += '<button class="btn-lg btn-primary d-block mt-2 mx-auto" id="'+id+'" onclick="seleccionar_categoria(this.id);">'+nombre+'</button>'
    }
}

function imprimir_productos(id_categoria){
    let div_lista = document.querySelector("#list_productos_section");
    div_lista.innerHTML ="";
    let size_lista = Object.keys(lista_productos).length;

    for(let i = 0;i<size_lista;i++){

        let id = lista_productos[i]['id_producto'];
        let id_cat = lista_productos[i]['id_categoria'];
        let nombre_cat = get_categoria_name(id_cat);
        let nombre = lista_productos[i]['nombre_producto'];
        let precio = lista_productos[i]['precio_producto'];

        if(id_categoria == id_cat && nombre_cat){
            div_lista.innerHTML += '<button type="button" class="list-group-item list-group-item-action" id='+id+' onclick="seleccionar_producto(this.id);">'+nombre+'</button>';
        }

        
    }

}

function get_categoria_name(id_cat){
    let size_lista = Object.keys(lista_categorias).length;

    
    for(let i = 0;i<size_lista;i++){

        let id = lista_categorias[i]['id_categoria'];
        let nombre = lista_categorias[i]['nombre_categoria'];

        if(id===id_cat){
            return nombre;
        }

       
    }

    return false;

    
}

function get_producto_object(id_prod){
    let size_lista = Object.keys(lista_productos).length;
    let producto = [];

    for(let i = 0;i<size_lista;i++){

        let id = lista_productos[i]['id_producto'];
        let id_cat = lista_productos[i]['id_categoria'];
        let nombre_cat = get_categoria_name(id_cat);
        let nombre = lista_productos[i]['nombre_producto'];
        let precio = lista_productos[i]['precio_producto'];

        if(id == id_prod){
            producto.push(id,id_cat,nombre,precio);
            return producto;
        }

        
    }

    

}

function seleccionar_categoria(id) {

    let h3 = document.querySelector("#h3_productos");
    h3.classList.add("visually-hidden");

    let h3_info = document.querySelector("#h3_information");
    h3_info.classList.add("visually-hidden");


    imprimir_productos(id);

    nueva_categoria();
    let input_categoria = document.querySelector("#input_categoria");
    input_categoria.value=get_categoria_name(parseInt(id))
}

function seleccionar_producto(id) {

    let producto = get_producto_object(id);


    nuevo_producto();

    let input_name = document.querySelector("#input_name_producto");
    input_name.value = producto[2];

    // imprimir la lista de opciones de categoria con la categoria del producto seleccionada
    let size_lista = Object.keys(lista_categorias).length;
    let select_categoria = document.querySelector("#select_categoria");
    select_categoria.innerHTML =""; 
    for(let i = 0;i<size_lista;i++){

        let id = lista_categorias[i]['id_categoria'];
        let nombre = lista_categorias[i]['nombre_categoria'];

        if(producto[1]==id){
            select_categoria.innerHTML += '<option value="'+id+'" selected="selected">'+nombre+'</option>';
        }else{
            select_categoria.innerHTML += '<option value="'+id+'">'+nombre+'</option>';
        }
        
    }

    let input_precio = document.querySelector("#input_precio");
    input_precio.value = producto[3];
}

function nueva_categoria() {

    let h3 = document.querySelector("#h3_information");
    h3.classList.add("visually-hidden");

    let form_producto = document.querySelector("#form_producto");
    form_producto.classList.add("visually-hidden");

    let form_categoria = document.querySelector("#form_categoria");
    form_categoria.classList.remove("visually-hidden");

    let input_categoria = document.querySelector("#input_categoria");
    input_categoria.value = "";

    guardar_item = "categoria";
}

function nuevo_producto() {

    let h3 = document.querySelector("#h3_information");
    h3.classList.add("visually-hidden");

    let form_categoria = document.querySelector("#form_categoria");
    form_categoria.classList.add("visually-hidden");

    let form_producto = document.querySelector("#form_producto");
    form_producto.classList.remove("visually-hidden");

    let input_name = document.querySelector("#input_name_producto");
    input_name.value="";
    
    
    let size_lista = Object.keys(lista_categorias).length;
    let select_categoria = document.querySelector("#select_categoria");
    select_categoria.innerHTML =""; 
    for(let i = 0;i<size_lista;i++){

        let id = lista_categorias[i]['id_categoria'];
        let nombre = lista_categorias[i]['nombre_categoria'];

        select_categoria.innerHTML += '<option value="'+id+'">'+nombre+'</option>';
    }

    let input_precio = document.querySelector("#input_precio");
    input_precio.value = "";

    guardar_item = "producto";

}

function salir() {
    window.location.href = ".";
}

function goto_caja() {
    window.location.href = "./caja_inicio.php";
}
