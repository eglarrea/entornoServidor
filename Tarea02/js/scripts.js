'use strict'

console.log('Empieza el programa')
var listaSocios = [];
// ------------------- VARIABLES GLOBALES ------------------------

// capturamos el formulario de introduccion de socios - Ejercicio 1

const formulario = document.querySelector('#formNombre')

// capturamos el contenedor donde escribiremos los socios - Ejercicio 2

const contenedorEscribirSocios = document.getElementById(
  'contenedorPintarSocios'
)

const socios = {
  listaSocios : [],

  //Añade un socio a la lista
  anadirSocio:function(socio) {
    //Comprobamos si el dato pasado es del tipo Socio
    if(socio instanceof Socio ){
      this.listaSocios.push(socio);
    } else {
      console.log("Se ha intentado agregar un datos que no es de tipo Socio")
    }
  },
  //Encadena y retorna la lista de socios 
  obtenerSocios:function() {
    let textoAgregar='';
    for(var i=0;i<this.listaSocios.length;i++) {
      textoAgregar+=this.listaSocios[i].toString();
    }
    return textoAgregar;
  },
  
  obtenerUltimoID:function() {
    if(this.listaSocios.length>0) {
      return this.listaSocios.slice(-1)[0].id ; 
    } else {
      return 1;
    }
  }
}

class Socio {
    constructor(id,nombre,apellido) {
        this.id=id;
        this.nombre=nombre;
        this.apellido=apellido;
    }
    toString() {
      return "Socio numero "+this.id +": "+ this.nombre+" "+this.apellido+"<br>";
    }
}


// TODO: array para añadir los socios
cargarSociosJSON()
// ------------------- FUNCIONES ------------------------

// EJERCICIO 1

/*
  funcion para leer del JSON
*/
function cargarSociosJSON () {
  let path = 'model/datosSocios.json'

  let request = new Request(path, {
    headers: new Headers({
      'Content-Type': 'text/json'
    }),
    method: 'GET'
  })

  fetch(request).then(response => {
    response.json().then(data => {
        aniadirSociosInicialesArray(data)
      console.log('Datos', data)
    })
  })
}

/* 
TODO:  metodo para añadir socios al array 
    cuando arranca la pagina web
*/
function aniadirSociosInicialesArray (data) {
    console.log('socios', data);
    for( var i=0;(data.socios!==undefined) && (i< data.socios.length) ;i++){
      console.log(i+" :"+data.socios[i]);
      let socio= new Socio(i,data.socios[i].nombre,data.socios[i].apellido);
      socios.anadirSocio(socio);
    }
    console.log(listaSocios.length);
  //  TODO: cargar el fichero JSON, parsearlo a objetos tipo "socio" y añadirlos al array
}

/*
    TODO: Meotodo para capturar los datos del socio introducidor en el formulario

*/
function capturarDatosSocio () {
  // TODO: recoger los el nombre y apellido del HTML
  let nombre=document.getElementById("fnombre").value;
  let apellido=document.getElementById("fapellido").value;
  if(nombre.trim()=='' || apellido.trim()==''){
    alert("Los datos nombre y apellido son obligatorios");
  }else{
    crearSocio(nombre,apellido);
  }
  // TODO: crear el socio y añadirlo al array
}

/* 
TODO: 
    Metodo para crear un socio pasandole el nombre y el apellido
    y añadirlo al array
 */
function crearSocio (nombre, apellido) {
  // TODO: crear objeto socio
   let socio= new Socio(crearID (),nombre,apellido);
  // TODO: añadir el objeto al array
  socios.anadirSocio(socio);
}

/*
TODO: 
    Metodo para crear el ID del socio en funcion del ultimo
    ID que hay en el array de socios
*/
function crearID () { 
    return socios.obtenerUltimoID()+1;
}

// EJERCICIO 2

/*
  TODO: metodo que elimina la lista previamente pintada en el contenedor asignado 
  para pintar socios, recorre el array con un bucle y pinta los socios 
*/
function pintarListaSocios () {
  //TODO: borramos todo lo que hay en el div
 contenedorEscribirSocios.innerHTML='';
   //TODO: bucle para recorrer y pintar el array de socios
   //TODO: debemos añadir los socios a la pagina web
  contenedorEscribirSocios.innerHTML=socios.obtenerSocios();
}

// ------------------- MAIN ------------------------

// TODO: añadimos los socios iniciales cuando empieza el programa

console.log('Acaba el programa')
