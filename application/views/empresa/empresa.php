
<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> <?php echo strtoupper($titulo); ?></h5>
</div>
<div class='well'>

    <form action="<?php echo base_url('index.php/ingresoform/guardar_emp/'); ?>" onsubmit="return obligatorio('1')" method="post">
        <div class="row" >
            <!--    <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px">-->
            <div class="large-12 columns">
                <div class="large-6 columns">
                    <label>Nombre/Razón Social</label>
                    <input type="text" name="emp_razonSocial" value="<?php echo $empresa[0]->emp_razonSocial; ?>" id="emp_razonSocial" class="form-control obligatorio">

                </div>
                <div class="large-6 columns">
                    <label>Nit</label>
                    <input type="text" name="emp_nit" id="emp_nit" value="<?php echo $empresa[0]->emp_nit; ?>" class="form-control obligatorio" placeholder="NIT" >
                </div>

            </div>
        </div>
        <div class="row" >
            <div class="large-12 columns">
                <div class="large-6 columns">
                    <label>Tipo de Empresa</label>
                    <select name="emp_idTipo"  id="emp_idTipo" class="form-control">
                        <option value="">-Seleccionar-</option>
                        <option value="2" <?php echo ((($empresa[0]->emp_idTipo) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                        <option value="1" <?php echo ((($empresa[0]->emp_idTipo) == 1) ? "selected='selected'" : ""); ?> >SI</option>
                    </select>
                </div>
                <div class="large-6 columns">
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
        </div>
        <div class="large-12 columns">
            <div class="large-3 columns">
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
            <div class="large-3 columns">
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
            <div class="large-3 columns">
                <label>Telefono</label>
                <input type="text" name="emp_telefono" value="<?php echo $empresa[0]->emp_telefono; ?>" id="emp_telefono" placeholder="TELEFONO" class="form-control obligatorio">
            </div>
            <div class="large-3 columns">
                <label>Direccion Principal</label>
                <input type="text" name="emp_direccion" value="<?php echo $empresa[0]->emp_direccion; ?>" id="emp_direccion" placeholder="DIRECCION" class="form-control obligatorio">
            </div>
        </div>
        <div class="large-12 columns">
            <div class="large-2 columns">
                <label>Sucursales</label>
                <select name="emp_sucursal"  id="emp_sucursal" class="form-control">
                    <option value="">-Seleccionar-</option>
                    <option value="2" <?php echo ((($empresa[0]->emp_sucursal) == 2) ? "selected='selected'" : ""); ?> >NO</option>
                    <option value="1" <?php echo ((($empresa[0]->emp_sucursal) == 1) ? "selected='selected'" : ""); ?> >SI</option>
                </select> 
            </div>
            <div class="large-4 columns">
                <label>Direcciones Sucursales</label>
                <input type="text" name="emp_direccioSuc" value="<?php echo $empresa[0]->emp_direccioSuc; ?>" id="emp_direccioSuc" placeholder="DIRECCION" class="form-control obligatorio">
            </div>
            <div class="large-4 columns">
                <label>Nombre del Representante Legal</label>
                <input type="text" name="emp_nombre_repre" value="<?php echo $empresa[0]->emp_nombre_repre; ?>" id="emp_nombre_repre" placeholder="REPRESENTANTE" class="form-control obligatorio">
            </div>
            <div class="large-2 columns">
                <label>Cedula de Ciudadania</label>
                <input type="text" name="emp_numDocRepre" value="<?php echo $empresa[0]->emp_numDocRepre; ?>" id="emp_numDocRepre" placeholder="CEDULA" class="form-control obligatorio">
            </div>
        </div>
</div>

<div class="row" >
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