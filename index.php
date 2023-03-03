<!DOCTYPE html>
<html>
<head>
	<title>SERVIDOR DE CORREO</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
    body{
        background-color: crimson;
        font-family: sans-serif; 
    }
    
    h1{
 
    display: flex;
    justify-content: center;
   
        
    }
    .conte{
        height: 450px;    
        margin-left: 500px;
        margin-right: 500px;
        background-color: aqua;
        display:flex;
        align-items: center;
        justify-content: center ;
        flex-direction: column; 
        border-radius: 10px;
        
    }
    .cont{
        
        height: 80px;        
        display:flex;
        justify-content: center ;
        flex-direction: column;
    }
    
</style>

<body >
<?php
    if(isset($_POST['enviar'])){
        $cuerpo = '
        <!DOCTYPE html>
        <html>
        <head>
         <title></title>
        </head>
        <body>
        '.$_POST['cuerpo'].'
        </body>
        </html>';

        //para el envío en formato HTML
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        //dirección del remitente
        $headers .= "From: ".$_POST['nombre']." <".$_POST['emisor'].">\r\n";

        //Una Dirección de respuesta, si queremos que sea distinta que la del remitente
        $headers .= "Reply-To: ".$_POST['emisor']."\r\n";

        //Direcciones que recibián copia
        //$headers .= "Cc: ejemplo2@gmail.com\r\n";

        //direcciones que recibirán copia oculta
        //$headers .= "Bcc: ejemplo3@yahoo.com\r\n";
        if(mail($_POST['receptor'],$_POST['asunto'],$cuerpo,$headers)){
    		echo "<script>alert('Mensaje Enviado, verifique su bandeja de correo.');</script>";
    	}else{
    		echo "<script>alert('Mensaje NO Enviado, por favor verifique su configuracion de correo SMTP saliente.');</script>";
    	}
    }
?>
	<form method="post">
    	<div class="contenedor">
        	
        <div class="conte ">
            <h1 >PAGINA DE CORREO</h1>
            
            <div class="cont">
            <label>De</label>
            <input type="text" size="30" name="nombre" value="" required  placeholder="Tu nombre"><br>
            <input type="email" size="40" name="emisor" required  placeholder="Tu correo" value="">
            </div>

            <div class="cont">
            <label>Para</label>
            <input type="text" size="40" name="receptor" required  placeholder="El correo" value="">
            </div>
            
            <div class="cont">
            <label>Asunto</label>
            <input type="text" size="40" name="asunto" value="" required placeholder="Asunto">
            </div>

            <div class="cont">
            <label>Mensaje</label>
            <textarea name="cuerpo" placeholder="Contenido del mensaje" cols="40" rows="4"></textarea>
            </div>

            <div class="cont">
            <input type="submit" name="enviar" value="Enviar" size="10%" class="btn btn-secondary">
            </div>
         </div>
            
        </div>

    </form>
</body>
</html>
