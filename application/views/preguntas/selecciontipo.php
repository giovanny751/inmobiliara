<form method="post" action="<?php echo base_url('index.php/preguntas/preguntasseleccion') ?>">
<div class="widgetTitle col-lg-offset-4 col-sm-offset-4 col-xs-offset-4 col-md-offset-4 col-lg-4 col-sm-4 col-xs-4 col-md-4">
    <h5><i class="glyphicon glyphicon-ok"></i> TIPO A CONSULTAR</h5>
</div>
<div class='well col-lg-offset-4 col-sm-offset-4 col-xs-offset-4 col-md-offset-4 col-lg-4 col-sm-4 col-xs-4 col-md-4'>
            <label>Tipo</label>
            <select name="tipUsu_id" id="tipUsu_id" class="form-control">
                <option value="">-Seleccionar-</option>
                <option value="1">Usuario</option>
                <option value="2">Empresa</option>
            </select>
            <input type="submit" value="Consultar" class="btn btn-success">
    </div>
</form>