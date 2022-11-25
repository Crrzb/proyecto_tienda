
document.addEventListener('load', al_cargar());
let lista_productos, lista_categorias,cantidad_producto,productos_orden=[],prod_seleccionado;

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

function imprimir_categorias() {
    let col = document.querySelector("#lista_categorias");
    let size_lista = Object.keys(lista_categorias).length;

    col.innerHTML = "";
    for(let i = 0;i<size_lista;i++){

        let id = lista_categorias[i]['id_categoria'];
        let nombre = lista_categorias[i]['nombre_categoria'];

        col.innerHTML += '<li class="list-group-item bg-dark border-0"><button class="btn-lg btn-success rounded" id="'+id+'" onclick="imprimir_productos(this.id);">'+nombre+'</button></li>';
    }
}

function imprimir_productos(id_categoria){
    let div_lista = document.querySelector("#row_productos");
    div_lista.innerHTML ="";
    let size_lista = Object.keys(lista_productos).length;

    for(let i = 0;i<size_lista;i++){

        let id = lista_productos[i]['id_producto'];
        let id_cat = lista_productos[i]['id_categoria'];
        let nombre_cat = get_categoria_name(id_cat);
        let nombre = lista_productos[i]['nombre_producto'];
        let precio = lista_productos[i]['precio_producto'];

        if(id_categoria == id_cat && nombre_cat){
            div_lista.innerHTML += '<div class="col-6 my-2 "><button class="btn-lg btn-primary rounded" id="'+id+'" onclick="agregar_producto_orden(this.id);">'+nombre+'</button></div>';
        }

        
    }

}

function agregar_producto_orden(id_prod){
    
    let producto = get_producto_object(id_prod);
     cantidad_producto = 1;
    // producto.push(id,id_cat,nombre,precio);
    let orden_prod = [cantidad_producto,producto];
    productos_orden.push(orden_prod);

    actualizar_orden();
    actualizar_total();

}

function actualizar_orden(){
    let lista_orden = document.querySelector("#body_table");
    lista_orden.innerHTML = ""
    productos_orden.forEach(orden => {
        lista_orden.innerHTML += '<tr id="'+orden[1][0]+'" onclick="producto_seleccionado(this.id)"><th scope="row">'+orden[0]+'</th><td>'+orden[1][2]+'</td><td>'+orden[1][3]+'</td></tr>';
    });

    let btn_cancelar = document.querySelector("#btn_cancelar");

    if(productos_orden.length>0){
        btn_cancelar.classList.remove("disabled");
    }else{
        btn_cancelar.classList.add("disabled");


    }
    
}

function producto_seleccionado(id_prod){
    prod_seleccionado = id_prod;

    let btn_add = document.querySelector("#btn_add");
    let btn_sub = document.querySelector("#btn_sub");
    let btn_borrar = document.querySelector("#btn_borrar");

    btn_add.classList.remove("disabled");
    btn_sub.classList.remove("disabled");
    btn_borrar.classList.remove("disabled");

}

function borrar_producto(){
    for(let i=0;i<productos_orden.length;i++){
        if(productos_orden[i][1][0]==prod_seleccionado){
            productos_orden.splice(i,1);
            break
        }
    }

    actualizar_orden();
    actualizar_total();
    
   


    
}

function actualizar_total(){
let suma=0;
    for(let i=0;i<productos_orden.length;i++){
        suma = suma + (parseInt(productos_orden[i][1][3])*productos_orden[i][0]);
    }

    let p_total = document.querySelector("#p_total");
    p_total.innerHTML = "Total: "+suma;

    let btn_pagar = document.querySelector("#pagar_btn");
    let btn_add = document.querySelector("#btn_add");
    let btn_sub = document.querySelector("#btn_sub");
    let btn_bor = document.querySelector("#btn_borrar");
    if(suma > 1){
        
        btn_pagar.classList.remove("disabled");

        btn_add.classList.remove("disabled");
        btn_sub.classList.remove("disabled");
        btn_bor.classList.remove("disabled");
    }else{
        btn_pagar.classList.add("disabled");

        btn_add.classList.add("disabled");
        btn_sub.classList.add("disabled");
        btn_bor.classList.add("disabled");
    }

    
}

function cancelar_cuenta(){
    total_precios = [];
    cantidad_producto = 0;
    actualizar_total(0);
    let lista_orden = document.querySelector("#body_table");
    lista_orden.innerHTML  ="";
    productos_orden =[];
    actualizar_total();
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

function pagar(){
    let total = document.querySelector("#p_total").textContent;
    total = total.split(" ")[1]
    window.location.href = "./pagar.php?total="+total;
}

function salir(){
    window.location.href = ".";
}

function goto_inventario(){
    window.location.href = "./inventario.php";
}

function add_prod(){
    for(let i=0;i<productos_orden.length;i++){
        if(productos_orden[i][1][0]==prod_seleccionado){
            productos_orden[i][0] += 1 ;
            break
        }
    }


    actualizar_orden();
    actualizar_total();
    
}

function sub_prod(){

    for(let i=0;i<productos_orden.length;i++){
        if(productos_orden[i][1][0]==prod_seleccionado){
            if(productos_orden[i][0]>1){
                productos_orden[i][0] -= 1 
            }
            
            break
        }
    }

    actualizar_orden();
    actualizar_total();

}