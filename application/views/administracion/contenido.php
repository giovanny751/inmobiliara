
            <?php foreach($empresas as $emp){ 
               $option = "<option value='".$emp->emp_id."'>".$emp->emp_nombre."</option>";
             }?>

<div class="row">
    <div class="large-4 columns">
        <label for="cantidad">CANTIDAD DE IMAGENES AL INICIO</label>
    </div>
    <div class="large-1 columns">
        <input type="text" value="<?php if(!empty($consultacantidad[0]->can_cantidadimgprincipal)) echo $consultacantidad[0]->can_cantidadimgprincipal; ?>" name="cantidad" id="cantidad">
    </div>
    <div class="large-offset-5   large-2 columns">
        <button type="button" class="button success radius small guardarcantidad">Guardar</button>
    </div>
</div>
<div class="row">
    <div class="large-2 columns">
        <label for="cantidadempresa">EMPRESA</label>
    </div>
    <div class="large-3 columns">
        <select name="emrpesa" id="cantidadempresa">
            <option value="">-Seleccionar-</option>
            <?php echo $option; ?>
        </select>
    </div>
    <div class="large-4 columns">
        <label for="cantidadproductosdesubir">CANTIDAD DE PRODUCTOS POR EMPRESA</label>
    </div>
    <div class="large-1 columns">
        <input type="text" name="cantidaddesubir" id="cantidadproductosdesubir">
    </div>
        <div class="large-2 columns">
        <button type="button" class="button success radius small cantidadpropem">Guardar</button>
    </div>
</div>  
<div class="row">
    <div class="large-2 columns">
        <label for="empresa">EMPRESA</label>
    </div>
    <div class="large-3 columns">
        <select name="emrpesa" id="empresa">
            <option value="">-Seleccionar-</option>
            <?php echo $option; ?>
        </select>
    </div>
    <div class="large-4 columns">
        <label for="cantidadimgdesubir">CANTIDAD DE IMAGENES PERMITIDAS</label>
    </div>
    <div class="large-1 columns">
        <input type="text" value="<?php if(!empty($consultacantidad[0]->can_cantidadsubir)) echo $consultacantidad[0]->can_cantidadsubir; ?>" name="cantidaddesubir" id="cantidadimgdesubir">
    </div>
        <div class="large-2 columns">
        <button type="button" class="button success radius small guardarpemitidas">Guardar</button>
    </div>
</div>  
<script>
    
    $('#cantidadempresa').change(function(){
       
         var url = "<?php echo base_url('index.php/administracion/cantidadporempresa'); ?>";   
            $.post(url,{empresa:$('#cantidadempresa').val()})
                .done(function(msg){
                    $('#cantidadproductosdesubir').val(msg);
                })
                .fail(function(msg){
                    
                });
    });
    
    $('.cantidadpropem').click(function(){
        
        var url = "<?php echo base_url('index.php/administracion/guardarcantidadempresa'); ?>";
        
                $.post(url,{cantidad:$('#cantidadproductosdesubir').val(),empresa:$('#cantidadempresa').val()})
                .done(function(msg){
                    
                })
                .fail(function(msg){
                    
                });
        
    });
    
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
        $(".preload, .load").show();
        var idempresa = $(this).val();
        $.post(url,{idempresa:idempresa})
                .done(function(msg){
                    $('#cantidaddesubir').val(msg);
                    $(".preload, .load").hide();
                })
                .fail(function(msg){
                    $(".preload, .load").hide();
                });
    });
</script>