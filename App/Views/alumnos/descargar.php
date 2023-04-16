<?php 
ob_start();
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=listado_alumnos-" . date("Y-m-d") . ".xls");
header("Pragma: no-cache");
header("Expires: 0"); 
echo "
    <html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">
    <html>
        <head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head>
        <body>";
    ?>
<table cellspacing="0" cellpadding="0">
    <tr>
        <td>ID</td>
        <td>MATRÍCULA</td>
        <td>NOMBRE</td>
        <td>APELLIDOS</td>
        <td>EMAIL</td>
        <td>TELÉFONO</td>
        <td>TELÉFONO FIJO</td>
        <td>CURP</td>
        <td>DIRECCIÓN</td>
        <td>CÓDIGO POSTAL</td>
        <td>CIUDAD</td>
        <td>PAÍS</td>
        <td>FECHA DE NACIMIENTO</td>
        <td>FECHA DE CREACIÓN</td>
    </tr>
    <?php 
        foreach ($this->alumnos as $row) {
            $alumnos = new Alumnos();
            $alumnos = $row;
    ?>
    <tr>
        <td><?php echo $alumnos->idAlu; ?></td>
        <td><?php echo $alumnos->MatriculaAlu; ?></td>
        <td><?php echo $alumnos->NombreAlu; ?></td>
        <td><?php echo $alumnos->ApellidosAlu; ?></td>
        <td><?php echo $alumnos->EmailAlu; ?></td>
        <td><?php echo $alumnos->TelAlu; ?></td>
        <td><?php echo $alumnos->TelFijoAlu; ?></td>
        <td><?php echo $alumnos->CURPAlu; ?></td>
        <td><?php echo $alumnos->DireccionAlu; ?></td>
        <td><?php echo $alumnos->CPAlu; ?></td>
        <td><?php echo $alumnos->CiudadAlu; ?></td>
        <td><?php echo $alumnos->PaisAlu; ?></td>
        <td><?php echo $alumnos->FechaNacAlu; ?></td>
        <td><?php echo $alumnos->FechaCreadoAlu; ?></td>
    </tr>
    <?php 
        }
        echo "</body></html>";
    ?>
    
</table>