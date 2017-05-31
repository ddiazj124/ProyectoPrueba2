<?php

class Usuario{
    var $idAcceso;
    var $nombre;
    var $nomUsuario;
    var $pwdUsuario;
    
    function __construct($idAcceso=0,$nombre="",$nomUsuario="",$pwdUsuario=""){
            $this->idAcceso=$idAcceso;
            $this->nombre=$nombre;
            $this->nomUsuario=$nomUsuario;
            $this->pwdUsuario=$pwdUsuario;
    }    
    
    function VerificaUsuarioClave(){
        $oConn=new Conexion();
        
        if ($oConn->Conectar())
        $db=$oConn->objconn;
        else
            return false;
        
        $clavemd5=md5($this->pwdUsuario);
        $sql="SELECT * FROM acceso WHERE nomusuario='$this->nomUsuario' and pwdusuario='$clavemd5'";
              
        $resultado=$db->query($sql);
               
        if ($resultado->num_rows>=1)
            return true;
        else
            return false;        
    }
    
    function TraertUsuario()
    {
        $oConn = new Conexion();
        $oConn->Conectar();
        $db = $oConn->objconn; 

        $sql = "select IDACCESO, NOMUSUARIO, PWDUSUARIO, NOMBRE from acceso where nomusuario='$this->nomUsuario';";
        $resultado = $db->query($sql);
        
        while($fila = $resultado->fetch_assoc()){         
          $oUsuario = new Usuario($fila["IDACCESO"],
                                        $fila["NOMBRE"],
                                        $fila["NOMUSUARIO"],
                                        $fila["PWDUSUARIO"]);
         }
         return $oUsuario;
    }
    
}