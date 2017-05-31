
<?php
class Conexion{
    
    var $objconn;
    
    /*Metodo de conexion*/
    
    var $dbUser="root";
    var $dbPass="";
    var $dbHost="localhost";
    var $dbName="exportaciones";
    
    public function Conectar()
    {
        $this->objconn = new mysqli($this->dbHost,  $this->dbUser, $this->dbPass, $this->dbName);
                if ($this->objconn->connect_errno) {
                return "Fallo al conectar a MySQL: (" . $this->objconn->connect_errno . ") " . $this->objconn->connect_error;
        }
        return true;
    }    
    
}
?>