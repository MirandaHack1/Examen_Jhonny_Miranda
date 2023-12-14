class proveedores_model {
  constructor(
    ID_Provedores,
    Nombre,
    Producto_Sumistrado,
    Fecha_Inicio_Contrato,
    Cedula,
    Ruta
  ) {
    this.ID_Provedores = ID_Provedores;
    this.Nombre = Nombre;
    this.Producto_Sumistrado = Producto_Sumistrado;
    this.Fecha_Inicio_Contrato = Fecha_Inicio_Contrato;
    this.Cedula = Cedula;
    this.Ruta = Ruta;
  }
  todos() {
    var html = "";
    $.get("../../Controllers/proveedores.controller.php?op=" + this.Ruta, (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {


        html += `<tr>
                            <td>${index + 1}</td>
                            <td>${valor.Nombre}</td>
                            <td>${valor.Producto_Sumistrado}</td>
                            <td>${valor.Fecha_Inicio_Contrato}</td>
                            <td>${valor.Cedula}</td>
                            </span>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${valor.ID_Provedores
          })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.ID_Provedores
          })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${valor.ID_Provedores
          })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_proveedores").html(html);
    });
    return html;

  }
  insertar() {
    var dato = new FormData();
    dato = this.Cedula;
    $.ajax({
      url: "../../Controllers/proveedores.controller.php?op=insertar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("proveedores", "proveedores Registrado", "success");
          todos_controlador();
      
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }

  cedula_repetida() {
    var Cedula = this.Cedula;
    $.post(
      "../../Controllers/proveedores.controller.php?op=cedula_repetida",
      { Cedula: Cedula },
      (res) => {
        res = JSON.parse(res);
        if (parseInt(res.cedula_repetida) > 0) {
          $("#CedulaRepetida").removeClass("d-none");
          $("#CedulaRepetida").html(
            "La cédua ingresa, ya exite en la base de datos"
          );
          $("button").prop("disabled", true);
        } else {
          $("#CedulaRepetida").addClass("d-none");
          $("button").prop("disabled", false);
        }
      }
    );
  }


  uno() {
    var ID_Provedores = this.ID_Provedores;
    $.post(
      "../../Controllers/proveedores.controller.php?op=uno",
      { ID_Provedores: ID_Provedores },
      (res) => {
        console.log(res);
        res = JSON.parse(res);
        $("#ID_Provedores").val(res.ID_Provedores);
        $("#Nombre").val(res.Nombre);
        $("#Producto_Sumistrado").val(res.Producto_Sumistrado);
        $("#Fecha_Inicio_Contrato").val(res.Fecha_Inicio_Contrato);
        // document.getElementById("Cedula").value = res.Cedula; //asiganr al select el valor
        $("#Cedula").val(res.Cedula);

      }
    );
    $("#Modal_proveedores").modal("show");
  }

  editar() {
    var dato = new FormData();
    dato = this.Cedula;
    $.ajax({
      url: "../../Controllers/proveedores.controller.php?op=actualizar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("proveedores", "proveedores Registrado", "success");
          todos_controlador();
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }

  eliminar() {
    var ID_Provedores = this.ID_Provedores;

    Swal.fire({
      title: "proveedores",
      text: "Esta seguro de eliminar el proveedores",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/proveedores.controller.php?op=eliminar",
          { ID_Provedores: ID_Provedores },
          (res) => {
            console.log(res);

            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("proveedoress", "proveedores Eliminado", "success");
              todos_controlador();
            } else {
              Swal.fire("Error", res, "error");
            }
          }
        );
      }
    });

    limpia_Cajas();
  }

  limpia_Cajas() {
    document.getElementById("Nombre").value = "";
    document.getElementById("Producto_Sumistrado").value = "";
    document.getElementById("Fecha_Inicio_Contrato").value = "";
    document.getElementById("Cedula").value = "";
    $("#ID_Provedores").val("");

    $("#Modal_proveedores").modal("hide");
  }
}