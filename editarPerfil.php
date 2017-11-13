<!DOCTYPE html>
<html>
  <?php require_once('includes/session.php'); ?>
  <?php require_once('includes/header.php'); ?>
  
<body >

<?php require_once('includes/nav.php'); ?>
  

  <main class="container">
 <div class="row"> 

 
  <form class="col s12">
  <h3>Editar Perfil</h3>
  <div class="card-panel"> 
    
    <div class="row"> 
      <div align="center" class="col s12 m12 l12">
         
          <input placeholder="" value="<?php echo $_GET['clase']; ?>" disabled id="name" type="text" class="active validate" required hidden>
          <div class="row">
          <div class="col s12"><h5>Datos Personales</h5></div>    
         <div class="input-field col l3 m6 s12">
            <i class="material-icons prefix">account_circle</i>
            <input placeholder="" value="<?php echo $_GET['nombres']; ?>" disabled id="name" type="text" class="active validate" required>
            <label for="name">Nombres</label>
         </div>
         <div class="input-field col l3 m6 s12">
            
            <input placeholder="" value="<?php echo $_GET['apellidos']; ?>" disabled id="name" type="text" class="active validate" required>
            <label for="name"> Apellidos </label>
         </div>
         <div class="input-field col l3 m6 s12">
            
            <input placeholder="" value="<?php echo $_GET['pais']; ?>" disabled id="name" type="text" class="active validate" required>
            <label for="name"> País </label>
         </div>
         <div class="input-field col l3 m6 s12">
            
            <input placeholder="" value="<?php echo $_GET['genero']; ?>" disabled id="name" type="text" class="active validate" required>
            <label for="name"> Género </label>
         </div>
         </div>



         <div class="row">
            <div class="col s12"><h5>Datos Univeristarios</h5></div>
                <div class="input-field col l4 m6 s12">
                    
                    <input placeholder="" value="<?php echo $_GET['codigo']; ?>" <?php if ($_GET['codigo']!='') {echo "disabled";} ?>  id="name" type="text" class="active validate" required>
                    <label for="name">Código</label>
                 </div>
                <div class="input-field col l4 m6 s12  ">
                    
                    <input placeholder="" value="<?php echo $_GET['clase']; ?>" disabled id="name" type="text" class="active validate" required>
                    <label for="name">Clase(Año de graduación)</label>
                 </div>
                <div class="input-field col l4 m6 s12">
                    
                    <input placeholder="" value="<?php echo $_GET['programa']; ?>" disabled id="name" type="text" class="active validate" required>
                    <label for="name"> Programa </label>
                </div>
                <div class="input-field col l3 m6 s12">
                    
                    <input placeholder="" value="<?php echo $_GET['orientacion']; ?>" id="name" type="text" class="active validate" required>
                    <label for="name"> Orientación </label>
                </div>
                <div class="input-field col l3 m6 s12">
                    
                    <input placeholder="" value="<?php echo $_GET['diaGraduacion']; ?>" id="name" type="text" class="active validate" required>
                    <label for="name"> Día de graduación </label>
                </div>
                <div class="input-field col l3 m6 s12">
                    
                    <input placeholder="" value="<?php echo $_GET['mesGraduacion']; ?>" id="name" type="text" class="active validate" required>
                    <label for="name"> mes de Graduacion </label>
                </div>
                <div class="input-field col l3 m6 s12">
                    
                    <input placeholder="" value="<?php echo $_GET['estatus']; ?>" id="name" type="text" class="active validate" required>
                    <label for="name"> Estatus </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col s12"><h5>Datos de Pasantía</h5></div>
                <div class="input-field col l4 m6 s12">
            
            <input placeholder="" value="<?php echo $_GET['lugarPasantia']; ?>" id="name" type="text" class="active validate" required>
            <label for="name"> Lugar de pasantía </label>
        </div>
        <div class="input-field col l4 m6 s12">
            
            <input placeholder="" value="<?php echo $_GET['areaInvestigacion']; ?>" id="name" type="text" class="active validate" required>
            <label for="name"> Area de investigación </label>
        </div>
        <div class="input-field col l4 m6 s12">
            
            <input placeholder="" value="<?php echo $_GET['titulo']; ?>" id="name" type="text" class="active validate" required>
            <label for="name"> Título </label>
        </div>
        <div class="input-field col l4 m6 s12">
            
            <input placeholder="" value="<?php echo $_GET['pa']; ?>" id="name" type="text" class="active validate" required>
            <label for="name"> Promedio acumulado </label>
         </div>
         <div class="input-field col l4 m6 s12">
            
            <input placeholder="" value="<?php echo $_GET['fechaNacimiento']; ?>" id="name" type="text" class="active validate" required>
            <label for="name"> Fecha de nacimiento </label>
         </div>
        </div>
        
         

      </div> 
    </div>
    </div>
  </form>
  
  </div>   
  </main>


<?php require_once('includes/footer.php'); ?>
  </body>
</html>
