<?php
class Producto extends conectar{
    public function get_producto(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM producto";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_producto_x_id($codigo_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM producto where codigo_producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigo_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_producto($nombre ,$precio, $cantidad, $fecha_vencimiento, $codigo_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "UPDATE producto SET 
        nombre = ?,
        precio = ?,
        cantidad = ?,
        fecha_vencimiento = ?
        WHERE codigo_producto = ?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $precio);
        $sql->bindValue(3, $cantidad);
        $sql->bindValue(4, $fecha_vencimiento);
        $sql->bindValue(5, $codigo_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_producto($codigo_producto, $nombre, $precio, $cantidad, $fecha_vencimiento){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO producto (codigo_producto, nombre, precio, cantidad, fecha_vencimiento)
        VALUES (?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigo_producto);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $precio);
        $sql->bindValue(4, $cantidad);
        $sql->bindValue(5, $fecha_vencimiento);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function delete_prod($codigo_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "DELETE from producto where
        codigo_producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigo_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    }

?>