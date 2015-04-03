<div class="row">
    <div class="large-4 columns">
        <label for="cantidad">CANTIDAD DE IMAGENES AL INICIO</label>
    </div>
    <div class="large-1 columns">
        <input type="text" value="<?php if(!empty($consultacantidad[0]->can_cantidadimgprincipal)) echo $consultacantidad[0]->can_cantidadimgprincipal; ?>" name="cantidad" id="cantidad">
    </div>
    <div class="large-2 columns">
        <label for="cantidad">EMPRESA</label>
    </div>
    <div class="large-3 columns">
        <select name="emrpesa">
            <option value="">-Seleccionar-</option>
        </select>
    </div>
    <div class="large-2 columns">
        <button type="button" class="button success radius small guardarcantidad">Guardar</button>
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        <label for="cantidad">CANTIDAD DE IMAGENES PERMITIDAS</label>
    </div>
    <div class="large-1 columns">
        <input type="text" value="<?php if(!empty($consultacantidad[0]->can_cantidadsubir)) echo $consultacantidad[0]->can_cantidadsubir; ?>" name="cantidaddesubir" id="cantidaddesubir">
    </div>
    <div class="large-2 columns">
        <label for="cantidad">EMPRESA</label>
    </div>
    <div class="large-3 columns">
        <select name="emrpesa" id="empresa">
            <option value="">-Seleccionar-</option>
            <?php foreach($empresas as $emp){ ?>
            <option value="<?php echo $emp->emp_id ?>"><?php echo $emp->emp_nombre ?></option>
            <?php }?>
        </select>
    </div>
        <div class="large-2 columns">
        <button type="button" class="button success radius small guardarpemitidas">Guardar</button>
    </div>
</div>  
<script>
    $('.guardarcantidad').click(function(){
        
        var url = "<?php echo base_url('index.php/administracion/guardarcantidadinicio'); ?>";
        
        $.post(url,{cantidad:$('#cantidad').val()})
                .done(function(msg){
                    
                })
                .fail(function(msg){
                    
                });
        
    });
    $('.guardarpemitidas').click(function(){
        
        var url = "<?php echo base_url('index.php/administracion/guardarcantidadinicio'); ?>";
        
        $.post(url,{cantidaddesubir:$('#cantidaddesubir').val(),empresa:$('#empresa').val()})
                .done(function(msg){

                })
                .fail(function(msg){
                    
                });
        
    });
    
    $('#empresa').change(function(){
        
        var url = "<?php echo base_url('index.php/administracion/candidaempresa'); ?>";
        
        var idempresa = $(this).val();
        $.post(url,{idempresa:idempresa})
                .done(function(msg){
                    $('#cantidaddesubir').val(msg);
                })
                .fail(function(msg){
                    
                });
    });
</script>