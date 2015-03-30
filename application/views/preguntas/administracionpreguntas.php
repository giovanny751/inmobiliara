<div class="widgetTitle" style="margin-top: 20px;">
    <h5><i class="glyphicon glyphicon-ok"></i> CATEGORIAS </h5>
</div>
<div class="well">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <label>Categoria</label><input type="text" class="form-control" placeholder="CATEGORIA" name="tipopregunta" id="tipopregunta">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Tipo</label>
            <select name="tipUsu_id" id="tipUsu_id" class="form-control">
                <option value="">-Seleccionar-</option>
                <option value="1">Usuario</option>
                <option value="2">Empresa</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>&nbsp;</label>
            <button type="button" class="btn btn-success" id="guardartipo">Guardar Categoria</button>
        </div>
    </div>
</div>
<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> AGREGAR SUB-CATEGORIAS</h5>
</div>
<div class="well">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label>Tipo</label>
            <select name="tipUsu_id2" id="tipUsu_id2" class="form-control">
                <option value="">-Seleccionar-</option>
                <option value="1">Usuario</option>
                <option value="2">Empresa</option>
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label>Categoria</label>
            <select class="form-control" id="tipopreguntados">
                
            </select>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Sub-Categoria</label>
            <input type="text" class="form-control" id="opcion" placeholder="SUB-CATEGORIA">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>&nbsp;</label><button type="button" class="btn btn-success" id="guardaropcion">Guardar Sub-Categoria</button>
        </div>
    </div>
</div>
<script>
    
    $('#tipUsu_id2').change(function(){
        
        var url = '<?php echo base_url("index.php/preguntas/tipocategorias"); ?>';
        var tipo = $(this).val();
        $('#tipopreguntados *').remove();
        $.post(url,{tipo:tipo}).done(function(msg){
            var option = "";
            $.each(msg,function(key,val){
                option += "<option value='"+val.tipPre_id+"'>"+val.tipPre_tipo+"</option>";
            });
            $('#tipopreguntados').append(option);
            alerta('verde','DATOS CARGADOS');
        }).fail(function(msg){
            alerta('rojo','ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });
        
    });
    
    $('#guardartipo').click(function() {

        var tipousuario = $('#tipUsu_id').val();
        var tipo = $('#tipopregunta').val();
        if (tipo != '' && tipousuario != "") {
            var url = '<?php echo base_url("index.php/preguntas/guardartipopregunta"); ?>';
            $.post(url, {tipo: tipo, tipousuario: tipousuario}, function(data) {
                alerta('verde','DATOS GUARDADOS CORRECTAMENTE');
            });
        } else {
            alerta('rojo', 'POR FAVOR INGRESAR LOS DATOS CORRESPONDIENTES')
        }

    });
    $('#guardaropcion').click(function() {
        var tipo = $('#tipopreguntados').val();
        var opcion = $('#opcion').val();
            var tipousuario = $('#tipUsu_id2').val();
        if (tipo != '' && tipousuario != "") {
            var url = '<?php echo base_url("index.php/preguntas/guardaropcionpregunta"); ?>';
            $.post(url, {tipo: tipo, opcion: opcion,tipousuario: tipousuario}, function() {
                $.notific8('guardado correctamente', {
                    horizontalEdge: 'bottom',
                    life: 5000,
                    theme: 'amethyst',
                    heading: 'Opcion de pregunta'
                });
            });
        } else {
            alerta('rojo', 'POR FAVOR INGRESAR LOS DATOS CORRESPONDIENTES')
        }
    });
</script>    
