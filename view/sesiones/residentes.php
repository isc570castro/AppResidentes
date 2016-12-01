   <?php
          $noSesion=$_REQUEST['noSesion'];
          $idProyecto=$_REQUEST['idProyecto'];
          include "../../model/conexion.php";
          $objConex = new Conexion();
          $link=$objConex->conectarse();
          $sql = mysql_query("SELECT * FROM residente, proyecto, asignaciones WHERE proyecto.idProyecto='$idProyecto' and proyecto.idProyecto=asignaciones.idProyecto and residente.noControl=asignaciones.noControl;" , $link) or die(mysql_error());
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
  <script src="../../src/materialize/js/jquery.js"></script>
  <script src="../../src/materialize/js/materialize.min.js"></script>
  <title>Concluir proyecto | SGR</title>
</head>
<body class="grey lighten-2">
  <div class="container">
    <div class="row">
      <br/>
      <div class="col m2 push-m1">
        <img src="../../src/img/mapache.png" alt="" class="responsive-img">
      </div>
      <div class="col m10">
        <br>
        <h4 class="center">Tecnológico Nacional de México</h4>
        <h5 class="center">Instituto Tecnológico de Zacatecas</h5>
      </div>
    </div>
  </div>
    <nav class="z-depth-2 teal" role="navigation">
      <div class="nav-wrapper container">
          <a href="../inicio.html" class="brand-logo">Menu Principal</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="../residentes/residentes.php"><i class="material-icons left">people</i>Residentes</a></li>
            <li><a href="../proyectos/proyectos.php"><i class="material-icons left">business_center</i>Proyectos</a></li>
            <li><a href="../relaciones/relaciones.php"><i class="material-icons left">repeat</i>Asignaciones</a></li>
            <li class="active"><a href="sesiones.php"><i class="material-icons left">date_range</i>Sesiones</a></li>
            <li><a href="#"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
          </ul>
      </div>
    </nav>
    <div class="container">
    <div class="row">
      <div class="col m12">
          <div class="card-panel white z-depth-3">
              <H3 align="center">Reporte de sesion <?php echo $noSesion?> </H3>
          <div class="row">
            <div class="col m12">
                </div>
            <div class="col m12">
              <table class="centered striped bordered z-depth-3">
                    <thead>
                        <tr>
                            <th>Nombre del alumno</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
          <?php 
          while($rows = mysql_fetch_array($sql)){   
          ?>
                <tr>
                  <td><?php echo $rows['nombreResidente']?></td>
                  <td><a target="_bank" href="reportes/reporteSesion.php?noControl=<?php echo $rows['noControl'];?>&noSesion=<?php echo $noSesion;?>&idProyecto=<?php echo $idProyecto;?>" class="btn tooltipped green accent-3" data-position="bottom" data-delay="50" data-tooltip="Reporte"><i class="material-icons">assignment</i></a></td>
                </tr>
          <?php } ?>
                    </tbody>
                  </table>
            </div>
          </div>
          </div>
      </div>
    </div>
    </div>
</body>
</script>
</html>