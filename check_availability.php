<?php 
include('includes/dbconnection.php');
// code user email availablity
if(!empty($_POST["emailid"])) {
  $email= $_POST["emailid"];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

    echo "error : No ingresó un correo electrónico válido.";
  }
  else {
    $sql ="SELECT Email FROM tbladmin WHERE Email=:email";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query -> rowCount() > 0)
    {
      echo "<span style='color:red'> El Correo electrónico ya se encuentra registrado .</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    } else{

      echo "<span style='color:green'> Correo electrónico disponible para registro .</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
}

if(!empty($_POST["companyname"])) {
  $companyname= $_POST["companyname"];

  $sql ="SELECT companyname FROM tblcompany WHERE companyname=:companyname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':companyname', $companyname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> el nombre de la empresa ya existe .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{

    echo "<span style='color:green'> nombre de la empresa disponible para el registro .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}

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
    echo "<span style='color:red'> Nombre de usuario ya existe .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> Nombre de usuario disponible para registro .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}


if(!empty($_POST["code"])) {
  $bidname= $_POST["code"];
  
  $sql ="SELECT Code FROM tblbid WHERE Code=:bidname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':bidname', $bidname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> El código ya existe .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> Código disponible para registro .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}


?>
