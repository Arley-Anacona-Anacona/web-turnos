<?php
 require_once("../../conexion/conexion.php");

class Turno extends Conexion{
   function __construct(){
        $this->db= parent::__construct();
   }

   function obtenerTurnos(): array {
            
        
    // Preparación de la consulta SQL
    $consulta= $this->db->prepare("SELECT * FROM turnos WHERE Estado = 0");

    // Ejecución de la consulta
    $consulta->execute();

    // Obtención de los datos en un array
    $turnos = [];
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $turnos[]= $fila;
    }

    // Cierre de la conexión
    $db = null;

    // Retorno del array con los datos
    return $turnos;
}

     function actualizarEstado($id_turno, $Estado){
        try {
            $db = $this->db; // Acceder a la conexión a la base de datos
         
            $sql = "UPDATE turnos SET Estado=:Estado WHERE id_turno=:id_turno";

            $stmt = $db->prepare($sql);

            $stmt->execute([
                ':id_turno' => $id_turno,
                ':Estado' => $Estado
                         
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
     }

   
    
     



}

 


?>