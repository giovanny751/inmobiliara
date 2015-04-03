<script src="<?php echo base_url() ?>/js/ajaxfileupload.js"></script>
<div class="row">
    <?php
//    print_y($datos);
    $cantidad = $datos[0]->emp_max_img;
    if ($cantidad >= 4) {
        $colum = 3;
    } else {
        $colum = 12 / $cantidad;
    }
    for ($i = 0; $i < $cantidad; $i++) {
        if (($i % 4) == 0) {
            ?></div><?php
            ?><div class="row"><?php
    }
    ?>
        <div class="large-<?php echo $colum; ?> columns">
            <img id="num<?php echo $i; ?>" src="http://placehold.it/250x250&amp;text=Imagen">
        </div>
        <?php
    }
    ?>
</div>
<input type="hidden" name="imagen" id="imagen" value="0">
<input type="hidden" name="numero" id="numero" value="0">
<div id="form">
<div class="row" >
    <form action="" method="post" id="uploadFile">

        <div class="large-12 columns button-group round even-2">
            <div class="large-9 columns button secondary" for="userFile">
                <br>
                <input type="file" name="userFile" id="userFile" size="20" required="required"/>
            </div>
            <div class="large-3 columns button success" for="butom">
                <input type="submit" id="butom" value="Carga" class="button success" id="cargue" />
            </div>

        </div>

    </form> 
</div>
</div>
<script>
    $('#uploadFile').submit(function(e) {
        e.preventDefault();
        var id = "1";
        var name = $('#userFile').val();
        var imagen = $('#imagen').val();
        if (name == "") {
            return false;
        }
        var nombre="prueba";
        var desc_corta="prueba";
        var desc_larga="prueba";
        jQuery(".preload, .load").show();
        var doUploadFileMethodURL = "<?php echo base_url('index.php/Empresa/doUploadFile'); ?>?imagen="+imagen+"&nombre="+nombre+"&desc_corta="+desc_corta+"&desc_larga="+desc_larga;
        $.ajaxFileUpload({
            url: doUploadFileMethodURL,
            secureuri: false,
            type: 'post',
            fileElementId: 'userFile',
            dataType: 'json',
            data: {id: id},
            success: function(data) {
                console.log(data);
                console.log(data.id);
                $('#imagen').val(data.id);
                var numero=$('#numero').val();
                var num=parseInt(numero)+1;
                $('#numero').val(num);
                var ruta="<?php echo base_url('uploads')?>/"+data.ruta
                $('#num'+numero).attr('src',ruta)
//                jQuery(".preload, .load").hide();
//                $('#archivo').html(data.message + "     <button class='btn' onclick='eliminar()'><i class='fa fa-trash-o'></i></button>");
//                $('#archivos_nuevos').val(data.ruta);
//                $('#userFile').val('');
                var cantidad_maxima=<?php echo $datos[0]->emp_max_img  ?>;
                if(cantidad_maxima==num){
                    $('#form').html('');
                }
            },
            error: function(data) {
                alert("El archivo no se ha podido cargar, el formato puede no ser valido");
                jQuery(".preload, .load").hide();
            }
        });

        return false;
        //                    return false;
    });
</script>
<style>
    img{
        width: 250px;
        height: 250px
    }
</style>