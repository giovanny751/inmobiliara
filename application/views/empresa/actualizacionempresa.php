<div class="row">
    <center><h3>ACTUALIZACIÒN DE DATOS</h3></center>
    <form method="post">
        <div class="large-12 columns">
            <div class="large-2 columns">
                <label for="right-label" >Identificaciòn</label>
            </div>
            <div class="large-10 columns">
                <input type="text" value="<?php echo $datos[0]->emp_identificacion ?>" name="emp_identificacion" id="right-label" placeholder="Identificaciòn">
            </div>
        </div> 
        <div class="large-12 columns">
            <div class="large-2 columns">
                <label for="right-label" >Nombre Empresa</label>
            </div>
            <div class="large-10 columns">
                <input type="text" value="<?php echo $datos[0]->emp_nombre ?>" name="emp_nombre" id="right-label" placeholder="Nombre Empresa">
            </div>
        </div> 
        <div class="large-12 columns">
            <div class="large-2 columns">
                <label for="right-label" >Correo</label>
            </div>
            <div class="large-10 columns">
                <input type="text" value="<?php echo $datos[0]->ing_correo ?>" disabled="" id="right-label" placeholder="Correo">
            </div>
        </div> 
        <div class="large-12 columns">
            <div class="large-2 columns">
                <label for="right-label" >Telefono</label>
            </div>
            <div class="large-10 columns">
                <input type="text" value="<?php echo $datos[0]->emp_telefono ?>" name="emp_telefono" id="right-label" placeholder="Telefono">
            </div>
        </div> 
        <div class="large-12 columns">
            <div class="large-2 columns">
                <label for="right-label" >Telefono 2</label>
            </div>
            <div class="large-10 columns">
                <input type="text" value="<?php echo $datos[0]->emp_telefonodos ?>" name="emp_telefonodos" id="right-label" placeholder="Telefono 2">
            </div>
        </div> 
        <div class="large-12 columns">
            <div class="large-2 columns">
                <label for="right-label" >Direcciòn</label>
            </div>
            <div class="large-10 columns">
                <input type="text" value="<?php echo $datos[0]->emp_direccion ?>" name='emp_direccion' id="right-label" placeholder="Direcciòn">
            </div>
        </div> 
        <div class="large-12 columns" align='right'>
            <div class="large-12 columns">
                <button type="button" class="button radius success guardar">Guardar</button>
            </div>
        </div>
    </form>
</div> 
<script>
    $('.guardar').click(function () {
        var url = "<?php echo base_url('index.php/empresa/guardaractualizacion') ?>";
        $.post(url,$('form').serialize()).done(function(msg){
            
        }).fail(function(msg){
            
        });
    });
</script>    