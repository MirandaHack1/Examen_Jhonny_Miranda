<?php
require_once('../Models/cls_proveedores.model.php');
$proveedores = new Clase_proveedores;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $proveedores->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ID_Provedores  = $_POST["ID_Provedores"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $proveedores->uno($ID_Provedores); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Producto_Sumistrado = $_POST["Producto_Sumistrado"];
        $Fecha_Inicio_Contrato = $_POST["Fecha_Inicio_Contrato"];
        $Cedula  = $_POST["Cedula"];
        $datos = array(); //defino un arreglo
        $datos = $proveedores->insertar($Nombre, $Producto_Sumistrado, $Fecha_Inicio_Contrato, $Cedula); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_Provedores = $_POST["ID_Provedores"];
        $Nombre = $_POST["Nombre"];
        $Producto_Sumistrado = $_POST["Producto_Sumistrado"];
        $Fecha_Inicio_Contrato = $_POST["Fecha_Inicio_Contrato"];
        $Cedula  = $_POST["Cedula"];
        $datos = array(); //defino un arreglo
        $datos = $proveedores->actualizar($ID_Provedores, $Nombre, $Producto_Sumistrado, $Fecha_Inicio_Contrato, $Cedula); //llamo al modelo de usuarios e invoco al procedimiento actualizar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_Provedores = $_POST["ID_Provedores"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $proveedores->eliminar($ID_Provedores); //llamo al modelo de usuarios e invoco al procedimiento eliminar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case "cedula_repetida":
        $Cedula = $_POST["Cedula"];
        $datos = array(); //defino un arreglo
        $datos = $proveedores->cedula_repetida($Cedula); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
}
