<!DOCTYPE html>
<html lang="en">
<head>
  <title> Report </title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../vendor/toast/css/jquery.toast.css" />
  <link rel="stylesheet" href="../vendor/dataTable/css/datatables.css" />
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .circle1 {
      display: block;
      position: absolute;
      top: 50%;
      left: 50%;
      height: 100px;
      width: 100px;
      margin: -25px 0 0 -25px;
      border: 10px #117a8b solid;
      border-top: 10px #28a745 solid;
      border-bottom: 10px #1e2a7e solid;
      border-radius: 50%;
      -webkit-animation: spin1 1s infinite linear;
              animation: spin1 1s infinite linear;
    }

    @-webkit-keyframes spin1 {
      from {
        -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
      }
      to {
        -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
      }
    }
    @keyframes spin1 {
      from {
        -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
      }
      to {
        -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
        -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
      }
    }
  </style>
</head>
<body>

<div style="margin: 10px 20px">
  <a href="" style="cursor: pointer">
    <img height="70px" style="margin-bottom: 10px" src="../assets/images/logo/1.png" />
  </a>
  <br />
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#climate"> Climate Report </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#productivity"> Productivity Report </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#graphic"> Graphics </a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="climate" class="container tab-pane active"><br>
      <div id="report-climate-loading"></div>
      <table id="climate-table" class="cell-border hover display nowrap" style="width:100%"></table>
    </div>
    <div id="productivity" class="container tab-pane"><br />
      <!-- <button data-toggle="modal" data-target="#product-add-modal" class="btn btn-primary" style="margin-bottom: 20px; float: right"> New </button> -->
      <table id="product-table" class="cell-border hover display nowrap" style="width:100%"></table>
    </div>
    <div id="graphic" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>

  <!-- Product Add modal -->
  <div id="product-add-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Add RA Master </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate method="post">
            <div class="row">
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="ra_new_fecha"> Fecha: </label>
                <input type="text" class="form-control" placeholder="Enter fecha" id="ra_new_fecha" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="ra_new_ano"> ANO: </label>
                <input type="number" class="form-control" placeholder="Enter ano" id="ra_new_ano" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="ra_new_mes"> MES: </label>
                <input type="number" class="form-control" placeholder="Enter mes" id="ra_new_mes" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="ra_new_dia"> DIA: </label>
                <input type="text" class="form-control" placeholder="Enter DIA" id="ra_new_dia" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="ra_new_codigo_unico"> codigo unico: </label>
                <input type="text" class="form-control" placeholder="Enter zafra" id="ra_new_codigo_unico" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="ra_new_Rso"> Rso: </label>
                <input type="number" class="form-control" placeholder="Enter zafra" id="ra_new_Rso" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="ra_new_ano_biciesto"> ano biciesto: </label>
                <input type="text" class="form-control" placeholder="Enter zafra" id="ra_new_ano_biciesto" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
            </div>
            <button id="ra-add-submit-btn" type="submit" style="display: none"> Submit </button>
          </form>
        </div>
        <div class="modal-footer">
          <button id="ra-add-btn" class="btn btn-primary"> Add </button>&nbsp;
          <button id="ra-add-close-btn" type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src="../vendor/toast/js/jquery.toast.js"></script>
<script src="../vendor/loading/loading.min.js"></script>
<script src="../vendor/dataTable/js/datatables.js"></script>
<script src="../vendor/toast/js/jquery.toast.js"></script>

<script src="./vendor/js/main.js"></script>
<script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
</body>
</html>
