<?php 
ob_start();
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=listado_cursos-" . date("Y-m-d") . ".xls");
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
        <td>NOMBRE</td>
        <td>COSTO</td>
        <td>DURACIÓN</td>
        <td>CATEGORÍA</td>
        <td>TIPO</td>
        <td>SOFTWARE</td>
    </tr>
    <?php 
        foreach ($this->cursos as $row) {
            $cursos = new Curso();
            $cursos = $row;
    ?>
    <tr>
        <td><?php echo $cursos->idC; ?></td>
        <td><?php echo $cursos->nombreC; ?></td>
        <td><?php echo $cursos->costoC; ?></td>
        <td><?php echo $cursos->duracionC; ?></td>
        <td><?php echo $cursos->categoriaC; ?></td>
        <td><?php echo $cursos->tipoC; ?></td>
        <td><?php echo $cursos->softwareC; ?></td>
    </tr>
    <?php 
        }
        echo "</body></html>";
    ?>
    
</table>