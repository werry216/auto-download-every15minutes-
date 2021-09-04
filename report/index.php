<!DOCTYPE html>
<html lang="en">
<head>
    <title> Report </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../vendor/toast/css/jquery.toast.css" />
    <link rel="stylesheet" href="../vendor/dataTable/css/datatables.css" />

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
            <a class="nav-link active" data-toggle="tab" href="#home"> Climate Report </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1"> Report 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2"> Report 2 </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
            <div id="report-climate-loading"></div>
            <table id="climate-table" class="cell-border hover display" style="width:100%"></table>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
            <h3>Menu 1</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div id="menu2" class="container tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src="../vendor/toast/js/jquery.toast.js"></script>
<script src="../vendor/loading/loading.min.js"></script>
<script src="../vendor/dataTable/js/datatables.js"></script>
<script src="../vendor/toast/js/jquery.toast.js"></script>

<script src="./vendor/js/main.js"></script>
</body>
</html>
