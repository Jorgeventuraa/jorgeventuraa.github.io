<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_GET['restoreid']))
{
    $rid=intval($_GET['restoreid']);
    $sql="update tbladmin set Status='1' where ID='$rid'";
    $query=$dbh->prepare($sql);
    $query->bindParam(':rid',$rid,PDO::PARAM_STR);
    $query->execute();
    if ($query->execute()){
        echo "<script>alert('User Restored');</script>"; 
        echo "<script>window.location.href = 'userregister.php'</script>";
    }else{
        echo '<script>alert("update failed! try again later")</script>';
    }
    
}
?>
<div class="card-body table-responsive p-3">
    <h4 class="card-title">Administrar usuarios</h4>
    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
        <thead>
            <tr>
                <th class="text-center"></th>
                <th class="">Nombres y apellidos</th>
                <th class="">Número DNI</th>
                <th class="">Correo electrónico</th>
                <th class="text-center">Numero de teléfono</th>
                <th class=" text-center">Fecha de registro</th>
                <th class="text-center" style="width: 15%;">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql="SELECT * from tbladmin where Status='0'  ";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
                foreach($results as $row)
                {    
                    ?>
                    <tr>
                        <td class="text-center"><?php echo htmlentities($cnt);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->FirstName);?>&nbsp;<?php  echo htmlentities($row->LastName);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->$row->Staffid);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->Email);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->MobileNumber);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->Email);?></td>
                        <td class="font-w600">
                            <span class="badge badge-primary"><?php  echo htmlentities($row->AdminRegdate);?></span>
                        </td>
                        <td class=""><a href="deleted_users.php?restoreid=<?php echo ($row->ID);?>" onclick="return confirm('Do you really want to Restore user ?');" title="Restore this User">restaurar</i></a> </td>
                    </tr>
                    <?php $cnt=$cnt+1;
                }
            } ?>
        </tbody>
    </table>
</div>