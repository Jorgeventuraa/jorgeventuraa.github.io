<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['save']))
{
  $primerapellido=$_POST['txtprimerapellido'];
  $segundoapellido=$_POST['txtsegundoapellido'];
  $nombres=$_POST['txtnombres'];
  $DNInumber=$_POST['txtDNInumber'];
  $whomtomeet=$_POST['txtwhomtomeet'];
  $department=$_POST['txtdepartment'];
  $motivoreunion=$_POST['txtmotivoreunion'];
  
  $sql="insert into tblvisitor(last_name_dad,last_name_mom,name,DNI,WhomtoMeet,Deptartment,ReasontoMeet) value(:primerapellido,:segundoapellido,:nombres,:DNInumber,:whomtomeet,:department,:motivoreunion)";
  
  $query=$dbh->prepare($sql);
  $query->bindParam(':primerapellido',$primerapellido,PDO::PARAM_STR);
  $query->bindParam(':segundoapellido',$segundoapellido,PDO::PARAM_STR);
  $query->bindParam(':nombres',$nombres,PDO::PARAM_STR);
  $query->bindParam(':DNInumber', $DNInumber,PDO::PARAM_STR);
  $query->bindParam(':whomtomeet',$whomtomeet,PDO::PARAM_STR);
  $query->bindParam(':department',$department,PDO::PARAM_STR);
  $query->bindParam(':motivoreunion',$motivoreunion,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId<0) 
  { 
// echo '<script>
//         Swal.fire({
//          icon: "error",
//          title: "Oops...",
//          text: "¡La contraseña no coincide!",
//          showConfirmButton: true,
//          confirmButtonText: "Cerrar"
//          }).then(function(result){
//             if(result.value){                   
//              window.location = "new_visitor.php";
//             }
//          });
//         </script>';




          
      
            echo '<script>alert("Registered successfully")</script>';
            echo "<script>window.location.href ='new_visitor.php'</script>";
    // echo '<script>alert("Registered successfully")</script>';
    // echo "<script>window.location.href ='new_visitor.php'</script>";
  }
  else
  {
    // echo '<script>alert("Something Went Wrong. Please try again")</script>';
    // Echo "<script>swal ("good job", "you click a button", "success"); </script>";
  }
}
?> 

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>

<head>
<!-- estilo wseet alert -->
<link rel="stylesheet" href="../sistemaVisitasMejorada/assets/plugins/SweetAlert/dist/sweetalert2.min.css">


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>


<body>


  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

              <div class="modal-header">
                <h5 class="modal-title"  style="float: left;">Registrar Visitante</h5>
              </div>

              <div class="btn-group">
                    <input type="text" id="documento" class="form-control">
                    <button class="btn btn-success" id="buscar">CONSULTAR</button>
                  </div>


              <div class="col-md-12 mt-4">
                <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="row ">
                  <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Primer Apellido</label>
                      <input type="text" id="primerapellido" placeholder="Apellido paterno" class="form-control" name="txtprimerapellido" required="">
                    </div>
                    <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Segundo Apellido</label>
                      <input type="text" id="segundoapellido" placeholder="Apellido materno" class="form-control" name="txtsegundoapellido" required="">
                    </div>
                    <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Nombres</label>
                      <input type="text" id="nombres" placeholder="Nombre completo" class="form-control" name="txtnombres" required="">
                    </div>
                    <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Número DNI</label>
                      <input type="number" id="DNInumber"  placeholder="N° DNI" class="form-control" maxlength="8" name="txtDNInumber" required="">
                    </div>
                  </div>
                  <div class="row ">
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">a quien conocer </label>
                      <input type="text" id="whomtomeet" placeholder="Con quien se va reunir" class="form-control" name="txtwhomtomeet" required="">
                    </div>

                    <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Dependencia</label>
                      <input type="text" id="department" placeholder="Oficina-Gerencia" class="form-control" name="txtdepartment" required="">
                    </div>

                    <div class="form-group col-md-6 offset-md-6 ">
                      <label for="exampleInputPassword1">Motivo para reunirse</label>
                      <textarea id="motivoreunion" rows="9" placeholder="Motivo del visitante..." class="form-control" name="txtmotivoreunion" required=""></textarea>
                    </div>

                  </div>

                  <div class="row ">
                  </div>

                  <div class="row ">
                  </div>
                  <div>
                  <!-- <button type="submit" style="float: left;" name="save" class="btn btn-info  mr-2 mb-4" onclick="mostrarAlerta()">Agregar</button> -->
                  <button type="submit" style="float: left;" name="save" class="btn btn-info mr-2 mb-4">Agregar</button>
                  <button type="submit" style="float: left;" name="save" class="btn btn-info  mr-2 mb-4">Agregar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
      <?php @include("includes/footer.php");?>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php @include("includes/foot.php");?>
<!-- End custom js for this page -->
</body>

<!-- Script para llamar la api de la reniec -->
<script>
    $('#buscar').click(function(){
        dni=$('#documento').val();
        $.ajax({
          url:'controlador/controlador_consultaDNI.php',
          type:'post',
          data: 'dni='+dni,
          dataType:'json',
          success:function(r){
            if(r.numeroDocumento==dni){
                $('#primerapellido').val(r.apellidoPaterno);
                $('#segundoapellido').val(r.apellidoMaterno);
                $('#nombres').val(r.nombres);
                $('#DNInumber').val(r.numeroDocumento);
            }else{
                alert(r.error);
            }
            console.log(r)
          }
        });
    });
</script>


<script>
  document.addEventListener("keyup",function(event){
    if (event.code=="Enter") { //ArrowLeft
      document.getElementById("buscar").click()
    } else {
      
    }
  })
</script>


<!-- Para que el autofocus pase de consultar a Dependencia -->
<script>
  function miAutofocus() {
        document.getElementById("dependencia").focus();
    };
</script>


<!-- Para mostrar alerta de que se registro correctamente al visitante -->
<!-- <script>
function mostrarAlerta() {
  Swal.fire({
  title: 'Correcto',
  html: "Registrado correctamente a la base de datos" ,
  icon: 'success',
  // confirmButtonText: 'Entendido'
  showConfirmButton: false,
  timer: 10000,
  didOpen: () => {
    const content = Swal.getHtmlContainer()
    const $ = content.querySelector.bind(content)

    const stop = $('#stop')
    const resume = $('#resume')
    const toggle = $('#toggle')
    const increase = $('#increase')

    Swal.showLoading()

    function toggleButtons () {
      stop.disabled = !Swal.isTimerRunning()
      resume.disabled = Swal.isTimerRunning()
    }

    stop.addEventListener('click', () => {
      Swal.stopTimer()
      toggleButtons()
    })

    resume.addEventListener('click', () => {
      Swal.resumeTimer()
      toggleButtons()
    })

    toggle.addEventListener('click', () => {
      Swal.toggleTimer()
      toggleButtons()
    })

    increase.addEventListener('click', () => {
      Swal.increaseTimer(5000)
    })

    timerInterval = setInterval(() => {
      Swal.getHtmlContainer().querySelector('strong')
        .textContent = (Swal.getTimerLeft() / 1000)
          .toFixed(0)
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
  });
}
</script> -->
<!-- <script>
            $(document).ready(function () {
                Swal.fire({
                    title: 'Bienvenido ',
                    html: "El usuario" ,
                    icon: 'success',
                    // confirmButtonText: 'Entendido'
                    showConfirmButton: false,
                    timer: 3000 // tiempo en 
                });
            });
        </script> -->

        <!-- <script>
function mostrarAlerta() {
  Swal.fire({
    icon: 'success',
    title: '¡Éxito!',
    text: 'La operación se realizó correctamente.',
    timer: 5000, // 5 segundos
    showConfirmButton: false // No mostrar botón "OK"
  });
}
</script> -->


        


<script src="../sistemaVisitasMejorada/assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>

</html>