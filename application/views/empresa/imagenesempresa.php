<div class="row" >
    <div id="form">
        <form action="" method="post" id="uploadFile">
            <center>
                <lu class="button-group radius">
                    <li >
                        <input type="file" name="userFile" id="userFile"  required="required"/>
                    </li>
                    <li>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </li>
                    <li>
                        <input type="submit" id="butom" value="Carga" class="button success" id="cargue" />
                    </li>
                </lu>
            </center>
        </form> 
    </div>
</div>
<script src="<?php echo base_url() ?>/js/ajaxfileupload.js"></script>
<p>
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
            ?></div></p><?php
            ?><p><div class="row"><?php
    }
    ?>
        <div class="large-<?php echo $colum; ?> columns">
            <div class="large-12 columns" style="z-index: 500">
                <div  class="large-6 columns" style="background: red;"  id="eliminar<?php echo $i ?>" align="center" ><a style="display: "  onclick="eliminar('<?php echo $i; ?>')" >Eliminar</a></div>
                <div  class="large-6 columns" style="background: blue;" ok='ok' id="principal<?php echo $i ?>" align="center" ><a style="display: "  onclick="principal('<?php echo $i; ?>')">Principal</a></div>
            </div>
            <div  class="large-12 columns" >
                <img ok="ok" width="100%" height="100%" id="num<?php echo $i; ?>" src="http://placehold.it/250x250&amp;text=Imagen">
            </div>
        </div>
        <script>
            $('#eliminar<?php echo $i ?>').hide();
            $('#principal<?php echo $i ?>').hide();
        </script>
        <?php
    }
    ?>
</div>
<p></p>
<p></p>

<div class="row" >
    <form action=""  id="form1" method="post" onsubmit="return activar();">
        <center><h1>Información General</h1></center>
        <div  class="large-12 columns" >
            <div  class="large-3 columns" ><label for='imgEnc_nombre'>Nombre</label> </div>
            <div  class="large-9 columns" ><input type="text" id="imgEnc_nombre" name="imgEnc_nombre"/> </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-3 columns" ><label for='cat_id'>Categoria</label> </div>
            <div  class="large-9 columns" >
                <select name="cat_id" id="cat_id">
                    <option value="">-Seleccionar-</option>
                    <?php foreach ($categorias as $cat) { ?>
                        <option value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_categoria ?></option>
                    <?php } ?>
                </select>
                <p>
            </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-3 columns" ><label for='subCat_id'>Sub Categoria</label> </div>
            <div  class="large-9 columns" >
                <select id="subCat_id" name="subCat_id">
                    <option value=""></option>
                </select><p>
            </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-3 columns" ><label for='imgEnc_descripcion_corta'>Descripción Corta</label></div>
            <div  class="large-9 columns" ><input type="text" id="imgEnc_descripcion_corta" name="imgEnc_descripcion_corta"/> </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-2 columns" ><label for='imgEnc_descripcion_larga'>Descripción Larga</label> </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-12 columns" ><textarea id="imgEnc_descripcion_larga" name="imgEnc_descripcion_larga" style="height: 100px"></textarea> </div>
        </div>
        <input type="hidden" name="imgEnc_id" id="imgEnc_id" value="0">
        <div  class="large-12 columns" ><br>
            <center><button  class="button"> Guardar </button></center><p><br><p>
        </div>
    </form>
</div>
<script>
    $('#cat_id').change(function() {
        var cat_id = $('#cat_id').val();
        var url = "<?php echo base_url('index.php/Empresa/buscar_sub_categorias'); ?>";
        jQuery(".preload, .load").show();
        $.post(url, {cat_id: cat_id})
                .done(function(msg) {
                    jQuery(".preload, .load").hide();
                    $('#subCat_id').html(msg)
                })
                .fail(function(msg) {
                    jQuery(".preload, .load").hide();
                    alertas('rojo', 'Error de base de datos');
                })
    })
    function activar() {
        var nombre = $('#imgEnc_nombre').val();
        if (nombre == "") {
            alertas('rojo', 'Campo Nombre Obligatorio');
            return false;
        }
        var cat_id = $('#cat_id').val();
        if (cat_id == "") {
            alertas('rojo', 'Campo Categoria Obligatorio');
            return false;
        }
        var sub_categoria = $('#sub_categoria').val();
        if (sub_categoria == "") {
            alertas('rojo', 'Campo Sub Categoria Obligatorio');
            return false;
        }
        var imgEnc_descripcion_corta = $('#imgEnc_descripcion_corta').val();
        if (imgEnc_descripcion_corta == "") {
            alertas('rojo', 'Campo Descripción Corta Obligatorio');
            return false;
        }
        var imgEnc_descripcion_larga = $('#imgEnc_descripcion_larga').val();
        if (imgEnc_descripcion_larga == "") {
            alertas('rojo', 'Campo Descripcion Larga Obligatorio');
            return false;
        }
        var url = "<?php echo base_url('index.php/Empresa/guardar_imagen_general'); ?>";
        $('#form1').attr('action', url);
        return true;
    }
    cantidad_maxima =<?php echo $datos[0]->emp_max_img ?>;
    $('#uploadFile').submit(function(e) {
        e.preventDefault();
        var id = "1";
        var name = $('#userFile').val();
        var i = 0;
        for (i = 0; i < cantidad_maxima; i++) {
            var numero = $('#num' + i).attr('ok');
            if (numero == "ok") {
                numero = i;
                i = cantidad_maxima;
            }
//            console.log(imagen);
        }
        //        false;
        var imagen = $('#imgEnc_id').val();
        if (name == "") {
            return false;
        }
        var nombre = "";
        var desc_corta = "";
        var desc_larga = "";
        jQuery(".preload, .load").show();
        var doUploadFileMethodURL = "<?php echo base_url('index.php/Empresa/doUploadFile'); ?>?imgEnc_id=" + imagen + "&imgEnc_nombre=" + nombre + "&imgEnc_descripcion_corta=" + desc_corta + "&imgEnc_descripcion_larga=" + desc_larga;
        $.ajaxFileUpload({
            url: doUploadFileMethodURL,
            secureuri: false,
            type: 'post',
            fileElementId: 'userFile',
            dataType: 'json',
            data: {id: id},
            success: function(data) {
                jQuery(".preload, .load").hide();
                $('#imgEnc_id').val(data.id);
                var ruta = "<?php echo base_url('uploads') ?>/" + data.ruta
                $('#num' + numero).attr('src', ruta);
                $('#num' + numero).attr('ok', 'ya');
                //                $('#num' + numero).attr('style', 'margin-top: -57');
                $('#num' + numero).attr('nombre', data.message);
                $('#principal' + numero).show();
                $('#eliminar' + numero).show();
                $('#userFile').val('');
                if (numero == 0) {
                    principal(numero);
                }

            },
            error: function(data) {
                alertas('rojo', 'El archivo no se ha podido cargar, el formato puede no ser valido');
                jQuery(".preload, .load").hide();
            }
        });

        return false;
        //                    return false;
    });
    function principal(numero) {
        var nombre = $('#num' + numero).attr('nombre')
        var id = $('#imgEnc_id').val()
        var url = "<?php echo base_url('index.php/Empresa/img_principal'); ?>"
        jQuery(".preload, .load").show();
        $.post(url, {id: id, nombre: nombre, accion: 'update'})
                .done(function() {
                    var i = 0;
                    for (i = 0; i <= cantidad_maxima; i++) {
                        var si = $('#principal' + i).attr('ok');
                        if (si == 'ya') {
                            $('#principal' + i).attr('style', 'background:blue');
                        }
                    }
                    $('#principal' + numero).attr('style', 'background:green');
                    $('#principal' + numero).attr('ok', 'ya');
                    jQuery(".preload, .load").hide();
                }).fail(function() {
            jQuery(".preload, .load").hide();
            alertas('rojo', 'Error de base de datos');
        })
    }
    function eliminar(numero) {
        var nombre = $('#num' + numero).attr('nombre')
        var id = $('#imgEnc_id').val()

        $('#num' + numero).attr('ok', 'ok');
        var prin = $('#principal' + numero).attr('ok');
        if (prin == 'ya') {
            var color = "verde";
            alertas(0, 'Imagen principal no puede ser eliminada');
            return false;
        }

        $('#num' + numero).attr('src', 'http://placehold.it/250x250&text=Imagen');
        $('#eliminar' + numero).hide()
        $('#principal' + numero).hide()
        jQuery(".preload, .load").show();
        var url = "<?php echo base_url('index.php/Empresa/img_principal'); ?>"
        $.post(url, {id: id, nombre: nombre, accion: 'delete'})
                .done(function() {
                    jQuery(".preload, .load").hide();
                    //                    $('#principal' + numero).attr('style', 'background:green')
                }).fail(function() {
            jQuery(".preload, .load").hide();
            alertas('rojo', 'Error de base de datos');

        })
    }

</script>

<style>
    /*    img{
            width: 250px;
            height: 250px
        }*/
    .ancho{
        width: 100%;
    }
    a,a:visited, a:hover{
        color: #FFF
    }
    div{
        /*border: 1px solid red*/
    }
</style>