<?php 
header('Content-type: application/json');
require '../PHPMailer/PHPMailerAutoload.php';
//require 'PHPMailer/class.phpmailer.php';
$emaildestino                = utf8_decode($_GET["emaildestino"]);
$nombre  			  		 = utf8_decode($_GET["nombre"]);
$fechaNacimiento  			 = utf8_decode($_GET["fechaNacimiento"]);
$nacionalidad  			     = utf8_decode($_GET["nacionalidad"]);
$estadocivil  			     = utf8_decode($_GET["estadocivil"]);
$direccion  			     = utf8_decode($_GET["direccion"]);
$universidad  			     = utf8_decode($_GET["universidad"]);
$titulo  			         = utf8_decode($_GET["titulo"]);
$universidad2  			     = utf8_decode($_GET["universidad2"]);
$titulo2  			         = utf8_decode($_GET["titulo2"]);
$nivelAcademico  			 = utf8_decode($_GET["nivelAcademico"]);


$cuerpoMensaje ;
$datosPersonales='Datos No Registrados.';
$datosSenescyt='Datos No Registrados.';
$datosPropIntelectual='Datos No Registrados.';

$url="http://servicios.misnutricionistas.com.ec/curriculum/CV_WAVG.pdf";
$mail = new PHPMailer;

$mail->Host = 'smtp.gmail.com';
$mail->Mailer   = 'smtp';
$mail->Port = 465;
$mail->SMTPAuth = true;   
$mail->SMTPDebug = 0;                        
$mail->Username = '*******ec@gmail.com';           
$mail->Password = 'pr*****2016'; 

$mail->SMTPSecure = 'ssl';   

$mail->From = 'curriculumseguroec@gmail.com';
$mail->FromName = 'Curriculum Seguro';
$mail->addAddress($emaildestino, 'Nombre del Usuario'); 
           

//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addStringAttachment(file_get_contents($url), 'CV_WAVG.pdf');        // Add attachments

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML


$array = json_encode($arraydatosperso);
$mail->Subject = 'Curriculum Seguro';
 $cuerpoMensaje = ('<div id=":ng"class="a3s aXjCH m14d8cf4800f79ca3">
                    <h2>CURRICULUM SEGURO</h2>
<p>
<h3><b>DATOS PERSONALES:</b></h3>
<p>
<i><b>C.I:</b></i><font color="blue"><b>73239687</b></font></br>
  <i><b>NOMBRE Y APELLIDO: </b></i><font color="blue"><b>.'$nombre'.</b></font></br>
<b>FECHA DE NACIMIENTO:</b><font color="blue"><b>26/09/1992</b></font></br>
<b>NACIONALIDAD:</b><font color="blue"><b>19 años</b></font></br>

<b>ESTADO CIVIL:</b><font color="blue"><b>CASADO</b></font></br>
<b>DIRECCION:</b><font color="blue"><b>jr:Las Juncias 722 ,Las Flores. S.J.L</b></font></br>


<p>
<h3><i><b><u>TITULOS OBTENIDOS:</u></b></i></h3>
<p>
<i><b>UNIVERSIDAD:</b></i><font color="blue"> <b>C.E."Albert Einstein 1181"(1997-2008)</b></font></br>
<i><b>NOMBRE TITULO:</b></i><font color="blue"><b>Universidad Telesup "Ingenieria de Sistemas"(2012-actualidad)</b></font></br>  
<i><b>NIVEL ACADEMICO:</b></i><font color="blue"> <b>C.E."Albert Einstein 1181"(1997-2008)</b></font></br>
<p>

</div>');
           
$mail->Body    = $cuerpoMensaje;


//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
	$mensaje  = "0";
	
    
} else {
    $mensaje  = "1" ;
	
}

echo json_encode($mensaje);

?>
