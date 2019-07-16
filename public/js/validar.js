window.addEventListener("load", function() {
  document.querySelector("form").addEventListener("submit", function(event) {
    var name, last_name, birthday, country, email, password, saleSi, saleNo;
    name = document.getElementById('nombre');
    last_name = document.getElementById('apellido');
    birthday = document.getElementById('edad');
    country = document.getElementById('pais');
    email = document.getElementById('email');
    password = document.getElementById('password');
    saleSi = document.getElementById('saleSi');
    saleNo = document.getElementById('saleNo');

  function edad(fecha){
    // Separamos la fecha de nacimiento
       var values=fecha.split("-");
       var dia = values[2];
       var mes = values[1];
       var año = values[0];

       // Tomamos fecha actual
       var fecha_hoy = new Date();
       var añoActual = fecha_hoy.getYear();
       var mesActual = fecha_hoy.getMonth()+1;
       var diaActual = fecha_hoy.getDate();
       if ((añoActual - año) < 18){
         return false;
       }
       if ((añoActual - año) == 18) {
         if (mesActual < mes) {
         return  false;
         }
         if (mesActual == mes){
           if(diaActual < dia){
             return  false;
           }
         }
       }
       return true;
  }
  function contraseña(contraseña){
    var contraseñaPermitida = /[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/igm
    if (contraseñaPermitida.text(contraseña) === false){
      return false;
    }
    return true;
  }
  function nombreYApellido(dato){
    var permitidos = /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/
        if (permitidos.test(dato) === false){
           return false;
        }
       return true;
    }
    // VALIDACION PARA NOMBRE
    if (name.value == "") {
      alert("El Nombre es obligatorio");
      event.preventDefault();
    } else if (!nombreYApellido(name.value)) {
      alert("El Nombre debe empezar con mayuscula");
      event.preventDefault();
    }
    // VALIDACION PARA APELLIDO
    if (last_name.value == "") {
      alert("El campo Apellido es obligatorio");
      event.preventDefault();
    } else if (!nombreYApellido(last_name.value)) {
      alert("El Apellido debe empezar con mayuscula");
      event.preventDefault();
    }
    //VALIDACION PARA EDAD
    if (birthday.value == "") {
      alert("La edad es obligatoria");
      event.preventDefault();
    }else if (!edad(birthday.value)){
      alert("Tiene que ser mayor de 18 años");
      event.preventDefault();
    }

  });
});
