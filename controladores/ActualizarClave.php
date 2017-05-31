<?php
   include '../Constantes.php';
   include '../Librerias.php';
?>
<?php

    $nomUsuario = $_POST['nomUsuario'];
    $passAntigua = $_POST['passAntigua'];
    $passNueva = $_POST['passNueva'];
    $passConfirma = $_POST['passConfirma'];
    
    $oUsaurio = new Usuario();
    $oUsaurio->nomUsuario = $nomUsuario;
    $oUsaurio->pwdUsuario = $passAntigua;
    
    if($oUsaurio->VerificaUsuarioClave())
    {
        
        $oConn=new Conexion();
        if ($oConn->Conectar())
        $db=$oConn->objconn;
        else
            return false;
        
        if($passNueva==$passConfirma)
        {
            //UPDATE de la clave
            $claveNuevaMD5 = md5($passNueva);
            $sql="UPDATE acceso SET PWDUSUARIO='$claveNuevaMD5' WHERE nomusuario='$nomUsuario';";
            $resultado=$db->query($sql);
            
            //Escribe en la base de datos la transaccion que fue realizada
            $oLT = new LogTransaccion();
            
            //IDENTIFICA EL ID DE ACCESO A UN USUARIO
            $oUsu = $oUsaurio->TraertUsuario();
            //Recopila Datos Del usuario extraido de la base de datos
            $oLT->idacceso = $oUsu->idAcceso;
            $oLT->accion = 'U';
            $oLT->descripcion = 'Se cambia la clave del usuario '.$nomUsuario.' ';
            $oLT->nomtabla = 'acceso';
            
            $oLT->Agregar();
            
            echo 'Contraseña Cambiada exitosamente!<br>';
            echo '<a href="../index.php">Volver al inicio</a>';
        }
        else {
            echo 'Contraseña nueva y confirma son distintas';
        }
    }
    else
    {
        echo 'No existe el usuario o contraseña erronea';
    }
    
?>

