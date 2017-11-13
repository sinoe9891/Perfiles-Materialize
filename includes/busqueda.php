 <?php  
// Aqui validamos si la variable $_POST["busca"] existe como validacion
  // Si es que esta cargando la pagina o haciendo una bsuqueda.
if(empty($_POST["busca"]))
{ ?>
  <div align="center"> 
  <?php
    echo '<h3><p><strong>ENTER TO SEARCH</strong></p></h3>';;
    // si es una Busqueda entrara en este siguente IF lo cual iniciara el proceso
    }elseif(!empty($_POST["busca"])){
    // Sustituimos caracteres especiales para que el servidor no lo determine como codigo
      $busca=htmlspecialchars($_POST["busca"]);
      //  Validacion interna de lo valores en el campo de busqueda
      if(filter_var($_POST["busca"], FILTER_VALIDATE_INT)){
        echo "Debes escribir letras de la A - Z";
      }else { 
      
      require_once('conexion.php');
      
      $busqueda="SELECT * FROM graduat3s WHERE apellidos LIKE '%".$busca."%'";
      //cambiar nombre de la tabla de busqueda
      
      $resultado = $mysqli->query($busqueda); 
       //Ejecución de la consulta
            //Si hay resultados...
      
      if ($resultado->num_rows > 0){ 
        $registros = '<h4 align="center"><p><strong>HEMOS ENCONTRADO ' . $resultado->num_rows . ' REGISTRO(S) PARA "'.$busca.'"</strong></p></h4>';  
        ?><div>

      <?php
      echo $registros;
      echo '<div class=" "> 
            <div class="row">';

      while($f=$resultado->fetch_assoc()){
          $date = strtotime($f['fecha_nacimiento']);
          $img='';
          $Titulo='';
          $boton='';
          $card_action='';
              if ($f['genero']=='M') {
                $f['genero']='MASCULINO';
                $img=$f['genero'];
              }elseif ($f['genero']=='F') {
                $f['genero']='FEMENINO';
                $img=$f['genero'];
              }
            
            if ($f['programa']=='0077') {
                $Titulo='AGRONOMO';
                $card_action='<p>Título PIA: </br><strong>INGENIERO AGRONOMO ('.$f['anioIA'].') </strong></p>
                              <p>Orientación: </br><strong>'.$f['orientacion'].'</strong></p>
                              <p>Título del proyecto de graduación: </br><strong>'.$f['titulo'].'</strong></p>
                              <p>Áreas de interés: </br><strong>'.$f['area_interes'].'</strong></p>
                              <a class="waves-effect waves-light btn-large ripple-effect" target="_blank" style="background-color:#e8ac35" href="'.$f['url_pasantia'].'"><i class="material-icons left">library_books</i>Tesis digital </a>';
            }
            if ($f['programa']=='0707') {
                $Titulo='AGRONOMO';
                $card_action='<p>Título PPIA: </br><strong>INGENIERO AGRONOMO ('.$f['anioIA'].') </strong></p>
                              <p>Orientación: </br><strong>'.$f['orientacion'].'</strong></p>
                              <p>Título del proyecto de graduación: </br><strong>'.$f['titulo'].'</strong></p>
                              
                              <p>Áreas de interés: </br><strong>'.$f['area_interes'].'</strong></p>
                              <a class="waves-effect waves-light btn-large ripple-effect" target="_blank" style="background-color:#e8ac35" href="'.$f['url_pasantia'].'"><i class="material-icons left">library_books</i>Tesis digital </a>';
            }
            if ($f['programa']=='0007') {
                $Titulo='AGRONOMO';
                $card_action='';
            }
            if ($f['programa']=='0777') {
                $Titulo='INGENIERO AGRONOMO';
                $card_action='<p>Orientación: <strong>'.$f['orientacion'].'</strong></p>
                <p>Título del proyecto de graduación: <strong>'.$f['titulo'].'</strong></p>
                              
                              <p>Áreas de interés: <strong>'.$f['area_interes'].'</strong></p>
                              <p>Lugar donde realizó su pasantia: <strong>'.$f['lugar_pasantia'].'</strong></p>
                              <p>Experiencia de trabajo obtenia en su pasantia: <strong>'.$f['exp_pasantia'].'</strong></p>
                              <p>Asesor de Tesis: <strong>'.$f['asesor_pasantia'].'</strong></p>
                              <a class="waves-effect waves-light btn-large ripple-effect" target="_blank" style="background-color:#e8ac35" href="'.$f['url_pasantia'].'"><i class="material-icons left">library_books</i>Tesis digital </a>';
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
            $boton='<a href="editarPerfil.php?id='.$f['ID'].'&clase='.$f['clase'].'&codigo='.$f['codigo'].'&nombres='.$f['nombres'].'&apellidos='.$f['apellidos'].'&pais='.$f['pais'].'&genero='.$f['genero'].'&programa='.$f['programa'].'&orientacion='.$f['orientacion'].'&diaGraduacion='.$f['dia_graduacion'].'&mesGraduacion='.$f['mes_graduacion'].'&estatus='.$f['estatus'].'&lugarPasantia='.$f['lugar_pasantia'].'&areaInvestigacion='.$f['area_investigacion'].'&titulo='.$f['titulo'].'&pa='.$f['pa'].'&fechaNacimiento='.$f['fecha_nacimiento'].'" class="btn-floating btn-move-up waves-effect waves-light ripple-effect red darken-2 btn-large right">
                          <i class="material-icons">edit</i>
                        </a>';
            }


            echo '<div class="col s12 m12 l6">
                  <div class="card">
                    <div class="card-content ">
                      <span class="card-title"> '. $f['nombres'].' '.$f['apellidos'] .'</span>
                      <div class="row">
                          <div class="col s6 m5 l4 "> 
                              <img src="img/'.$img.'.jpg" alt="" >
                          </div>

                          <div class="col s6 m7 l8 ">
                            <p>Clase: <strong>'.$f['clase'].'</strong></p>
                            
                             <p>Título Obtenido: <strong>'.$Titulo.' </strong></p>
                            <p>Código: <strong>'.$f['codigo'].'</strong></p>
                            <p>Genero: <strong>'.$f['genero'].'</strong></p>
                            <p>País: <strong>'.$f['pais'].'</strong></p>
                            <p>Fecha de Nacimiento: <strong>'.date('d/m/Y', $date).'</strong></p>
                            
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
}
} 

?>
