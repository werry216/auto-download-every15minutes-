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
      <button data-toggle="modal" data-target="#product-add-modal" class="btn btn-primary" style="margin-bottom: 20px; float: right"> New </button>
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
          <h4 class="modal-title"> Add Productivity Report </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate method="post">
            <div class="row">
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_id_com_pims"> id-com pims: </label>
                <input type="text" class="form-control" placeholder="Enter id-com pims" id="new_product_id_com_pims" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_finca"> Finca: </label>
                <input type="text" class="form-control" placeholder="Enter Finca" id="new_product_finca" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_description"> Descripción: </label>
                <input type="text" class="form-control" placeholder="Enter Descripción" id="new_product_description" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_lot"> Lot: </label>
                <input type="number" class="form-control" placeholder="Enter Lot" id="new_product_lot" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_tc"> TC: </label>
                <input type="number" class="form-control" placeholder="Enter TC" id="new_product_tc" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_area_cosechada"> Área cosechada: </label>
                <input type="number" class="form-control" placeholder="Enter Área cosechada" id="new_product_area_cosechada" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_TCH_real"> TCH Real: </label>
                <input type="number" class="form-control" placeholder="Enter TCH Real" id="new_product_TCH_real" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_tch_obj"> TCH Obj: </label>
                <input type="number" class="form-control" placeholder="Enter TCH Obj" id="new_product_tch_obj" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_dif_tch_vs_est"> Dif tch vs est: </label>
                <input type="number" class="form-control" placeholder="Enter Dif tch vs est" id="new_product_dif_tch_vs_est" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_cutoff_date"> cutoff date: </label>
                <input type="date" class="form-control" placeholder="Enter cutoff date" id="new_product_cutoff_date" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_days"> Days: </label>
                <input type="number" class="form-control" placeholder="Enter Days" id="new_product_days" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_pentadas"> Pentadas: </label>
                <input type="number" class="form-control" placeholder="Enter Pentadas" id="new_product_pentadas" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_etapa_fenologica"> Etapa Fenologica: </label>
                <input type="text" class="form-control" placeholder="Enter Etapa Fenologica" id="new_product_etapa_fenologica" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_no_cortes"> No. Cortes: </label>
                <input type="number" class="form-control" placeholder="Enter No. Cortes" id="new_product_no_cortes" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_tipo de cosecha"> Tipo de cosecha: </label>
                <input type="text" class="form-control" placeholder="Enter Tipo de cosecha" id="new_product_tipo" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_edad_cosecha"> Edad cosecha: </label>
                <input type="number" class="form-control" placeholder="Enter Edad cosecha" id="new_product_edad_cosecha" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_semana_fiscal"> Semana fiscal: </label>
                <input type="number" class="form-control" placeholder="Enter Semana fiscal" id="new_product_semana_fiscal" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_region"> Region: </label>
                <input type="text" class="form-control" placeholder="Enter Region" id="new_product_region" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_variedad_anterior"> Variedad anterior: </label>
                <input type="text" class="form-control" placeholder="Enter Variedad anterior" id="new_product_variedad_anterior" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_variedad_cortada"> Variedad cortada: </label>
                <input type="text" class="form-control" placeholder="Enter Variedad cortada" id="new_product_variedad_cortada" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_status_para_analizar_la_produccion"> Status para analizar la produccion: </label>
                <input type="text" class="form-control" placeholder="Enter Status para analizar la produccion" id="new_product_status_para_analizar_la_produccion" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_edad_al_madurante"> edad al madurante: </label>
                <input type="number" class="form-control" placeholder="Enter Edad al madurante" id="new_product_edad_al_madurante" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_fecha_aplic_madurante"> Fecha aplic Madurante: </label>
                <input type="number" class="form-control" placeholder="Enter Fecha aplic Madurante" id="new_product_fecha_aplic_madurante" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_dosis_producto"> Dosis Producto: </label>
                <input type="number" class="form-control" placeholder="Enter Dosis Producto" id="new_product_dosis_producto" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_producto_aplicado"> Producto Aplicado: </label>
                <input type="text" class="form-control" placeholder="Enter Producto Aplicado" id="new_product_producto_aplicado" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_TCH_estimado_madurante"> TCH estimado madurante: </label>
                <input type="text" class="form-control" placeholder="Enter TCH estimado madurante" id="new_product_TCH_estimado_madurante" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_KG_azcucar_prequema_ant"> KG azcucar prequema ant: </label>
                <input type="text" class="form-control" placeholder="Enter KG azcucar prequema ant" id="new_product_KG_azcucar_prequema_ant" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_KG_azucar_core_ant"> KG azucar core ant: </label>
                <input type="number" class="form-control" placeholder="Enter KG azucar core ant" id="new_product_KG_azucar_core_ant" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_Kg_azucar_Industrial_ant"> Kg azucar Industrial ant: </label>
                <input type="number" class="form-control" placeholder="Enter Kg azucar Industrial ant" id="new_product_Kg_azucar_Industrial_ant" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_KG_Azucar_prequema_estim"> KG Azucar prequema estim: </label>
                <input type="number" class="form-control" placeholder="Enter KG Azucar prequema estim" id="new_product_KG_Azucar_prequema_estim" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_KG_azucar_core_Estim"> KG Azucar Core Estim: </label>
                <input type="number" class="form-control" placeholder="Enter KG Azucar Core Estim" id="new_product_KG_azucar_core_Estim" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_KG_azucar_industrial_estim"> KG Azucar industrial estim: </label>
                <input type="number" class="form-control" placeholder="Enter KG Azucar industrial estim" id="new_product_KG_azucar_industrial_estim" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_KG_azucar_prequema_real"> KG Azucar prequema real: </label>
                <input type="number" class="form-control" placeholder="Enter KG Azucar prequema real" id="new_product_KG_azucar_prequema_real" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_KG_azucar_core_real"> KG Azucar Core real: </label>
                <input type="number" class="form-control" placeholder="Enter KG Azucar Core real" id="new_product_KG_azucar_core_real" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_KG_azucar_industrial_real"> KG Azucar industrial real: </label>
                <input type="number" class="form-control" placeholder="Enter KG Azucar industrial real" id="new_product_KG_azucar_industrial_real" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_Kg_t_core"> Kg/t Core: </label>
                <input type="number" class="form-control" placeholder="Enter Kg/t Core" id="new_product_Kg_t_core" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>              
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_Kg_t_ind"> Kg/t Ind: </label>
                <input type="number" class="form-control" placeholder="Enter Kg/t Ind" id="new_product_Kg_t_ind" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_Lotes_con_prequema"> Lotes con prequema (si o no): </label>
                <select class="form-control" placeholder="Select Lotes con prequema (si o no)" id="new_product_Lotes_con_prequema" required>
                  <option value="si"> si </option>
                  <option value="no"> no </option>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_area_cosechada_ant"> Area cosechada ant: </label>
                <input type="number" class="form-control" placeholder="Enter Area cosechada ant" id="new_product_area_cosechada_ant" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_tons_ant"> Tons ant: </label>
                <input type="number" class="form-control" placeholder="Enter Tons ant" id="new_product_tons_ant" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_TCH_ant"> TCH ant: </label>
                <input type="number" class="form-control" placeholder="Enter TCH ant" id="new_product_TCH_ant" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_area_moler_est"> Area a moler est: </label>
                <input type="number" class="form-control" placeholder="Enter Area a moler est" id="new_product_area_moler_est" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_tons_estimadas"> Tons Estimadas: </label>
                <input type="number" class="form-control" placeholder="Enter Tons Estimadas" id="new_product_tons_estimadas" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_dif_tons_ant_vrs_tons_est"> Dif Tons ant Vrs Tons est: </label>
                <input type="number" class="form-control" placeholder="Enter Dif Tons ant Vrs Tons est" id="new_product_dif_tons_ant_vrs_tons_est" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_dif_TCH_ant_vrs_TCH_est"> Dif TCH ant Vrs  TCH est: </label>
                <input type="number" class="form-control" placeholder="Enter Dif TCH ant Vrs  TCH est" id="new_product_dif_TCH_ant_vrs_TCH_est" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_MES_IDEAL"> MES IDEAL: </label>
                <input type="text" class="form-control" placeholder="Enter MES IDEAL" id="new_product_MES_IDEAL" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_VARIEDAD_IDEAL"> VARIEDAD IDEAL: </label>
                <input type="text" class="form-control" placeholder="Enter VARIEDAD IDEAL" id="new_product_VARIEDAD_IDEAL" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_id_altitud"> id altitud: </label>
                <input type="text" class="form-control" placeholder="Enter id altitud" id="new_product_id_altitud" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_tipo_de_suelo"> Tipo de suelo: </label>
                <input type="number" class="form-control" placeholder="Enter Tipo de suelo" id="new_product_tipo_de_suelo" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_TERCIO"> TERCIO: </label>
                <input type="text" class="form-control" placeholder="Enter TERCIO" id="new_product_TERCIO" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_dano_de_chinche"> Daño de chinche: </label>
                <input type="text" class="form-control" placeholder="Enter Daño de chinche" id="new_product_dano_de_chinche" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_trash"> trash: </label>
                <input type="text" class="form-control" placeholder="Enter trash" id="new_product_trash" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_cana_seca_podrida"> caña seca + podrida: </label>
                <input type="text" class="form-control" placeholder="Enter caña seca + podrida" id="new_product_cana_seca_podrida" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_VARIEDAD_IDEAL"> f.maxima corte y siembra: </label>
                <input type="text" class="form-control" placeholder="Enter VARIEDAD IDEAL" id="new_product_VARIEDAD_IDEAL" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_VARIEDAD_IDEAL"> VARIEDAD IDEAL: </label>
                <input type="text" class="form-control" placeholder="Enter VARIEDAD IDEAL" id="new_product_VARIEDAD_IDEAL" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_VARIEDAD_IDEAL"> VARIEDAD IDEAL: </label>
                <input type="text" class="form-control" placeholder="Enter VARIEDAD IDEAL" id="new_product_VARIEDAD_IDEAL" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_VARIEDAD_IDEAL"> VARIEDAD IDEAL: </label>
                <input type="text" class="form-control" placeholder="Enter VARIEDAD IDEAL" id="new_product_VARIEDAD_IDEAL" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group col col-md-6 col-lg-6 col-xs-12">
                <label for="new_product_VARIEDAD_IDEAL"> VARIEDAD IDEAL: </label>
                <input type="text" class="form-control" placeholder="Enter VARIEDAD IDEAL" id="new_product_VARIEDAD_IDEAL" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
            </div>
            <button id="product-add-submit-btn" type="submit" style="display: none"> Submit </button>
          </form>
        </div>
        <div class="modal-footer">
          <button id="product-add-btn" class="btn btn-primary"> Add </button>&nbsp;
          <button id="product-add-close-btn" type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
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
