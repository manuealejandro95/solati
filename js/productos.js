$("#modal").click(function (e) {
  e.preventDefault();
  document.getElementById("formuproducto").reset();
  $("#delete").hide();
  $("#codproduc").hide();
  $("#exampleModalScrollableTitle").text("Nuevo Producto");
});

$("#eliminar").click(function (e) {
    e.preventDefault();
    Delete($("#id").val());
});

$(document).ready(function () {
  obtenerproductos();
});

function obtenerproductos() {
  $.get("view/task/datosproducts.php")
  .done(function(data){
    let template = "";
      if (data === "[]") {
        template += `
                    <div class="col-12 col-md-12 col-xl-12">
                        <p class="text-uppercase">No hay Productos registrados.</p>
                    </div>
                `;
      } else {
        let datos = JSON.parse(data);
        template += `
                                      
                    <table class="table table-sm table-striped-custom text-center">
                        <thead class="bg-custom text-primary">
                            <tr class="h4 font-weight-bold">
                                <th scope="col">Id Usuario</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Contraseña</th>
                                <th ></th>
                                <th ></th>
                            </tr>
                        </thead>
                        <tbody>`;
        datos.forEach((dato) => {
          template += `                                
                                    <tr class="h0">
                                        <td class="align-middle center">${dato.Id}</td>
                                        <td class="align-middle center">${dato.Correo}</td>
                                        <td class="align-middle center">${dato.Nombre}</td>
                                        <td class="align-middle center">${dato.Password}</td>
                                        <td class="align-middle center"><a class="btn btn-danger text-white" onclick="findeditar(${dato.Id});" role="button">Eliminar</a></td>
                                        <td class="align-middle center"><a class="btn btn-info text-white" onclick="findeditar(${dato.Id});" role="button">Editar</a></td>  
                                    </tr>                        
                            `;
        });
        template += ` 
                        </tbody>                                                
                    </table>
                `;
      }
      $("#registros").html(template);
  });
}

$("#enviar").click(function (e) {
  e.preventDefault();
  validaciones();
});
function validaciones() {
  switch (true) {
    case $("#correo").val().length === 0:
      Swal.fire({
        title: "<strong>Error</strong>",
        icon: "error",
        html: '<p class="text-danger font-weight-bold">No hay un correo suministrado.</p>',
        showConfirmButton: false,
        timer: 5500,
        returnFocus: false,
      });
      $("#correo").focus();
      break;
    case $("#name").val().length === 0:
      Swal.fire({
        title: "<strong>Error</strong>",
        icon: "error",
        html: '<p class="text-danger font-weight-bold">Debe colocar nombres y apellidos.</p>',
        showConfirmButton: false,
        timer: 5500,
        returnFocus: false,
      });
      $("#name").focus();
      break;
    case $("#password").val().length === 0:
      Swal.fire({
        title: "<strong>Error</strong>",
        icon: "error",
        html: '<p class="text-danger font-weight-bold">Debe colocar una contraseña.</p>',
        showConfirmButton: false,
        timer: 5500,
        returnFocus: false,
      });
      $("#password").focus();
      break;
    default:
      let datos = {};
      
      if ($("#accion").val() == "Editar") {
        datos = {
          id: $("#id").val(),
          correo: $("#correo").val(),
          nombres: $("#name").val(),
          contrasena: $("#password").val()
        }
        update(JSON.stringify(datos));
      } else {
        datos = {
          correo: $("#correo").val(),
          nombres: $("#name").val(),
          contrasena: $("#password").val()
        };        
        enviarformulario(JSON.stringify(datos));
      }
  }
}

function enviarformulario(datos) {
  $.post("view/task/registrerproducto.php",datos)
  .done(function(respuesta){    
    let response = JSON.parse(respuesta);
    switch (response["Id"]) {      
      case "1":
        Swal.fire({
          title: "<strong>Registro Exitoso</strong>",
          icon: "success",
          html: '<p class="text-success font-weight-bold">Registro Exitoso.</p>',
          showConfirmButton: false,
          timer: 5000,
          returnFocus: false,
        });
        document.getElementById("formuproducto").reset();
        $("#exampleModalScrollable").modal("hide");
        obtenerproductos();
        window.setTimeout(function () {
          window.location.href = "/solati/";
        }, 6000);
        break;
      default:
        Swal.fire({
          title: "<strong>Error</strong>",
          icon: "error",
          html: '<p class="text-danger font-weight-bold">No se pudo realizar el registro.</p>',
          showConfirmButton: false,
          timer: 7000,
          returnFocus: false,
        });
        document.getElementById("formuproducto").reset();
    }
  });
}

function findeditar(dato) {
  $("#accion").val("Editar");
  $("#exampleModalScrollableTitle").text("Formulario de editar");
  $("#codproduc").hide();
  $("#id").prop('readonly',true);
  $("#delete").show();  
  $("#exampleModalScrollable").modal("show");
  let datos = {};
  datos = {
    codproduct: dato
  }
  $.post("view/task/validaproduct.php",JSON.stringify(datos))
  .done(function(respuesta){
    let datos = JSON.parse(respuesta);
      if (respuesta === "[]") {
      } else {
        datos.forEach((dato) => {
            $("#id").val(dato.Id);
            $("#name").val(dato.Nombre);
            $("#correo").val(dato.Correo);
            $("#password").val(dato.Password);
        });
      }
  });
}

function update(datos) {
  $.post("view/task/updateproduct.php",datos)
  .done(function(respuesta){
    let response = JSON.parse(respuesta);
    switch (response["Id"]) {
      case "1":
        Swal.fire({
          title: "<strong>Registro Exitoso</strong>",
          icon: "success",
          html: '<p class="text-success font-weight-bold">Actualizacion Exitosa.</p>',
          showConfirmButton: false,
          timer: 5000,
          returnFocus: false,
        });
        document.getElementById("formuproducto").reset();
        $("#exampleModalScrollable").modal("hide");
        obtenerproductos();
        window.setTimeout(function () {
          window.location.href = "/solati/";
        }, 6000);
        break;
      default:
        Swal.fire({
          title: "<strong>Error</strong>",
          icon: "error",
          html: '<p class="text-danger font-weight-bold">No se pudo actualizar el registro.</p>',
          showConfirmButton: false,
          timer: 7000,
          returnFocus: false,
        });
        $("#exampleModalScrollable").modal("hide");
        document.getElementById("formuproducto").reset();
    }
  });
}

function Delete(dato) {
    Swal.fire({
        title: "Esta seguro?",
        text: "Desea eliminar este producto! ",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
      }).then((result) => {
        if (result.isConfirmed) {
          let datos = {};
          datos = {
            codproduct: dato
          }
          $.post("view/task/deleteproduct.php",JSON.stringify(datos))
          .done(function(respuesta){
            console.log(respuesta);            
            switch (respuesta) {
              case "1":
                Swal.fire({
                  title: "<strong>Registro Exitoso</strong>",
                  icon: "success",
                  html: '<p class="text-success font-weight-bold">El registro ha sido eliminado.</p>',
                  showConfirmButton: false,
                  timer: 5000,
                  returnFocus: false,
                });
                obtenerproductos();
                document.getElementById("formuproducto").reset();
                $("#exampleModalScrollable").modal("hide");
                window.setTimeout(function () {
                  window.location.href = "/solati";
                }, 6000);
                break;
              default:
                Swal.fire({
                  title: "<strong>Error</strong>",
                  icon: "error",
                  html: '<p class="text-danger font-weight-bold">No se pudo eliminar el registro.</p>',
                  showConfirmButton: false,
                  timer: 7000,
                  returnFocus: false,
                });
                document.getElementById("formuproducto").reset();
            }
          });
        }
      });
}