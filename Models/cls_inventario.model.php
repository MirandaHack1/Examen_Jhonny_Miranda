<?php
require_once('cls_conexion.model.php');
class Clase_Inventario
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT inventario.ID_Producto, inventario.ID_Provedores, inventario.Nombre_Producto, inventario.Cantidad, inventario.Precio_Unitario ,proveedores.Nombre as proveedores FROM `inventario` inner JOIN proveedores on proveedores.ID_Provedores  = inventario.ID_Provedores";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ID_Producto)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `inventario` WHERE ID_Producto =$ID_Producto ";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `inventario`(`ID_Provedores`, `Nombre_Producto`, `Cantidad`, `Precio_Unitario`)VALUES ($ID_Provedores,'$Nombre_Producto', '$Cantidad','$Precio_Unitario')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($ID_Producto, $ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `inventario` SET  `ID_Provedores` ='$ID_Provedores', `Nombre_Producto`='$Nombre_Producto', `Cantidad`='$Cantidad', `Precio_Unitario`='$Precio_Unitario'  WHERE `ID_Producto`='$ID_Producto'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ID_Producto)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE  FROM `inventario` WHERE `ID_Producto`='$ID_Producto'";
            // from inventario where ID_Producto =$ID_Producto ;
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    // public function nombre_repetida($Nombre_Producto)
    // {
    //     try {
    //         $con = new Clase_Conectar_Base_Datos();
    //         $con = $con->ProcedimientoConectar();
    //         $cadena = "SELECT count(*) as nombre_repetida FROM `inventario` WHERE `Nombre_Producto`= '$Nombre_Producto'";
    //         $result = mysqli_query($con, $cadena);
    //         return $result;
    //     } catch (Throwable $th) {
    //         return $th->getMessage();
    //     } finally {
    //         $con->close();
    //     }
    // }


    // Dentro de cls_inventario.model.php
    public function nombre_repetido($Nombre_Producto)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();

            // Utiliza una consulta preparada para evitar la inyección SQL
            $stmt = $con->prepare("SELECT COUNT(*) as nombre_repetido FROM `inventario` WHERE `Nombre_Producto` = ?");
            $stmt->bind_param("s", $Nombre_Producto);
            $stmt->execute();
            $result = $stmt->get_result();

            // Devuelve el resultado como un arreglo asociativo
            $row = $result->fetch_assoc();

            return $row['nombre_repetido'];
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
