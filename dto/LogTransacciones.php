<?php

class LogTransaccion {
   var $accion;
   var $descripcion;
   var $idacceso;
   var $nomtabla;
   
   public function Agregar(){
       $oConn = new Conexion();
       
       if($oConn->Conectar())
           $db=$oConn->objconn;
       else
           return false;
       
       $sql = "INSERT INTO logtransacciones(IDACCESO, NOMTABLA, ACCION, DESCRIPCION) VALUES ('$this->idacceso','$this->nomtabla',";
       $sql .="'$this->accion','$this->descripcion');";
       $resultado = $db->query($sql);
       if($resultado)
       {
           return true;
       }
       else
       {
           return false;
       }
       
   }
}
