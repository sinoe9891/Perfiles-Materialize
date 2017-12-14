 <?php
// Aqui validamos si la variable $_GET["busca"] existe como validacion
  // Si es que esta cargando la pagina o haciendo una bsuqueda.
if(empty($_GET))
{
  ?>
  <div align="center">
  <?php
  echo '<h3><p><strong>ENTER TO SEARCH</strong></p></h3>';;
    // si es una Busqueda entrara en este siguente IF lo cual iniciara el proceso
}elseif(!empty($_GET)){
    // Sustituimos caracteres especiales para que el servidor no lo determine como codigo
     // $busca=htmlspecialchars($_GET["busca"]);
      //  Validacion interna de lo valores en el campo de busqueda
      require_once('conexion.php');
      $query="";
      foreach ($_GET as $key => $value) {
        switch ($key) {
          case 'codigoInput':
                if ($query=="") {
                  $query= $query." codigo LIKE '%".$value."%'";
                }else{
                $query= $query." AND codigo LIKE '%".$value."%'";
                }
            break;
          case 'nombresInput':
                if ($query=="") {
                  $query= $query." nombres LIKE '%".$value."%'";
                }else{
                $query= $query." AND nombres LIKE '%".$value."%'";
                }
            break;
          case 'apellidosInput':
                if ($query=="") {
                  $query= $query." apellidos LIKE '%".$value."%'";
                }else{
                $query= $query." AND apellidos LIKE '%".$value."%'";
                }
            break;
            case 'claseInput':
                if ($query=="") {
                  $query= $query." clase LIKE '%".$value."%'";
                }else{
                $query= $query." AND clase LIKE '%".$value."%'";
                }
            break;
            case 'carreraInput':
              $carrera=$value;
                if ($carrera=='0777' || $carrera=='07771' || $carrera=='07772' || $carrera=='07773' || $carrera=='07774' || $carrera=='077741') {
                  $carrera='0777';
                }
                if ($query=="") {
                  $query= $query." programa LIKE '%".$carrera."%'";
                }else{
                $query= $query." AND programa LIKE '%".$carrera."%'";
                }
            break;
            case 'paisInput':
                if ($query=="") {
                  $query= $query." nacionalidad LIKE '%".$value."%'";
                }else{
                $query= $query." AND nacionalidad LIKE '%".$value."%'";
                }
            break;
            case 'generoInput':
                if ($query=="") {
                  $query= $query." genero LIKE '%".$value."%'";
                }else{
                $query= $query." AND genero LIKE '%".$value."%'";
                }
            break;
            case 'direccionInput':
                if ($query=="") {
                  $query= $query." direccion LIKE '%".$value."%'";
                }else{
                $query= $query." AND direccion LIKE '%".$value."%'";
                }
            break;
            case 'ubicacionInput':
                if ($query=="") {
                  $query= $query." ubicacion LIKE '%".$value."%'";
                }else{
                $query= $query." AND ubicacion LIKE '%".$value."%'";
                }
            break;
            case 'cumpleanosInput':
                if ($query=="") {
                  $query= $query." cumpleanos LIKE '%".$value."%'";
                }else{
                $query= $query." AND cumpleanos LIKE '%".$value."%'";
                }
            break;
        }
      }
}

// $sql = "SELECT * FROM `graduat3s` WHERE `codigo`=9078 AND `nombres`=\'SINDY PAOLY\' AND `apellidos`=\'PALMA BARRIENTOS\' AND `clase`=2009 AND `programa`=0777 AND `nacionalidad`=\'HONDURAS\' AND `genero`=\'F\'";


      $busqueda="SELECT * FROM graduat3s WHERE ".$query;


      //cambiar nombre de la tabla de busqueda
// http://localhost/lista-de-graduados/Perfiles-Materialize/busqueda-avanzada.php?codigoInput=11&nombresInput=maicol&apellidosInput=urquia+lara&claseInput=1946&carreraInput=07771&paisInput=SK&generoInput=F&direccionInput=croacia+calle+2&ubicacionInput=zamorano&cumpleanosInput=2017-11-16


      //$busqueda="SELECT * FROM graduat3s WHERE apellidos LIKE '%".$query."%'";
      //cambiar nombre de la tabla de busqueda
// http://localhost/lista-de-graduados/Perfiles-Materialize/busqueda-avanzada.php?codigoInput=11&nombresInput=maicol&apellidosInput=urquia+lara&claseInput=1946&carreraInput=07771&paisInput=SK&generoInput=F&direccionInput=croacia+calle+2&ubicacionInput=zamorano&cumpleanosInput=2017-11-16


      $resultado = $mysqli->query($busqueda);
       //Ejecución de la consulta
            //Si hay resultados...

      if ($resultado->num_rows > 0){
        $registros = '<h4 align="center"><p><strong>HEMOS ENCONTRADO ' . $resultado->num_rows . ' REGISTRO(S)"</strong></p></h4>';
        ?><div>

      <?php
      echo $registros;
      echo '<div class=" ">
            <div class="row">';

      while($f=$resultado->fetch_assoc()){
          $date = strtotime($f['fecha_nacimiento']);
          $datef = strtotime($f['date_deceased']);
          $img='';
          $Titulo='';
          $boton='';
          $card_action='';
          if (file_exists("img/profile_pictures/".$f['ID'].".jpg")) {
            $img="img/profile_pictures/".$f['ID'].".jpg";
          }elseif(!file_exists("img/profile_pictures/".$f['ID'].".jpg"))
            {
               if($f['genero']=='M') {
                  $img="img/MASCULINO.jpg";
                }elseif ($f['genero']=='F') {
                  $img="img/FEMENINO.jpg";
                }
}




            if($f['genero']=='M') {
               $f['genero']='MASCULINO';
             }elseif ($f['genero']=='F') {
               $f['genero']='FEMENINO';
             }
            if ($f['programa']=='0077') {
                $Titulo='AGRONOMO';
                $card_action='<p>Título PIA: </br><strong>INGENIERO AGRONOMO ('.$f['anioIA'].') </strong></p>
                              <p>Orientación: </br><strong>'.$f['orientacion'].'</strong></p>
                              <p>Título del proyecto de graduación: </br><strong>'.$f['titulo_tesis'].'</strong></p>
                              <p>Áreas de interés: </br><strong>'.$f['area_interes'].'</strong></p>
                              <a class="waves-effect waves-light btn-large ripple-effect" target="_blank" style="background-color:#e8ac35" href="'.$f['url_tesis'].'"><i class="material-icons left">library_books</i>Tesis digital </a>';
            }
            if ($f['programa']=='0707') {
                $Titulo='AGRONOMO';
                $card_action='<p>Título PPIA: </br><strong>INGENIERO AGRONOMO ('.$f['anioIA'].') </strong></p>
                              <p>Orientación: </br><strong>'.$f['orientacion'].'</strong></p>
                              <p>Título del proyecto de graduación: </br><strong>'.$f['titulo_tesis'].'</strong></p>

                              <p>Áreas de interés: </br><strong>'.$f['area_interes'].'</strong></p>
                              <a class="waves-effect waves-light btn-large ripple-effect" target="_blank" style="background-color:#e8ac35" href="'.$f['url_tesis'].'"><i class="material-icons left">library_books</i>Tesis digital </a>';
            }
            if ($f['programa']=='0007') {
                $Titulo='AGRONOMO';
                $card_action='';
            }
            if ($f['programa']=='0777') {
                $Titulo='INGENIERO AGRONOMO';
                $card_action='<p>Orientación: <strong>'.$f['orientacion'].'</strong></p>
                <p>Título del proyecto de graduación:</br> <strong>'.$f['titulo_tesis'].'</strong></p>

                              <p>Áreas de interés:</br> <strong>'.$f['area_interes'].'</strong></p>
                              <p>Lugar donde realizó su pasantía:</br> <strong>'.$f['lugar_pasantia'].'</strong></p>
                              <p>Experiencia de trabajo obtenia en su pasantía:</br> <strong>'.$f['exp_pasantia'].'</strong></p>
                              <p>Asesor de Tesis:</br> <strong>'.$f['asesor_tesis'].'</strong></p>
                              <a class="waves-effect waves-light btn-large ripple-effect" target="_blank" style="background-color:#e8ac35" href="'.$f['url_tesis'].'"><i class="material-icons left">library_books</i>Tesis digital </a>';
            }
            if ($f['programa']=='0777') {
            if ($f['orientacion']=='INGENIERIA AGRONOMICA') {
                $Titulo='INGENIERO AGRONOMO';
            }
            if ($f['orientacion']=='AGROINDUSTRIA ALIMENTARIA') {
                $Titulo='INGENIERO EN AGROINDUSTRIA ALIMENTARIA';
            }
            if ($f['orientacion']=='ADMINISTRACION DE AGRONEGOCIOS') {
                $Titulo='INGENIERO EN ADMINISTRACION DE AGRONEGOCIOS';
            }
            if ($f['orientacion']=='DESARROLLO SOCIOECONOMICO Y AMBIENTE') {
                $Titulo='INGENIERO EN DESARROLLO SOCIOECONOMICO Y AMBIENTE';
            }
            if ($f['orientacion']=='AMBIENTE Y DESARROLLO') {
                $Titulo='INGENIERO EN AMBIENTE Y DESARROLLO';
            }
            }
            if(isset($_SESSION['perfiles_user']) ){
            $boton='<a href="editar-perfil.php?id='.$f['ID'].'&url_tesis='.$f['url_tesis'].'&nickname='.$f['nickname'].'&deceased='.$f['deceased'].'&date_deceased='.$f['date_deceased'].'&movil='.$f['movil'].'&telefono='.$f['telefono'].'&email='.$f['email'].'&direccion='.$f['direccion'].'&financiado_por='.$f['financiado_por'].'&asesor_tesis='.$f['asesor_tesis'].'&clase='.$f['clase'].'&codigo='.$f['codigo'].'&nombres='.$f['nombres'].'&apellidos='.$f['apellidos'].'&nacionalidad='.$f['nacionalidad'].'&genero='.$f['genero'].'&programa='.$f['programa'].'&orientacion='.$f['orientacion'].'&diaGraduacion='.$f['dia_graduacion'].'&mesGraduacion='.$f['mes_graduacion'].'&estatus='.$f['estatus'].'&lugarPasantia='.$f['lugar_pasantia'].'&areaInvestigacion='.$f['area_investigacion'].'&titulo_tesis='.$f['titulo_tesis'].'&pa='.$f['pa'].'&fechaNacimiento='.$f['fecha_nacimiento'].'&anioIA='.$f['anioIA'].'&codigoIA='.$f['codigoIA'].'&exp_pasantia='.$f['exp_pasantia'].'&area_interes='.$f['area_interes'].'" class="btn-floating btn-move-up waves-effect waves-light ripple-effect red darken-2 btn-large right">
                          <i class="material-icons">edit</i>
                        </a>';
            }


            echo '<div class="col s12 m12 l6">
                  <div class="card">
                    <div class="card-content ">
                      <span class="card-title"> '. $f['nombres'].' '.$f['apellidos'] .'</span>
                      <div class="row">
                          <div class="col s6 m5 l4 ">
                              <img src="'.$img.'" alt="" >
                          </div>

                          <div class="col s6 m7 l8 ">
                            <p>ID: <strong>'.$f['ID'].'</strong></p>
                            <p>Clase: <strong>'.$f['clase'].'</strong></p>
                            <p>Título Obtenido: <strong>'.$Titulo.' </strong></p>
                            <p>Código: <strong>'.$f['codigo'].'</strong></p>
                            <p>Nickname: <strong>'.$f['nickname'].'</strong></p>
                            <p>Genero: <strong>'.$f['genero'].'</strong></p>
                            <p>País de origen: <strong>'.$f['nacionalidad'].'</strong></p>
                            <p>Fecha de Nacimiento: <strong>'.date('d/m/Y', $date).'</strong></p></br>
                            <p>Financiando por:</br> <strong>'.$f['financiado_por'].'</strong></p></br>
                            <p>Dirección:</br> <strong>'.$f['direccion'].'</strong></p></br>
                            <p>Teléfono: <strong>'.$f['telefono'].'</strong></p>
                            <p>Móvil: <strong>'.$f['movil'].'</strong></p></br>
                            <p>Correo electrónico: <strong><a href="mailto:'.$f['email'].'">'.$f['email'].'</a></strong></p></br>
                            <p>Fallecido: <strong>'.$f['deceased'].'</strong></p>
                            <p>Fecha en que Falleció: <strong>'.date('d/m/Y', $datef).'</strong></p>
                          </div>
                      </div>
                        '.$boton.'
                    </div>
                    <div class="card-action">

                      '.$card_action.'
                    </div>
                </div>
                </div>
               ';


          //onclick="return confirm('¿Realmente deseas eliminar este articulo?')";
          //cambiar los nombres de los campos de busqueda
          }
      }else{
            $registros = '<h4><p><strong>HEMOS ENCONTRADO ' . $resultado->num_rows . ' REGISTROS </strong></p></h4>';?>
            <?php
            echo $registros;
          }



?>



<!-- http://localhost/lista-de-graduados/Perfiles-Materialize/busqueda-avanzada.php?codigoInput=codigo&nombresInput=nombres&apellidosInput=apellidos&claseInput=1946&paisInput=honduras&generoInput=femenino&direccionInput=guayaquil&ubicacionInput=2222&cumpleanosInput=11-enero-2016# -->
