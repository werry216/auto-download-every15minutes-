<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Tooplate" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css" />

    <title>Auto - Download Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/tooplate-main.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/timer.css" />
    <link rel="stylesheet" href="vendor/toast/css/jquery.toast.css" />
    <link rel="stylesheet" href="vendor/dataTable/css/datatables.css" />
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
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

    <div class="sequence">
  
      <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
      </div>
      
    </div>
    <div class="logo">
      <img width="100%" height="60px" src="assets/images/logo/1.png" alt="logo" />
      <h2> Pantaleon </h2>
    </div>
    <nav>
      <ul>
        <li style="margin: 20px auto">
          <button id="download-btn" class="btn btn-success btn-sm"> Download </button>
          <button id="stop-btn" class="btn btn-danger btn-sm"> Stop </button>
        </li>
        <li><a href="#1"><img height="20px" src="assets/images/icon-1.png" alt="homepage"> <em> Homepage </em></a></li>
        <li><a href="#2"><img height="20px" src="assets/images/icon-3.png" alt="files"> <em> Master Batches </em></a></li>
        <li><a href="#3"><img height="20px" src="assets/images/icon-3.png" alt="zafra"> <em> Zafra Masters </em></a></li>
        <li><a href="#4"><img height="20px" src="assets/images/icon-3.png" alt="ro"> <em> Master RO </em></a></li>
        <li><a href="#5"><img height="20px" src="assets/images/icon-3.png" alt="ra"> <em> MASTER RA </em></a></li>
      </ul>
    </nav>
    <div class="slides">
      <div class="slide" id="1">
        <div id="slider-wrapper">
          <div id="image-slider">
            <div id="loading" style="z-index: 1000"></div>
            <ul>
              <li class="active-img">
                <br />
                <a class="btn btn-danger" href="report" target="_blank">
                  View Climate Report
                </a>
                <button id="batches-initial-btn" class="btn btn-primary">
                  Master Batches initial
                </button>
                <button id="zafra-initial-btn" class="btn btn-primary">
                  Zafra initial
                </button>
                <button id="ro-initial-btn" class="btn btn-primary">
                  MasterRO initial
                </button>
                <button id="ra-initial-btn" class="btn btn-primary">
                  MasterRA initial
                </button>
                <div class="slide-caption">
                  <div class="timer">
                    <h3> Report Productivity </h3>
                    <br />
                    <div class="timer--clock">
                      <div class="minutes-group clock-display-grp">
                        <div class="first number-grp">
                            <div class="number-grp-wrp">
                              <div class="num num-0"><p>0</p></div>
                              <div class="num num-1"><p>1</p></div>
                              <div class="num num-2"><p>2</p></div>
                              <div class="num num-3"><p>3</p></div>
                              <div class="num num-4"><p>4</p></div>
                              <div class="num num-5"><p>5</p></div>
                              <div class="num num-6"><p>6</p></div>
                              <div class="num num-7"><p>7</p></div>
                              <div class="num num-8"><p>8</p></div>
                              <div class="num num-9"><p>9</p></div>
                            </div>
                        </div>
                        <div class="second number-grp">
                            <div class="number-grp-wrp">
                              <div class="num num-0"><p>0</p></div>
                              <div class="num num-1"><p>1</p></div>
                              <div class="num num-2"><p>2</p></div>
                              <div class="num num-3"><p>3</p></div>
                              <div class="num num-4"><p>4</p></div>
                              <div class="num num-5"><p>5</p></div>
                              <div class="num num-6"><p>6</p></div>
                              <div class="num num-7"><p>7</p></div>
                              <div class="num num-8"><p>8</p></div>
                              <div class="num num-9"><p>9</p></div>
                            </div>
                        </div>
                      </div>
                      <div class="clock-separator"><p>:</p></div>
                      <div class="seconds-group clock-display-grp">
                        <div class="first number-grp">
                            <div class="number-grp-wrp">
                              <div class="num num-0"><p>0</p></div>
                              <div class="num num-1"><p>1</p></div>
                              <div class="num num-2"><p>2</p></div>
                              <div class="num num-3"><p>3</p></div>
                              <div class="num num-4"><p>4</p></div>
                              <div class="num num-5"><p>5</p></div>
                              <div class="num num-6"><p>6</p></div>
                              <div class="num num-7"><p>7</p></div>
                              <div class="num num-8"><p>8</p></div>
                              <div class="num num-9"><p>9</p></div>
                            </div>
                        </div>
                        <div class="second number-grp">
                            <div class="number-grp-wrp">
                              <div class="num num-0"><p>0</p></div>
                              <div class="num num-1"><p>1</p></div>
                              <div class="num num-2"><p>2</p></div>
                              <div class="num num-3"><p>3</p></div>
                              <div class="num num-4"><p>4</p></div>
                              <div class="num num-5"><p>5</p></div>
                              <div class="num num-6"><p>6</p></div>
                              <div class="num num-7"><p>7</p></div>
                              <div class="num num-8"><p>8</p></div>
                              <div class="num num-9"><p>9</p></div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <br />
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="slide" id="2">
        <div class="content">
          <div id="batches-loading"></div>
          <table id="batches-table" class="cell-border hover display" style="width:100%"></table>
        </div>
      </div>
      <div class="slide" id="3">
        <div class="content">
          <div id="zafra-loading"></div>
          <button id="zafra-new-empty-btn" data-toggle="modal" data-target="#zafra-add-modal" style="margin: 10px" class="btn btn-primary"> New </button>
          <table id="zafra-table" class="cell-border hover display" style="width:100%"></table>
        </div>
      </div>
      <div class="slide" id="4">
        <div class="content">
          <div id="ro-loading"></div>
          <button id="ro-new-empty-btn" data-toggle="modal" data-target="#ro-add-modal" style="margin: 10px" class="btn btn-primary"> New </button>
          <table id="ro-table" class="cell-border hover display" style="width:100%">
            <thead>
              <tr>
                <th> No </th>
                <th> mes </th>
                <th> R_0 </th>
                <th> Handle </th>
              </tr>
            </thead>
            <tbody id="ro-table-body"></tbody>
          </table>
        </div>
      </div>
      <div class="slide" id="5">
        <div class="content">
          <div id="ra-loading"></div>
          <button id="ra-new-empty-btn" data-toggle="modal" data-target="#ra-add-modal" style="margin: 10px" class="btn btn-primary"> New </button>
          <table id="ra-table" class="cell-border hover display" style="width:100%">
            <thead>
              <tr>
                <th> No </th>
                <th> Fecha </th>
                <th> ANO </th>
                <th> MES </th>
                <th> DIA </th>
                <th> codigo unico </th>
                <th> Ra[MJ m-2 day-1] </th>
                <th> ano biciesto </th>
                <th> Handle </th>
              </tr>
            </thead>
            <tbody id="ra-table-body"></tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Zafra Add modal -->
    <div id="zafra-add-modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> Add Zafra Master </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate method="post">
              <div class="row">
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="new_ano_mes"> ano mes: </label>
                  <input type="text" class="form-control" placeholder="Enter ano mes" id="new_ano_mes" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="new_ano"> ano: </label>
                  <input type="text" class="form-control" placeholder="Enter ano" id="new_ano" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="new_mes"> mes: </label>
                  <input type="number" class="form-control" placeholder="Enter mes" id="new_mes" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="new_mes_str"> Mes: </label>
                  <input type="text" class="form-control" placeholder="Enter Mes" id="new_mes_str" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="new_zafra"> zafra: </label>
                  <input type="text" class="form-control" placeholder="Enter zafra" id="new_zafra" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>              
                </div>
              </div>
              <button id="zafra-submit-btn" type="submit" style="display: none"> Submit </button>
            </form>
          </div>
          <div class="modal-footer">
            <button id="zafra-add-btn" class="btn btn-primary"> Add </button>&nbsp;
            <button id="zafra-add-close-btn" type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Zafra Edit modal -->
    <div id="zafra-edit-modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> Edit Zafra Master </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate method="post">
              <div class="row">
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="edit_ano_mes"> ano mes: </label>
                  <input type="text" class="form-control" placeholder="Enter ano mes" id="edit_ano_mes" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="edit_ano"> ano: </label>
                  <input type="text" class="form-control" placeholder="Enter ano" id="edit_ano" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="edit_mes"> mes: </label>
                  <input type="number" class="form-control" placeholder="Enter mes" id="edit_mes" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="edit_mes_str"> Mes: </label>
                  <input type="text" class="form-control" placeholder="Enter Mes" id="edit_mes_str" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="edit_zafra"> zafra: </label>
                  <input type="text" class="form-control" placeholder="Enter zafra" id="edit_zafra" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>              
                </div>
              </div>
              <button id="zafra-edit-submit-btn" type="submit" style="display: none"> Submit </button>
            </form>
          </div>
          <div class="modal-footer">
            <button id="zafra-edit-btn" class="btn btn-primary"> Edit </button>&nbsp;
            <button id="zafra-edit-close-btn" type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Ro Add modal -->
    <div id="ro-add-modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> Add Ro Master </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate method="post">
              <div class="row">
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ro_new_mes"> mes: </label>
                  <select class="form-control" name="ro_new_mes" id="ro_new_mes" required>
                    <option value="ene"> ene </option>
                    <option value="feb"> feb </option>
                    <option value="mar"> mar </option>
                    <option value="abr"> abr </option>
                    <option value="may"> may </option>
                    <option value="jun"> jun </option>
                    <option value="jul"> jul </option>
                    <option value="ago"> ago </option>
                    <option value="sep"> sep </option>
                    <option value="oct"> oct </option>
                    <option value="nov"> nov </option>
                    <option value="dic"> dic </option>
                  </select>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ro_new_r_0"> R_0: </label>
                  <input type="number" class="form-control" placeholder="Enter R_0" id="ro_new_r_0" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
              </div>
              <button id="ro-add-submit-btn" type="submit" style="display: none"> Submit </button>
            </form>
          </div>
          <div class="modal-footer">
            <button id="ro-add-btn" class="btn btn-primary"> Add </button>&nbsp;
            <button id="ro-add-close-btn" type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Ro Edit modal -->
    <div id="ro-edit-modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> Edit Ro Master </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate method="post">
              <div class="row">
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ro_edit_mes"> mes: </label>
                  <select class="form-control" name="ro_edit_mes" id="ro_edit_mes" required>
                    <option value="ene"> ene </option>
                    <option value="feb"> feb </option>
                    <option value="mar"> mar </option>
                    <option value="abr"> abr </option>
                    <option value="may"> may </option>
                    <option value="jun"> jun </option>
                    <option value="jul"> jul </option>
                    <option value="ago"> ago </option>
                    <option value="sep"> sep </option>
                    <option value="oct"> oct </option>
                    <option value="nov"> nov </option>
                    <option value="dic"> dic </option>
                  </select>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ro_edit_r_0"> R_0: </label>
                  <input type="number" class="form-control" placeholder="Enter R_0" id="ro_edit_r_0" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
              </div>
              <button id="ro-edit-submit-btn" type="submit" style="display: none"> Submit </button>
            </form>
          </div>
          <div class="modal-footer">
            <button id="ro-edit-btn" class="btn btn-primary"> Edit </button>&nbsp;
            <button id="ro-edit-close-btn" type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Ra Add modal -->
    <div id="ra-add-modal" class="modal fade" role="dialog">
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

    <!-- Ra Edit modal -->
    <div id="ra-edit-modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> Edit RA Master </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate method="post">
              <div class="row">
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ra_edit_fecha"> Fecha: </label>
                  <input type="text" class="form-control" placeholder="Enter fecha" id="ra_edit_fecha" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ra_edit_ano"> ANO: </label>
                  <input type="number" class="form-control" placeholder="Enter ano" id="ra_edit_ano" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ra_edit_mes"> MES: </label>
                  <input type="number" class="form-control" placeholder="Enter mes" id="ra_edit_mes" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ra_edit_dia"> DIA: </label>
                  <input type="text" class="form-control" placeholder="Enter DIA" id="ra_edit_dia" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ra_edit_codigo_unico"> codigo unico: </label>
                  <input type="text" class="form-control" placeholder="Enter zafra" id="ra_edit_codigo_unico" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>              
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ra_edit_Rso"> Rso: </label>
                  <input type="number" class="form-control" placeholder="Enter zafra" id="ra_edit_Rso" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>              
                </div>
                <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                  <label for="ra_edit_ano_biciesto"> ano biciesto: </label>
                  <input type="text" class="form-control" placeholder="Enter zafra" id="ra_edit_ano_biciesto" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>              
                </div>
              </div>
              <button id="ra-edit-submit-btn" type="submit" style="display: none"> Submit </button>
            </form>
          </div>
          <div class="modal-footer">
            <button id="ra-edit-btn" class="btn btn-primary"> Edit </button>&nbsp;
            <button id="ra-edit-close-btn" type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/accordations.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function() {

            // navigation click actions 
            $('.scroll-link').on('click', function(event){
                event.preventDefault();
                var sectionID = $(this).attr("data-id");
                scrollToID('#' + sectionID, 750);
            });
            // scroll to top action
            $('.scroll-top').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({scrollTop:0}, 'slow');         
            });
            // mobile nav toggle
            $('#nav-toggle').on('click', function (event) {
                event.preventDefault();
                $('#main-nav').toggleClass("open");
            });
        });
        // scroll function
        function scrollToID(id, speed){
            var offSet = 0;
            var targetOffset = $(id).offset().top - offSet;
            var mainNav = $('#main-nav');
            $('html,body').animate({scrollTop:targetOffset}, speed);
            if (mainNav.hasClass("open")) {
                mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                mainNav.removeClass("open");
            }
        }
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
    <script src="vendor/toast/js/jquery.toast.js"></script>
    <script src="vendor/loading/loading.min.js"></script>
    <script src="vendor/dataTable/js/datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/excel.js"></script>
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
