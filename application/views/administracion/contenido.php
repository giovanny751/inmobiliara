<div class="row">
    <div class="large-4 columns">
        <label for="cantidad">CANTIDAD DE IMAGENES AL PRINCIPIO</label>
    </div>
    <div class="large-8 columns">
        <input type="text" value="<?php if(!empty($consultacantidad[0]->can_cantidadimgprincipal)) echo $consultacantidad[0]->can_cantidadimgprincipal; ?>" name="cantidad" id="cantidad">
    </div>
</div>
<div class="row">
    <div class="large-8 columns">
        <button type="button" class="button success radius guardar">Guardar</button>
    </div>
</div>
<script>
    $('.guardar').click(function(){
        
        var url = "<?php echo base_url('index.php/administracion/guardarcantidadinicio'); ?>";
        
        $.post(url,{cantidad:$('#cantidad').val()})
                .done(function(msg){
                    
                })
                .fail(function(msg){
                    
                });
        
    });
</script>