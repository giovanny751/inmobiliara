
<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> <?php echo strtoupper($titulo); ?></h5>
</div>
<div class='well'>
    
<form action="<?php echo base_url('index.php/ingresoform/guardar_emp/'); ?>" onsubmit="return obligatorio('1')" method="post">
    <div class="row" >
        <!--    <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px">-->
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <label>Nombre/Razón Social</label>
                <input type="text" name="emp_razonSocial" value="<?php echo $empresa[0]->emp_razonSocial; ?>" id="emp_razonSocial" class="form-control obligatorio">

            </div>
            <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                <label>Nit</label>
                <input type="text" name="emp_nit" id="emp_nit" value="<?php echo $empresa[0]->emp_nit; ?>" class="form-control obligatorio" placeholder="NIT" >
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                <label>Tipo de Empresa</label>
                <select name="emp_idTipo"  id="emp_idTipo" class="form-control">
                    <option value="">-Seleccionar-</option>
                    <option value="2" <?php echo ((($empresa[0]->emp_idTipo) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                    <option value="1" <?php echo ((($empresa[0]->emp_idTipo) == 1) ? "selected='selected'" : ""); ?> >SI</option>
                </select>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                <label>Segmento a la que pertenece</label>
                <select class="form-control" name="emp_segmento" id="emp_segmento">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($segmento as $segment) {
                        if ($empresa[0]->emp_segmento == $segment['seg_id'])
                            $select = 'selected';
                        else
                            $select = '';
                        ?>
                        <option <?php echo $select; ?> value="<?php echo $segment['seg_id']; ?>"><?php echo $segment['seg_nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                <label>Actividad Economica (CIIU)</label><select name="emp_ciiu1" id="emp_ciiu1" class="form-control obligatorio">
                    <option value="">Grupo :: Clase :: Descripción</option>
                    <?php
                    for ($i = 0; $i < count($ciiu); $i++) {
                        if (!empty($ciiu[$i]->ciiu_grupo)) {
                            if ($i != 0) {
                                ?>
                                </optgroup>
                            <?php } ?>
                            <optgroup label="<?php echo $ciiu[$i]->ciiu_description; ?>">
                                <?php
                            } else {

                                if ($empresa[0]->emp_ciiu1 == $ciiu[$i]->ciiu_id) {
                                    $sele = "selected='selected'";
                                } else {
                                    $sele = "";
                                }
                                ?>
                                <option <?php echo $sele; ?> value="<?php echo $ciiu[$i]->ciiu_id; ?>"><?php echo $ciiu[$i]->ciiu_grupo . " :: " . $ciiu[$i]->ciiu_clase . " :: " . $ciiu[$i]->ciiu_description; ?></option>
                                <?php
                            }
                        }
                        ?>    </optgroup>
                </select>

            </div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                <label>Actividad Economica Secundaria (CIIU)</label>
                <select name="emp_ciiu2" id="emp_ciiu2" class="form-control">
                    <option value="">Grupo :: Clase :: Descripción</option>
                    <?php
                    for ($i = 0; $i < count($ciiu); $i++) {
                        if (!empty($ciiu[$i]->ciiu_grupo)) {
                            if ($i != 0) {
                                ?>
                                </optgroup>
                            <?php } ?>
                            <optgroup label="<?php echo $ciiu[$i]->ciiu_description; ?>">
                                <?php
                            } else {
                                if ($empresa[0]->emp_ciiu2 == $ciiu[$i]->ciiu_id) {
                                    $sele = "selected='selected'";
                                } else {
                                    $sele = "";
                                }
                                ?>
                                <option <?php echo $sele; ?> value="<?php echo $ciiu[$i]->ciiu_id; ?>"><?php echo $ciiu[$i]->ciiu_grupo . " :: " . $ciiu[$i]->ciiu_clase . " :: " . $ciiu[$i]->ciiu_description; ?></option>
                                <?php
                            }
                        }
                        ?>    </optgroup>
                </select>

            </div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                <label>Telefono</label>
                <input type="text" name="emp_telefono" value="<?php echo $empresa[0]->emp_telefono; ?>" id="emp_telefono" placeholder="TELEFONO" class="form-control obligatorio">
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                <label>Direccion Principal</label>
                <input type="text" name="emp_direccion" value="<?php echo $empresa[0]->emp_direccion; ?>" id="emp_direccion" placeholder="DIRECCION" class="form-control obligatorio">
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                <label>Sucursales</label>
                <select name="emp_sucursal"  id="emp_sucursal" class="form-control">
                    <option value="">-Seleccionar-</option>
                    <option value="2" <?php echo ((($empresa[0]->emp_sucursal) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                    <option value="1" <?php echo ((($empresa[0]->emp_sucursal) == 1) ? "selected='selected'" : ""); ?> >SI</option>
                </select> 
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <label>Direcciones Sucursales</label>
                <input type="text" name="emp_direccioSuc" value="<?php echo $empresa[0]->emp_direccioSuc; ?>" id="emp_direccioSuc" placeholder="DIRECCION" class="form-control obligatorio">
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <label>Nombre del Representante Legal</label>
                <input type="text" name="emp_nombre_repre" value="<?php echo $empresa[0]->emp_nombre_repre; ?>" id="emp_nombre_repre" placeholder="REPRESENTANTE" class="form-control obligatorio">
            </div>
            <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                <label>Cedula de Ciudadania</label>
                <input type="text" name="emp_numDocRepre" value="<?php echo $empresa[0]->emp_numDocRepre; ?>" id="emp_numDocRepre" placeholder="CEDULA" class="form-control obligatorio">
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <center><b>No Actual de Vehiculos</b></center>  
        </div>  
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">  
            <!--<div class="row">-->
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                    <label>Propios</label>
                    <input type="text" name="emp_vehiculosPropios" value="<?php echo $empresa[0]->emp_vehiculosPropios; ?>" id="emp_vehiculosPropios" disabled="disabled" class="form-control obligatorio">
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                    <label>Contratistas</label>
                    <!--<input type="text" class="form-control obligatorio" id="emp_vehiculosContratados" value="<?php echo $empresa[0]->emp_vehiculosContratados; ?>" name="emp_vehiculosContratados">-->
                    <input type="text" name="emp_vehiculosContratados" value="<?php echo $empresa[0]->emp_vehiculosContratados; ?>" id="emp_vehiculosContratados" disabled="disabled"  class="form-control obligatorio">
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                    <label>Administrados</label>

                    <input type="text" name="emp_numeroVehiculoAdministra" value="<?php echo $empresa[0]->emp_numeroVehiculoAdministra; ?>" id="emp_numeroVehiculoAdministra" disabled="disabled" class="form-control obligatorio">
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                    <label>Total</label><input disabled="disabled" type="text"  value="<?php echo $totalvehiculos[0]->total; ?>"  class="form-control">
                </div>
            <!--</div>-->
        </div>
        <!--<div class="row">-->
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <center>No Actual de Conductores</center>
            </div>    
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                    <label>Propios</label>
                    <input type="text" name="emp_numActConductores" value="<?php echo $empresa[0]->emp_numActConductores; ?>" id="emp_numActConductores" disabled="disabled" class="form-control obligatorio">
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                    <label>Contratistas</label>
                    <input type="text" name="emp_numActConductores" value="<?php echo $empresa[0]->emp_numActConductores; ?>" id="emp_numActConductores" disabled="disabled" class="form-control obligatorio">
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                    <label>Administrados</label>
                    <input type="text" name="emp_numActConductoresAdministra" value="<?php echo $empresa[0]->emp_numActConductoresAdministra; ?>" id="emp_numActConductoresAdministra" disabled="disabled" class="form-control obligatorio">
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                    <label>Total</label><input disabled="disabled" type="text" value="<?php echo $conductores[0]->total; ?>"  class="form-control">
                </div>
            </div>
        <!--</div>-->
    </div>
    <br>
    <hr>
    <br>
    <!--<div class="row" >-->
        <!--<div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">-->

        <div class="row">
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                <label>¿Cuentan con ARL?</label>
                <select name="emp_idArl"  id="emp_idArl" class="form-control">
                    <option value="">-Seleccionar-</option>
                    <option value="2" <?php echo ((($empresa[0]->emp_idArl) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                    <option value="1" <?php echo ((($empresa[0]->emp_idArl) == 1) ? "selected='selected'" : ""); ?> >SI</option>
                </select>
            </div>
            <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                <label>Cual?</label>
                <input type="text" name="emp_Arl_otra" value="<?php echo $empresa[0]->emp_Arl_otra; ?>" id="emp_Arl_otra" class="form-control">
            </div>
            <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                <label>¿actualente con HSEQ?</label>
                <select name="emp_hseq"  id="emp_hseq" class="form-control">
                    <option value="">-Seleccionar-</option>
                    <option value="2" <?php echo ((($empresa[0]->emp_hseq) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                    <option value="1" <?php echo ((($empresa[0]->emp_hseq) == 1) ? "selected='selected'" : ""); ?> >SI</option>
                </select>
            </div>
            <div class="col-lg-5 col-sm-5 col-xs-5 col-md-5">
                <label>¿Cuenta con un procedimiento para seleccion de conductores?</label>
                <select name="emp_seleccionConductores"  id="emp_seleccionConductores" class="form-control">
                    <option value="">-Seleccionar-</option>
                    <option value="2" <?php echo ((($empresa[0]->emp_seleccionConductores) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                    <option value="1" <?php echo ((($empresa[0]->emp_seleccionConductores) == 1) ? "selected='selected'" : ""); ?> >SI</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <label>¿Realiza pruebas de ingreso a los conductores?</label>
                <select name="emp_ingresoConductores"  id="emp_ingresoConductores" class="form-control">
                    <option value="">-Seleccionar-</option>
                    <option value="2" <?php echo ((($empresa[0]->emp_ingresoConductores) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                    <option value="1" <?php echo ((($empresa[0]->emp_ingresoConductores) == 1) ? "selected='selected'" : ""); ?> >SI</option>
                </select>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                <label> Examenes Medicos</label>
                <input type="checkbox" name="emp_examenesMedicos"  value="1" id="emp_examenesMedicos"  <?php echo ((($empresa[0]->emp_examenesMedicos) == 1) ? 'checked="checked"' : ''); ?>>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                <label>Prueba Teorica</label>
                <input type="checkbox" name="emp_pruebasTeoricas" value="1" id="emp_pruebasTeoricas"  <?php echo ((($empresa[0]->emp_pruebasTeoricas) == 1) ? 'checked="checked"' : 'dddd'); ?>>
            </div>
            <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                <label>Examentes psocosensometricos</label>
                <input type="checkbox" name="emp_examenesPsicosensometricos" id="emp_examenesPsicosensometricos" value="1" class="form-control " <?php echo ((($empresa[0]->emp_examenesPsicosensometricos) == 1) ? 'checked="checked"' : ''); ?>>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                <label>Prueba tactica</label>
                <input type="checkbox" name="emp_pruebaTactica" id="emp_pruebaTactica"  value="1" <?php echo ((($empresa[0]->emp_pruebaTactica) == 1) ? 'checked="checked"' : ''); ?>>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                <label>¿realiza capacitacion en seguridad vial?</label>
                <select name="emp_capacitaPruebaVial"  id="emp_capacitaPruebaVial" class="form-control">
                    <option value="">-Seleccionar-</option>
                    <option value="2" <?php echo ((($empresa[0]->emp_capacitaPruebaVial) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                    <option value="1" <?php echo ((($empresa[0]->emp_capacitaPruebaVial) == 1) ? "selected='selected'" : ""); ?> >SI</option>
                </select>
            </div>
        </div>

    <!--</div>-->
    <br>
    <hr>
    <br>
    <div class="row" >
        <!--<div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">-->
        <div class="col-md-7 col-lg-7">
            <label>¿cuenta con un procedimiento de atencion a victimas en caso de accidente y/o incidentes de transito?</label>
            <select name="emp_procedimientoAtencion"  id="emp_procedimientoAtencion" class="form-control">
                <option value="">-Seleccionar-</option>
                <option value="2" <?php echo ((($empresa[0]->emp_procedimientoAtencion) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                <option value="1" <?php echo ((($empresa[0]->emp_procedimientoAtencion) == 1) ? "selected='selected'" : ""); ?> >SI</option>
            </select>
        </div>
        <div class="col-md-5 col-lg-5">
            <label>¿posee historicos de acciodentes y/o incidentes de transito?</label>
            <select name="emp_historicoAccidente"  id="emp_historicoAccidente" class="form-control">
                <option value="">-Seleccionar-</option>
                <option value="2" <?php echo ((($empresa[0]->emp_historicoAccidente) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                <option value="1" <?php echo ((($empresa[0]->emp_historicoAccidente) == 1) ? "selected='selected'" : ""); ?> >SI</option>
            </select>
        </div>
        <br>
        <hr>
        <br>
        <div class="col-md-12 col-lg-12">
            <input type="hidden" value="<?php echo $id; ?>" id="emp_id" name="emp_id">
            <center>
                <button class="guardar btn btn-success">Guardar</button>
            </center>
        </div>
    </div>
</form>
</div>
<script>
    datos = "";
    $('#emp_nit').validCampoFranz('0123456789');
    $('#emp_idArl').change(function() {
        arl();
    });
    function arl(){
        var desp = $('#emp_idArl').val();
        if (desp == 2) {
            $('#emp_Arl_otra').attr('disabled', true);
            if (($('#emp_Arl_otra').val()) != "")
                datos = $('#emp_Arl_otra').val();
            $('#emp_Arl_otra').val('');
            $('#emp_Arl_otra').attr('class','form-control');
        } else {
            if(datos!="")
            $('#emp_Arl_otra').val(datos);
            $('#emp_Arl_otra').attr('class','form-control obligatorio');
            $('#emp_Arl_otra').attr('disabled', false);
        }
    }
    arl();
    $('#emp_ingresoConductores').change(function(e) {
        activar()
    });
    activar()
    function activar() {
        var desp = $('#emp_ingresoConductores').val();
        if (desp == 2) {
            $('#emp_examenesMedicos').prop('checked', false).attr('disabled', true);
            $('#emp_pruebasTeoricas').prop('checked', false).attr('disabled', true);
            $('#emp_examenesPsicosensometricos').prop('checked', false).attr('disabled', true);
            $('#emp_pruebaTactica').prop('checked', false).attr('disabled', true);
        } else {
            $('#emp_examenesMedicos').attr('disabled', false);
            $('#emp_pruebasTeoricas').attr('disabled', false);
            $('#emp_examenesPsicosensometricos').attr('disabled', false);
            $('#emp_pruebaTactica').attr('disabled', false);
        }
    }

    $('#emp_nit').change(function() {
        var num = $(this).val();
        console.log(num);
        if (isNaN(num)) {
            $('#emp_nit').val('');
            alert('Dato no correcto.')
            return  false;
        }

        var url = base_url_js + "index.php/ingresoform/confir_nit";
        var emp_nit = $(this).val();
        if (emp_nit != "") {
            $.post(url, {emp_nit, emp_nit})
                    .done(function(msg) {
                        if (msg > 0) {
                            alert('El Nit ya se Encuentra Registrado en el Sistema')
                            $('#emp_nit').val('');
                        }
                    }).fail(function(msg) {

            })
        }
    });


</script>