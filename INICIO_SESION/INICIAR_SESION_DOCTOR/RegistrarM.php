<?php  
$conexion=mysqli_connect("localhost","root","","mydb");
mysqli_set_charset ($conexion,"utf8");

if(!empty($_POST)){
	$fecha=$_POST['FechaA'];
	$hora=$_POST['Hora'];
	$consultorio=$_POST['Consultorio'];
	$estado=$_POST['EstadoA'];
	$paciente=$_POST['paciente'];
	$medico=$_POST['medico'];
	$HC=$_POST['HC'];
	$query_busqueda=mysqli_query($conexion,"SELECT Fecha_Agenda,Hora_Agenda FROM agenda where Fecha_Agenda='$fecha' and Hora_Agenda='$hora' and Consultorio='$consultorio' ");
	$resultado=mysqli_num_rows($query_busqueda);
	if($resultado==0){
		$query_registro=mysqli_query ($conexion,"INSERT INTO agenda(Fecha_Agenda,Hora_Agenda,Consultorio,Estado_Agenda,Id_Paciente,Id_Medico,Id_Historia_Clinica)  values('$fecha','$hora','$consultorio','$estado','$paciente','$medico','$HC')");
 if($query_registro=true){
 	echo'<script language="javascript">alert("Se registro con exito");</script>';
 	require("GestionA.php");
 }
 else{
 	echo'<script language="javascript">alert("No se registro con exito");</script>';
 }
		
	}else{
		echo'<script language="javascript">alert("Ya esta ocupado ese turno");</script>';
		require("GestionA.php");
	}
    
}
else{
echo'<script language="javascript">alert("Se esperaban todos los datos");</script>';

}
?>