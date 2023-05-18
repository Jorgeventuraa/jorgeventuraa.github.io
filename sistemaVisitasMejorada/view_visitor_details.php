<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['update']))
{
  $eid=$_SESSION['editid'];
  $remark=$_POST['remark'];
  $query=mysqli_query($con,"update tblvisitor set remark='$remark' where  ID='$eid'");
  if ($query) {
    echo '<script>alert("Los datos del visitante han sido actualizados correctamente en la base datos.")</script>';
    echo "<script>window.location.href ='manage_visitor.php'</script>";
  }
  else{
    echo '<script>alert("Algo salió mal. Inténtalo de nuevo")</script>';
  }
}
?>


<div class="card-body">
  <?php
  $eid=$_POST['edit_id5'];
  $sql="SELECT * from tblvisitor  where ID=:eid";
  $query = $dbh -> prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    foreach($results as $row)
    {
     $_SESSION['editid']=$row->ID;?>

     <h4 style="color: blue">Información del visitante</h4>
     <table border="1" class="table table-bordered">
      <tr>
        <th>Nombres completos</th>
        <td><?php  echo $row->name ." ". $row->last_name_dad ." ". $row->last_name_mom;?></td>
      </tr>
      <tr>
        <th>Número DNI</th>
        <td><?php  echo $row->DNI;?></td>
      </tr>
      <tr>
        <th>  <wbr> a quien conocer</th>
          <td><?php  echo $row->WhomtoMeet;?></td>
        </tr>
        <tr>
          <th>Dependencia</th>
          <td><?php  echo $row->Deptartment;?></td>
        </tr>
        <tr>
          <th>  <wbr> Motivo para reunirse</th>
            <td><?php  echo $row->ReasontoMeet;?></td>
          </tr>
          <tr>
            <th>Hora de entrada del visitante</th>
            <td><?php  echo $row->EnterDate;?></td>
          </tr>
          <?php if($row->remark!=""){ ?>
           <tr>
            <th>Observaciónes de salida </th>
            <td><?php echo $row->remark; ?></td>
          </tr>


          <tr>
            <th>Hora de salida del visitante</th>
            <td><?php echo $row->outtime; ?>  </td> 
          </tr>
          <?php 
        } ?>
      </table> 
      <?php if($row->remark==""){ ?>
        <div class="card pt-4">
          <form method="post">
            <div class="row col-md-6 form-group">
             <label for="exampleInputPassword1">Ingrese los comentarios de la salida</label>
              <textarea name="remark" placeholder="Ingrese los comentarios de la salida" rows="6" cols="8" class="form-control wd-450" required="true"></textarea>
              <button type="submit" name="update" class="btn btn-primary btn-sm mt-4">Actualizar</button>
            </div>
          </form>
        </div>
        <?php
      }
    }
  } ?>
</div>
