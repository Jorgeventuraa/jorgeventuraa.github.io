<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(!empty($_POST["fullname"])) {
  $fullname= $_POST["fullname"];
  
  $sql ="SELECT UserName FROM tbladmin WHERE UserName=:fullname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':fullname', $fullname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<script>alert('Nombre de usuario ya existe. prueba otro');</script>";
} else{
    if(isset($_POST['signup']))
    { 
        $fname=$_POST['fullname'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['emailid']; 
        $staffid=$_POST['staffid']; 
        $mobile=$_POST['mobileno'];
        $dignity=$_POST['dignity']; 
        $password=md5($_POST['password']); 
        $sql="INSERT INTO  tbladmin(Staffid,AdminName,UserName,FirstName,LastName,Email,MobileNumber,Password) VALUES(:staffid,:dignity,:fname,:firstname,:lastname,:email,:mobile,:password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname',$fname,PDO::PARAM_STR);
        $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
        $query->bindParam('lastname',$lastname,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':staffid',$staffid,PDO::PARAM_STR);
        $query->bindParam(':dignity',$dignity,PDO::PARAM_STR);
        $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
        $query->bindParam(':password',$password,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión');</script>";
        }
        else 
        {
            echo "<script>alert('Algo salió mal. Inténtalo de nuevo');</script>";
        }
    }
}
}

?>
<script>
    function checkAvailability() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "check_availability.php",
            data:'emailid='+$("#emailid").val(),
            type: "POST",
            success:function(data)
            {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>

<script>
    function checkAvailability2() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "check_availability.php",
            data:'fullname='+$("#fullname").val(),
            type: "POST",
            success:function(data)
            {
                $("#user-availability-status2").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>
<script type="text/javascript">
    function valid()
    {
        if(document.signup.password.value!= document.signup.confirmpassword.value)
        {
            alert("La contraseña nueva no coinciden !!");
            document.signup.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>
<div class="card-body">
    <form  method="post" name="signup" onSubmit="return valid();">
        <div class="row ">
            <div class="form-group col-md-6">
                <select class="form-control"   name="dignity"  id="dignity"  required>
                    <option value="">Seleccionar permisos</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="staffid" placeholder="DNI" maxlength="8" required="required">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nombre de usuario" onBlur="checkAvailability2()" required="required">
                <span id="user-availability-status2" style="font-size:12px;"></span>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="firstname" placeholder="Nombres" required="required">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="lastname" placeholder="Apellidos" required="required">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="mobileno" placeholder="Número de teléfono" maxlength="9" required="required">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email" required="required">
                <span id="user-availability-status" style="font-size:12px;"></span> 
            </div>
            <div class="form-group col-md-6">
                <input type="password"  class="form-control" name="password" placeholder="Contraseña" required="required">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirmar Contraseña" required="required">
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Registrar" name="signup" id="submit" class="btn btn-info">
        </div>
    </form>
</div>