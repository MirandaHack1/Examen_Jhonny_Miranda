<?php
require_once('../Models/cls_inventario.model.php');
$inventario = new Clase_Inventario;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $inventario->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ID_Producto = $_POST["ID_Producto"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $inventario->uno($ID_Producto); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
        // case 'insertar':
        //     $ID_Provedores = $_POST["ID_Provedores"];
        //     $Nombre_Producto = $_POST["Nombre_Producto"];
        //     $Cantidad = $_POST["Cantidad"];
        //     $Precio_Unitario = $_POST["Precio_Unitario"];

        //     $datos = array(); //defino un arreglo
        //     $datos = $inventario->insertar($ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario); //llamo al modelo de usuarios e invoco al procedimiento insertar
        //     echo json_encode($datos); //devuelvo el arreglo en formato json
        //     break;
        // case 'actualizar':
        //     $ID_Producto = $_POST["ID_Producto"];
        //     $ID_Provedores = $_POST["ID_Provedores"];
        //     $Nombre_Producto = $_POST["Nombre_Producto"];
        //     $Cantidad = $_POST["Cantidad"];
        //     $Precio_Unitario = $_POST["Precio_Unitario"];
        //     $datos = array(); //defino un arreglo
        //     $datos = $inventario->actualizar($ID_Producto, $ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario); //llamo al modelo de usuarios e invoco al procedimiento actual
        //     echo json_encode($datos); //devuelvo el arreglo en formato json
        //     break;
        // Dentro de inventario.controller.php

        // ...

        // case 'insertar':
        //     $ID_Provedores = $_POST["ID_Provedores"];
        //     $Nombre_Producto = $_POST["Nombre_Producto"];
        //     $Cantidad = $_POST["Cantidad"];
        //     $Precio_Unitario = $_POST["Precio_Unitario"];

        //     // Verificar si el Nombre_Producto ya existe
        //     $nombreRepetido = $inventario->nombre_repetido($Nombre_Producto);

        //     if ($nombreRepetido > 0) {
        //         // El Nombre_Producto ya existe, devuelve un mensaje de error
        //         echo json_encode(["status" => "error", "message" => "El Nombre_Producto ya existe en la base de datos"]);
        //     } else {
        //         // El Nombre_Producto no existe, realiza la inserción
        //         $datos = $inventario->insertar($ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario);
        //         echo json_encode($datos);
        //     }
        //     break;

        // case 'actualizar':
        //     $ID_Producto = $_POST["ID_Producto"];
        //     $ID_Provedores = $_POST["ID_Provedores"];
        //     $Nombre_Producto = $_POST["Nombre_Producto"];
        //     $Cantidad = $_POST["Cantidad"];
        //     $Precio_Unitario = $_POST["Precio_Unitario"];

        //     // Verificar si el Nombre_Producto ya existe (excepto para el registro actual)
        //     $nombreRepetido = $inventario->nombre_repetido($Nombre_Producto);

        //     if ($nombreRepetido > 0) {
        //         // El Nombre_Producto ya existe, devuelve un mensaje de error
        //         echo json_encode(["status" => "error", "message" => "El Nombre_Producto ya existe en la base de datos"]);
        //     } else {
        //         // El Nombre_Producto no existe, realiza la actualización
        //         $datos = $inventario->actualizar($ID_Producto, $ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario);
        //         echo json_encode($datos);
        //     }
        //     break;

        //     // ...
        // ...

    case 'insertar':
        $ID_Provedores = $_POST["ID_Provedores"];
        $Nombre_Producto = $_POST["Nombre_Producto"];
        $Cantidad = $_POST["Cantidad"];
        $Precio_Unitario = $_POST["Precio_Unitario"];

        // Verificar si el Nombre_Producto ya existe
        $nombreRepetido = $inventario->nombre_repetido($Nombre_Producto);

        if ($nombreRepetido > 0) {
            // El Nombre_Producto ya existe, muestra un mensaje de error
            echo json_encode(["status" => "error", "message" => "El Nombre_Producto ya existe en la base de datos"]);
        } else {
            // El Nombre_Producto no existe, realiza la inserción
            $datos = $inventario->insertar($ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario);
            echo json_encode(["status" => "success"]);
        }
        break;

    case 'actualizar':
        $ID_Producto = $_POST["ID_Producto"];
        $ID_Provedores = $_POST["ID_Provedores"];
        $Nombre_Producto = $_POST["Nombre_Producto"];
        $Cantidad = $_POST["Cantidad"];
        $Precio_Unitario = $_POST["Precio_Unitario"];

        // Verificar si el Nombre_Producto ya existe (excepto para el registro actual)
        $nombreRepetido = $inventario->nombre_repetido($Nombre_Producto);

        if ($nombreRepetido > 0) {
            // El Nombre_Producto ya existe, muestra un mensaje de error
            echo json_encode(["status" => "error", "message" => "El Nombre_Producto ya existe en la base de datos"]);
        } else {
            // El Nombre_Producto no existe, realiza la actualización
            $datos = $inventario->actualizar($ID_Producto, $ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario);
            echo json_encode(["status" => "success"]);
        }
        break;

        // ...

    case 'eliminar':
        $ID_Producto = $_POST["ID_Producto"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $inventario->eliminar($ID_Producto); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
        // case "Nombre_repetida":
        //     $Nombre_Producto = $_POST["Nombre_Producto"];
        //     $datos = array(); //defino un arreglo
        //     $datos = $inventario->nombre_repetida($Nombre_Producto); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        //     $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        //     echo json_encode($uno); //devuelvo el arreglo en formato json
        //     break;
}
