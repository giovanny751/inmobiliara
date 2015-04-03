<center><h3>ADMINISTRACIÓN DE CATEGORIAS</h3></center>
<div class="row">
    <div class="large-2 columns"><label  for="categoria">Categoria</label></div>
    <div class="large-8 columns"><input type="text" name="categoria" id="categoria"></div>
    <div class="large-2 columns"><button type="button" class="button radius success small categoria">Guardar</button></div>
</div>
<div class="row">
    <div class="large-2 columns"><label  for="categorias">Categoria</label></div>
    <div class="large-3 columns">
        <select name="categorias" id="categorias">
            <option value="">-Seleccionar-</option>
            <?php foreach($categorias as $cat){?>
            <option value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_categoria?></option>
            <?php }?>
        </select>
    </div>
    <div class="large-2 columns"><label  for="subcategoria">Sub-Categoria</label></div>
    <div class="large-3 columns">
        <input type="text" name="subcategoria" id="subcategoria">
    </div>
    <div class="large-2 columns">
        <button type="button" class="button radius success small subcategoria">Guardar</button>
    </div>
</div>
<script>
    $('.categoria').click(function () {
        $('#categorias *').remove();
        var url = "<?php echo base_url('index.php/administracion/guardarcategoria'); ?>";
        $.post(url, {categoria: $('#categoria').val()})
                .done(function (msg) {
                    var option = "<option value='-Seleccionar'>-Seleccionar-</option>";
                    $.each(msg,function(key,val){
                        option += "<option value='"+val.cat_id+"'>"+val.cat_categoria+"</option>";
                    });
                    $('#categorias').append(option);
                })
                .fail(function (msg) {

                });
    });
    $('.subcategoria').click(function () {
        var url = "<?php echo base_url('index.php/administracion/guardarsubcategoria'); ?>";
        $.post(url, {categoria: $('#categorias').val(),subcategoria:$('#subcategoria').val()})
                .done(function () {

                })
                .fail(function () {

                });
    });
</script>    