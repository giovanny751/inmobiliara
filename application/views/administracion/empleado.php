<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<?php // echo $usuario[0]['gruTra_id'];die;    ?>
<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> ACTUALIZACIÓN DE DATOS</h5>
</div>
<div class='well'>
    <form method="post" id="fusuario" action='<?php echo base_url('index.php/administracion/guardarempleado'); ?>' onsubmit="return obligatorio('1')">
        <input type="hidden" value="<?php echo $funcionario; ?>" name="funcionario">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="car_id">Cargo</label>
                <select id="car_id" name="car_id" class="form-control">
                    <option value=""></option>
                    <?php
                    foreach ($cargos as $cargo) {
                        if ($cargo['car_id'] == $usuario[0]['car_id'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?> value="<?php echo $cargo['car_id'] ?>"><?php echo $cargo['car_nombre']; ?></option>
                    <?php } ?>
                </select> 
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="gruTra_id">Grupo de trabajo</label>
                <select id="gruTra_id" name="gruTra_id" class="form-control"> 
                    <option value=""></option>
                    <?php
                    foreach ($grupotrabajo as $grupo) {
                        if ($grupo['gruTra_id'] == $usuario[0]['gruTra_id'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value="<?php echo $grupo['gruTra_id'] ?>"><?php echo $grupo['gruTra_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_nombres">Nombre</label><input value="<?php echo $usuario[0]['usu_nombres'] ?>" type='text' class="form-control obligatorio" name="usu_nombres" id="usu_nombres">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_segundonombre">Segundo nombre</label><input type='text' value="<?php echo $usuario[0]['usu_segundonombre'] ?>" class="form-control obligatorio" name="usu_segundonombre" id="usu_segundonombre">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_apellido">Apellido</label><input type='text' class="form-control obligatorio" value="<?php echo $usuario[0]['usu_apellido'] ?>"  name="usu_apellido" id="usu_apellido">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_segundoapellido">Segundo apellido</label><input type='text' class="form-control obligatorio" value="<?php echo $usuario[0]['usu_segundoapellido'] ?>" name="usu_segundoapellido" id="usu_segundoapellido">
            </div>
        </div>
        <div class="row">
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_cc">Identificación</label><input type="text" value="<?php echo $usuario[0]['usu_cc'] ?>" class="form-control obligatorio" name="usu_cc" id="usu_cc">
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_fecha_expedicion_cc">Fecha de expedición documento</label>
                <input type="text"  value="<?php echo $usuario[0]['usu_fecha_expedicion_cc'] ?>" class="form-control fecha" name="usu_fecha_expedicion_cc" id="usu_fecha_expedicion_cc">
            </div>
            <div  class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="gen_id">Genero</label>
                <select id="gen_id" name="gen_id"  class="form-control">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($genero as $sexo) {
                        if ($sexo['gen_id'] == $usuario[0]['gen_id'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?> value="<?php echo $sexo['gen_id'] ?>"><?php echo $sexo['gen_genero'] ?></option>
                    <?php } ?>
                </select> 
            </div>
            <div  class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <label for="usu_edad">Edad</label>
                <input type="text" class="form-control obligatorio" value="<?php echo $usuario[0]['usu_edad'] ?>"  name="usu_edad" id="usu_edad">

            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_fecha_nacimiento">Fecha nacimiento</label><input type="text" value="<?php echo $usuario[0]['usu_fecha_nacimiento'] ?>" class="form-control obligatorio" name="usu_fecha_nacimiento" id="usu_fecha_nacimiento">
            </div>
        </div>
        <div class="row">
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="ciu_id">Ciudad donde labora
                </label>
                <select id="ciu_id" name="ciu_id" class="form-control">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($ciudad as $ciu) {
                        if ($ciu['ciu_id'] == $usuario[0]['ciu_id'])
                            $select = "selected";
                        else
                            $select = "";
                        ?>
                        <option <?php echo $select; ?>  value="<?php echo $ciu['ciu_id']; ?>"><?php echo $ciu['ciu_nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_celular">Celular</label>
                <input type="text" value="<?php echo $usuario[0]['usu_celular'] ?>" class="form-control obligatorio" name="usu_celular" id="usu_celular">
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_telF">Telefono</label>
                <input type="text" class="form-control obligatorio"  value="<?php echo $usuario[0]['usu_telF'] ?>" name="usu_telF" id="usu_telF">
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_correo">Correo</label>
                <input type="text" disabled="disabled"  value="<?php echo $usuario[0]['usu_correo'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <hr>
        </div><br>
        <div  class="row">
            <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="tipCon_id">Tipo de Contrato</label>
                <select class="form-control" id="tipCon_id" name="tipCon_id">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($tipocontrato as $tipo) {
                        if ($tipo['tipCon_id'] == $usuario[0]['tipCon_id'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value='<?php echo $tipo['tipCon_id']; ?>'><?php echo $tipo['tipCon_nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="usu_confir_eps">Tiene EPS</label>
                <select class="form-control obligatorio" name="usu_confir_eps" id="usu_confir_eps">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $desicion) {
                        if ($desicion['con_id'] == $usuario[0]['usu_confir_eps'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="usu_confir_pension">Cotiza sistema Pension</label>
                <select class="form-control obligatorio" name="usu_confir_pension" id="usu_confir_pension">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $desicion) {
                        if ($desicion['con_id'] == $usuario[0]['usu_confir_pension'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div  class="row">
            <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="usu_confir_arl">Tiene ARL</label>
                <select  class="form-control" id="usu_confir_arl" name="usu_confir_arl">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $desicion) {
                        if ($desicion['con_id'] == $usuario[0]['usu_confir_arl'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="usu_confir_caja_compensacio">Tiene caja compensación</label>
                <select class="form-control obligatorio" name="usu_confir_caja_compensacio" id="usu_confir_caja_compensacio">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $desicion) {
                        if ($desicion['con_id'] == $usuario[0]['usu_confir_arl'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_desplazamiento_mision">Realiza desplazamientos en misión</label>
                <select  class="form-control" id="usu_desplazamiento_mision" name="usu_desplazamiento_mision">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $desicion) {
                        if ($desicion['con_id'] == $usuario[0]['usu_desplazamiento_mision'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_rol_mision">Cual es su rol en la via en mision</label>
                <select  class="form-control" name="usu_rol_mision" id="usu_rol_mision">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($rol as $roles) {
                        if ($usuario[0]['usu_rol_mision'] == $roles['rol_id'])
                            $select = "selected";
                        else
                            $select = "";
                        ?>
                        <option <?php echo $select; ?> value="<?php echo $roles['rol_id'] ?>"><?php echo $roles['rol_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_frecuenciadesmision">Frecuencia desplazamiento en mision</label>
                <select  class="form-control" name="usu_frecuenciadesmision" id="usu_frecuenciadesmision">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($frecuencia as $frecuenciamision) {
                        if ($frecuenciamision['freDes_id'] == $usuario[0]['usu_frecuenciadesmision'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value="<?php echo $frecuenciamision['freDes_id'] ?>"><?php echo $frecuenciamision['freDes_nombre'] ?></option>
                    <?php } ?>
                </select>                   
                </select>
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_tipo_despla_mision">Tipo de desplazamiento en mision</label>
                <select  class="form-control" name="usu_tipo_despla_mision" id="usu_tipo_despla_mision">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($tipodesplazamiento as $desplazamiento) {
                        if ($desplazamiento['tipDes_id'] == $usuario[0]['usu_tipo_despla_mision'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?> value="<?php echo $desplazamiento['tipDes_id'] ?>"><?php echo $desplazamiento['tipDes_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="usu_rol_via">Rol en la via en in-itiniere(Hogar-Trabajo-Hogar)</label>
                <select  class="form-control" id="usu_rol_via" name="usu_rol_via">
                    <option value="">-Seleccionar-</option>
                    <option <?php if ($usuario[0]['usu_rol_via'] == "Peaton") echo 'selected'; ?> value="Peaton">Peaton</option>
                    <option <?php if ($usuario[0]['usu_rol_via'] == "Pasajero") echo 'selected'; ?> value="Pasajero">Pasajero</option>
                    <option <?php if ($usuario[0]['usu_rol_via'] == "Conductor") echo 'selected'; ?> value="Conductor">Conductor</option>
                </select>
            </div>
            <div  class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="usu_nro_diaro_recorrido">No recorridos diarios</label>
                <select class="form-control obligatorio" name="usu_nro_diaro_recorrido" id="usu_nro_diaro_recorrido">
                    <option value="">-Seleccionar-</option>
                    <?php
                    for ($i = 0; $i < 21; $i++) {
                        if ($i == $usuario[0]['usu_nro_diaro_recorrido'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
                        <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="usu_tipo_transporte">Tipo de transporte usado en el despazamiento in-itinere(Hogar-Trabajo-Hogar)</label>
                <select name="usu_tipo_transporte" id="usu_tipo_transporte" class="form-control">
                    <option value=''>-Seleccionar-</option>
                    <?php
                    foreach ($tipotrasporte as $transporte) {
                        if ($transporte['tipTra_id'] == $usuario[0]['usu_tipo_transporte'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>                    
                        <option <?php echo $selec; ?>  value='<?php echo $transporte['tipTra_id']; ?>'><?php echo $transporte['tipTra_nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <hr>
        </div>
        <b>Si en alguno de los desplazamientos su rol es conductor conteste:</b>
        <div class="row">
            <hr>
        </div>
        <div class="row">

            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="tipVeh_id">Tipo de vehiculo que conduce</label>
                <select id="tipVeh_id" class="form-control" name="tipVeh_id">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($tipovehiculo as $tipo) {
                        if ($tipo['tipVeh_id'] == $usuario[0]['tipVeh_id'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value="<?php echo $tipo['tipVeh_id'] ?>"><?php echo $tipo['tipVeh_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="cat_id">Categoria licencia conduccion</label>
                <select class="form-control" name="cat_id" id="cat_id">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($categoria as $categorias) {
                        if ($categorias['cat_id'] == $usuario[0]['cat_id'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value="<?php echo $categorias['cat_id'] ?>"><?php echo $categorias['cat_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_fecha_vigencia_licencia">Fecha de expedición</label>
                <input type="text" value="<?php echo $usuario[0]['usu_fecha_vigencia_licencia'] ?>"  class="form-control fecha" name="usu_fecha_vigencia_licencia" id="usu_fecha_vigencia_licencia">
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_fecha_vigencialic">Fecha de vencimiento</label>
                <input type="text"  value="<?php echo $usuario[0]['usu_fecha_vigencia_licencia'] ?>" class="form-control obligatorio fecha" name="usu_fecha_vigencialic" id="usu_fecha_vigencialic">
                <!--<input type="text" value="<?php echo $usuario[0]['usu_fecha_vigencia_licencia'] ?>" class="form-control fecha" name="usu_fecha_vigencialic" id="usu_fecha_vigencialic">-->
            </div>
        </div>
        <div class="row">
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_experiecia_anos">Experiencia en años de conduccion</label>
                <select class="form-control" name="usu_experiecia_anos" id="usu_experiecia_anos">
                    <option value="">-Seleccionar-</option>
                    <?php
                    for ($i = 1; $i < 50; $i++) {
                        if ($i == $usuario[0]['usu_experiecia_anos'])
                            $select = "selected";
                        else
                            $select = "";
                        ?>
                        <option <?php echo $select; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_estado_conductor">Estado Conductor</label>
                <select class="form-control" name="estCon_id" id="estCon_id">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($estadoconductor as $estado) {
                        if ($estado['estCon_id'] == $usuario[0]['estCon_id'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value='<?php echo $estado['estCon_id']; ?>'><?php echo $estado['estCon_nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_estado_conductor">Restricciones del conductor</label>
                <select class="form-control" name="res_id" id="res_id">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($restricciones as $res) {
                        if ($res['res_id'] == $usuario[0]['res_id'])
                            $selec = "selected";
                        else
                            $selec = "";
                        ?>
                        <option <?php echo $selec; ?>  value='<?php echo $res['res_id']; ?>'><?php echo $res['res_nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="usu_runt_num">No de Inscripcion ante el RUNT</label>
                <input type="text" value="<?php echo $usuario[0]['usu_runt_num'] ?>" class="form-control" name="usu_runt_num" id="usu_runt_num">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_comparendos">Deudas de comparendos</label>
                <select id="veh_comparendos" name="veh_comparendos" class='form-control'>
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $usuario[0]['veh_comparendos'] )
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <hr>
        <div class="row">
            <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <p class="alert alert-info" align="center">
                    Principales factores de riesgo con los que se encuentra (tanto en mision como ida y vuelta al domicilio)
                </p>
                <div class="table-responsive ">
                    <table class="table table-responsive table-striped table-bordered" >
                        <?php
                        foreach ($factoresriesgo as $factores) {
                            if (!empty($factores['facUsu_id']))
                                $select = 'checked';
                            else
                                $select = '';
                            ?>
                            <tr>
                                <td><?php echo $factores['facRis_nombre']; ?></td>
                                <td><input <?php echo $select; ?> type="checkbox" name="facRis_id[]" class="icheckbox_minimal-blue checked" value="<?php echo $factores['facRis_id']; ?>"></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <p class="alert alert-info"  align="center">Causas que motivan riesgo</p>
                <div class="table-responsive ">
                    <table class="table table-responsive table-striped table-bordered">
                        <?php
                        foreach ($causas as $causa) {
                            if (!empty($causa['cauUsu_id']))
                                $select = 'checked';
                            else
                                $select = '';
                            ?>
                            <tr>
                                <td><?php echo $causa['cau_nombre'] ?></td>
                                <td><input  <?php echo $select; ?>  type="checkbox" name="cau_id[]" class="icheckbox_minimal-blue checked" value=" <?php echo $causa['cau_id'] ?>"></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" align="right">
            <button   class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
<script>
        $(".fecha").datepicker({
            dateFormat: "dd/mm/yy"
        });

        $('#validar').click(function() {
            //Utilizamos una expresion regular
            var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

            //Se utiliza la funcion test() nativa de JavaScript
            if (regex.test($('#email').val().trim())) {
                alert('Correo validado');
            }
            else {
                alert('La direccion de correo no es valida');
            }
        });
        
        function CalculateDateDiff(dateFrom, dateTo) {
            var difference = (dateTo - dateFrom);

            var years = Math.floor(difference / (1000 * 60 * 60 * 24 * 365));
            difference -= years * (1000 * 60 * 60 * 24 * 365);
            var months = Math.floor(difference / (1000 * 60 * 60 * 24 * 30.4375));

            var dif = '';
            if (years > 0)
                dif = years ;

//            if (months > 0) {
//                if (years > 0) dif += ' y ';
//                dif += months + ' meses';
//            }
            $('#usu_edad').val(dif);
            return dif;
//            document.write('<p>Diferencia entre las fechas: ' + dif + '</p>');
        }
        
        
        
                $("#usu_fecha_nacimiento").datepicker({
            dateFormat: "dd/mm/yy",
            altField: '#datepicker_value1',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', ' Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            dayNamesMin: ["Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
            onSelect: function(dateText, inst) {
                var fecha = $(this).val().split('/');
               console.log( CalculateDateDiff(new Date(fecha[2]+"/"+fecha[1]+"/"+fecha[0]), new Date()));
               
            }});
        
//        $('#usu_fecha_nacimiento').change(function() {
//            fecha = new Date($('#usu_fecha_nacimiento').val())
//            hoy = new Date()
//            ed = parseInt((hoy - fecha) / 365 / 24 / 60 / 60 / 1000)
//            console.log(ed)
//            document.getElementById('usu_edad').value = ed;
//        })

</script>    