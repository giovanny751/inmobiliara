<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> AGREGAR VEHICULOS</h5>
</div>


<div class='well'>
    <form method="post" action="<?php echo base_url('index.php/administracion/guardarvehiculo'); ?>" onsubmit="return obligatorio('1')" >
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="tipVeh_id">Tipo Vehículo</label>
                <select id="tipVeh_id" name="tipVeh_id" class="form-control obligado" class="obligatorio">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($tipovehiculo as $tipo) {
                        if ($tipo['tipVeh_id'] == $vehiculo[0]->tipVeh_id)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $tipo['tipVeh_id'] ?>"><?php echo $tipo['tipVeh_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="tipSer_id">Tipo Servicio</label>
                <select id="tipSer_id" name="tipSer_id" class="form-control obligado">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($tiposervicio as $tiposer) {
                        if ($tiposer['tipSer_id'] == $vehiculo[0]->tipSer_id)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $tiposer['tipSer_id'] ?>"><?php echo $tiposer['tipSer_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="tipVin_id">Tipo Vinculación</label>
                <select id="tipVin_id" name="tipVin_id" class="form-control obligado">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($tipovinculacion as $tipovin) {
                        if ($tipovin['tipVin_id'] == $vehiculo[0]->tipVin_id)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $tipovin['tipVin_id'] ?>"><?php echo $tipovin['tipVin_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_placa">Placa</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_placa)) echo $vehiculo[0]->veh_placa ?>" class="form-control obligado" name="veh_placa" id="veh_placa">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_numlicencia">No licencia trancito</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_numlicencia)) echo $vehiculo[0]->veh_numlicencia ?>" class="form-control obligado" name="veh_numlicencia" id="veh_numlicencia">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_marca">Marca</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_marca)) echo $vehiculo[0]->veh_marca ?>" class="form-control obligado" name="veh_marca" id="veh_marca">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_linea">Línea</label>
                <input type="text"   value="<?php if (!empty($vehiculo[0]->veh_linea)) echo $vehiculo[0]->veh_linea ?>" class="form-control obligado" name="veh_linea" id="veh_linea">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_color">Color</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_color)) echo $vehiculo[0]->veh_color ?>" class="form-control obligado" name="veh_color" id="veh_color">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_modelo">Modelo</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_modelo)) echo $vehiculo[0]->veh_modelo ?>" class="form-control obligado" name="veh_modelo" id="veh_modelo">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_capacidad">Capacidad de Carga</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_capacidad)) echo $vehiculo[0]->veh_capacidad ?>" class="form-control obligado" name="veh_capacidad" id="veh_capacidad">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_cilindraje">Cilindraje</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_cilindraje)) echo $vehiculo[0]->veh_cilindraje ?>" class="form-control obligado" name="veh_cilindraje" id="veh_cilindraje">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="veh_vin">No VIN (Motor)</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_vin)) echo $vehiculo[0]->veh_vin ?>"  class="form-control obligado" name="veh_vin" id="veh_vin">
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="veh_chasis">No Chasis</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_chasis)) echo $vehiculo[0]->veh_chasis ?>"  class="form-control obligado" name="veh_chasis" id="veh_chasis">
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="tipCar_id">Tipo Carroceria</label>
                <select class="form-control obligado" name="tipCar_id" id="tipCar_id" >
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($tipocarroceria as $tipo) {
                        if ($tipo['tipCar_id'] == $vehiculo[0]->tipCar_id)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $tipo['tipCar_id'] ?>"><?php echo $tipo['tipCar_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_kilometraje">Kilometraje actual</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_kilometraje)) echo $vehiculo[0]->veh_kilometraje ?>" class="form-control obligado" name="veh_kilometraje" id="veh_kilometraje">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fechaultmantenimiento">Fecha ultimo Mantenimiento</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_fechaultmantenimiento)) echo $vehiculo[0]->veh_fechaultmantenimiento ?>" class="form-control fecha" name="veh_fechaultmantenimiento" id="veh_fechaultmantenimiento">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fechaproxmantenimiento">Fecha proximo Mantenimiento</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_fechaproxmantenimiento)) echo $vehiculo[0]->veh_fechaproxmantenimiento ?>" class="form-control fecha" name="veh_fechaproxmantenimiento" id="veh_fechaproxmantenimiento">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_realizamantenimiento">Centro donde realiza el mantenimiento</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_realizamantenimiento)) echo $vehiculo[0]->veh_realizamantenimiento ?>" class="form-control obligado" name="veh_realizamantenimiento" id="veh_realizamantenimiento">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_seguridadactiva">El vehículo cuenta con seguridad activa</label>
                <select class="form-control obligado" name="veh_seguridadactiva" id="veh_seguridadactiva">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $vehiculo[0]->veh_seguridadactiva)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_seguridadpaciva">El vehículo cuenta con seguridad pasiva</label>
                <select class="form-control obligado" name="veh_seguridadpaciva" id="veh_seguridadpaciva">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $vehiculo[0]->veh_seguridadpaciva)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_planifica">Esta planificada la modernizacion del vehículo</label>
                <select class="form-control obligado" name="veh_planifica" id="veh_planifica">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $vehiculo[0]->veh_planifica) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_preestablecidas">Las rutas del vehiculo estan preestablecidas</label>
                <select class="form-control obligado" name="veh_preestablecidas" id="veh_preestablecidas">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $vehiculo[0]->veh_preestablecidas) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_inspecciondiaria">Realiza inspeccion diaria del vehículo</label>
                <select class="form-control obligado" name="veh_inspecciondiaria" id="veh_inspecciondiaria">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $vehiculo[0]->veh_inspecciondiaria) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_puntoscriticos">Estan identificados los puntos criticos de mayor accidentalidad de la ruta</label>
                <select class="form-control obligado" name="veh_puntoscriticos" id="veh_puntoscriticos">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $vehiculo[0]->veh_puntoscriticos)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br><hr><br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-">
                <label for="veh_nombrepropietario">Nombre del Propietario</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_nombrepropietario)) echo $vehiculo[0]->veh_nombrepropietario ?>" id="veh_nombrepropietario" name="veh_nombrepropietario" class='form-control'>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_identificacion">Identificación</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_identificacion)) echo $vehiculo[0]->veh_identificacion ?>" id="veh_identificacion" name="veh_identificacion" class='form-control'>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_direccion">Direccion</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_direccion)) echo $vehiculo[0]->veh_direccion ?>" id="veh_direccion" name="veh_direccion" class='form-control'>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_telefono">Telefono</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_telefono)) echo $vehiculo[0]->veh_telefono ?>" id="veh_telefono" name="veh_telefono" class='form-control'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_correo">Correo Electronico</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_correo)) echo $vehiculo[0]->veh_correo ?>" id="veh_correo" name="veh_correo" class='form-control'>
            </div>
        </div>
        <!--<div class="row">-->

            <!--            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <label for="veh_comparendos">Deudas de comparendos</label>
                            <select id="veh_comparendos" name="veh_comparendos" class='form-control'>
                                <option value=""></option>
            <?php
            foreach ($confirmacion as $validacion) {
                if ($validacion['con_id'] == $vehiculo[0]->veh_comparendos)
                    $sele = "selected='selected'";
                else
                    $sele = "";
                ?>
                                            <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
            <?php } ?>
                            </select>
                        </div>-->
        <!--</div>-->
        <br><hr><br>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_soatvigente">Tiene SOAT Vigente</label>
                <select id="veh_soatvigente" name="veh_soatvigente" class='form-control'>
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $vehiculo[0]->veh_soatvigente)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?>value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_numerosoat">Número SOAT</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_numerosoat)) echo $vehiculo[0]->veh_numerosoat ?>" id="veh_numerosoat" name="veh_numerosoat" class='form-control'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fechainiciosoat">Fecha expedición</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_fechainiciosoat)) echo $vehiculo[0]->veh_fechainiciosoat ?>" id="veh_fechainiciosoat" name="veh_fechainiciosoat" class='form-control'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fechafinsoat">Fecha vencimiento</label>
                <input type="text" disabled value="<?php if (!empty($vehiculo[0]->veh_fechafinsoat)) echo $vehiculo[0]->veh_fechafinsoat ?>" id="veh_fechafinsoat" name="veh_fechafinsoat" class='form-control'>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_entidadexpsoat">Entidad expide el SOAT</label>
                <select id="veh_entidadexpsoat" name="veh_entidadexpsoat" class='form-control'>
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($entidades as $entidad) {
                        if ($entidad['entSoa_id'] == $vehiculo[0]->veh_entidadexpsoat)
                            $select = "selected";
                        else
                            $select = "";
                        ?>
                        <option <?php echo $select; ?> value="<?php echo $entidad['entSoa_id']; ?>"><?php echo $entidad['entSoa_nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_rtm">Tiene RTM vigente</label>
                <select id="veh_rtm" name="veh_rtm" class='form-control'>
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $vehiculo[0]->veh_rtm)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_numrtm">Numero RTM</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_fecinirtm)) echo $vehiculo[0]->veh_numrtm ?>" id="veh_numrtm" name="veh_numrtm" class='form-control'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fecinirtm">Fecha expedición</label>
                <input type="text" value="<?php if (!empty($vehiculo[0]->veh_fecinirtm)) echo $vehiculo[0]->veh_fecinirtm ?>" id="veh_fecinirtm" name="veh_fecinirtm" class='form-control'/>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fecfinrtm">Fecha vencimiento</label>
                <input type="text" disabled="disabled" value="<?php if (!empty($vehiculo[0]->veh_fecfinrtm)) echo $vehiculo[0]->veh_fecfinrtm ?>"  id="veh_fecfinrtm" name="veh_fecfinrtm" class='form-control'>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_codexpedicion">No concecutivo RUNT</label>
                <input type="text"  id="veh_codexpedicion" value="<?php if (!empty($vehiculo[0]->veh_codexpedicion)) echo $vehiculo[0]->veh_codexpedicion ?>" name="veh_codexpedicion" class='form-control'>
            </div>
        </div>
        <br><hr><br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_tarjetaoperacion">Obligado a portar tarjeta de operación</label>
                <select id="veh_tarjetaoperacion" name="veh_tarjetaoperacion" class='form-control'>
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $vehiculo[0]->veh_tarjetaoperacion)
                            $sele = "selected='selected'";
                        else
                            $sele = "";
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-5 col-md-5 col-xs-5 col-sm-5">
                <label for="veh_empresaafiliacion">Nombre de la empresa a la que se encuentra afiliado</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_empresaafiliacion)) echo $vehiculo[0]->veh_empresaafiliacion ?>" id="veh_empresaafiliacion" name="veh_empresaafiliacion" class='form-control'>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_feciniafiliacion">Fecha Expedición</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_feciniafiliacion)) echo $vehiculo[0]->veh_feciniafiliacion ?>" id="veh_feciniafiliacion fecha" name="veh_feciniafiliacion" class='form-control fecha'>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <label for="veh_fecfinafiliacion">Fecha Vencimiento</label>
                <input type="text"  value="<?php if (!empty($vehiculo[0]->veh_fecfinafiliacion)) echo $vehiculo[0]->veh_fecfinafiliacion ?>" id="veh_fecfinafiliacion" name="veh_fecfinafiliacion" class='form-control fecha'>
            </div>
        </div>
        <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $id_emp; ?>">
        <input type="hidden" name="veh_id" id="veh_id" value="<?php echo $id; ?>">
        <div class="row" align="right">
            <button class="btn btn-success" >Guardar</button>
        </div>
    </form>

</div>

<script>

        $("#veh_fecinirtm").datepicker({
            dateFormat: "dd/mm/yy",
            altField: '#datepicker_value1',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', ' Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            dayNamesMin: ["Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
            onSelect: function(dateText, inst) {
                var fecha = $(this).val().split('/');
//                console.log(fecha[2]+"/"+fecha[1]+"/"+fecha[0]);
                var actualDate = new Date(fecha[2]+"/"+fecha[1]+"/"+fecha[0]);
                var newDate = new Date(actualDate.getFullYear() + 1, actualDate.getMonth(), actualDate.getDate());
                $("#veh_fecfinrtm").datepicker("option", "minDate", newDate);
                $('#veh_fecfinrtm').datepicker({dateFormat: "dd/mm/yy"});
                console.log(newDate);
                $('#veh_fecfinrtm').datepicker('setDate', newDate);
            }});
        $("#veh_fechainiciosoat").datepicker({
            dateFormat: "dd/mm/yy",
            altField: '#datepicker_value1',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', ' Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            dayNamesMin: ["Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
            onSelect: function(dateText, inst) {
                var fecha = $(this).val().split('/');
//                console.log(fecha[2]+"/"+fecha[1]+"/"+fecha[0]);
                var actualDate = new Date(fecha[2]+"/"+fecha[1]+"/"+fecha[0]);
                var newDate = new Date(actualDate.getFullYear() + 1, actualDate.getMonth(), actualDate.getDate());
                $("#veh_fechafinsoat").datepicker("option", "minDate", newDate);
                $('#veh_fechafinsoat').datepicker({dateFormat: "dd/mm/yy"});
                console.log(newDate);
                $('#veh_fechafinsoat').datepicker('setDate', newDate);
            }});
        $(".fecha").datepicker({
            dateFormat: "dd/mm/yy",
            altField: '#datepicker_value1',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', ' Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            dayNamesMin: ["Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"]
        });


        $('#veh_fechainiciosoat').change(function() {
            var fecha = $('#veh_fechainiciosoat').val();
            fecha = fecha.split('/');
            var ano = parseInt(fecha[2]) + 1;
            $('#veh_fechafinsoat').val(fecha[0] + '/' + fecha[1] + '/' + ano);
        })
</script>    