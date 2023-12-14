function init() {
  $("#form_proveedores").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
    //detecta carga de la pagina
    todos_controlador();
  });

var todos_controlador = () => {
var todos = new proveedores_model("","", "", "", "","todos");
todos.todos();
}


var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($("#form_proveedores")[0]);
 
  var ID_Provedores = document.getElementById("ID_Provedores").value
 
  if(ID_Provedores > 0){
    var proveedores = new proveedores_model('','','','',formData,'editar');
    proveedores.editar();
  }else{
    var proveedores = new proveedores_model('','','','',formData,'insertar');
  proveedores.insertar();
  }
};
var editar = (ID_Provedores) => {
  var uno = new proveedores_model(ID_Provedores, "", "", "", "","uno");
  uno.uno();
};

var eliminar=(ID_Provedores)=>{
  var eliminar = new proveedores_model(ID_Provedores, "", "", "", "","eliminar");
  eliminar.eliminar();
}

;init();
