<?php  

include("../../conexion.php");

if(isset($_GET['id'])){

    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("SELECT * FROM contactos WHERE id=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $nombre=$registro['nombre'];
    $telefono=$registro['telefono'];
    $fecha=$registro['fecha'];

}

if($_POST){

    $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
    $fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");


    $stm=$conexion->prepare("UPDATE contactos SET nombre=:nombre,telefono=:telefono,fecha=:fecha WHERE id=:txtid");
    $stm->bindparam(":nombre",$nombre);
    $stm->bindparam(":telefono",$telefono);
    $stm->bindparam(":fecha",$fecha);
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();

    header("location:index.php");



}

?>



<?php include("../../template/header.php"); ?>

<form action="" method="post">


        <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid; ?>" placeholder="ingresa nombre"> 

        <label for="">nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" placeholder="ingresa nombre"> 

        <label for="">telefono</label>
        <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>" placeholder="ingresa telefono">

        <label for="">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="<?php echo $fecha; ?>">

      </div>
      <div class="modal-footer">
        <a href="index.php"class="btn btn-danger">cancelar</a>
        <button type="sumit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>

      <?php include("../../template/footer.php"); ?>