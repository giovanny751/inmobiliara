<?php
if (isset($listado[0][0]->imgDet_nombre)) {
    $imgEnc_id = $listado[0][0]->imgEnc_id;
    $nombre_form= $listado[0][0]->imgEnc_nombre;
    $categoria = $listado[0][0]->cat_categoria;
    $subcategoria_id = $listado[0][0]->sub_id;
    $subcategoria = $listado[0][0]->sub_subcategoria;
    $desc_corta = $listado[0][0]->imgEnc_descripcion_corta;
    $desc_larga = $listado[0][0]->imgEnc_descripcion_larga;
    $sub = "<option value='" . $subcategoria_id . "'>" . $subcategoria . "</option>";
} else {
    $imgEnc_id = 0;
    $nombre_form = "";
    $categoria = "";
    $subcategoria_id = "";
    $subcategoria = "";
    $desc_corta = "";
    $desc_larga = "";
    $sub = "<option value=''></option>";
}
?>


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
//    print_y($listado);
    $cantidad = $datos[0]->emp_max_img;
    if ($cantidad >= 4) {
        $colum = 3;
    } else {
        $colum = 12 / $cantidad;
    }
    for ($i = 0; $i < $cantidad; $i++) {
//        echo $listado[0][$i]->imgDet_nombre;
        if (($i % 4) == 0) {
            ?></div></p><?php
            ?><p><div class="row"><?php
    }
    if (isset($listado[0][$i]->imgDet_padre)) {
        if ($listado[0][$i]->imgDet_padre == '1') {
            $color = "green";
            $acti="ya";
        } else {
            $color = "blue";
            $acti="ok";
        }
    } else {
        $color = "blue";
        $acti="ok";
    }
    ?>
        <div class="large-<?php echo $colum; ?> columns">
            <div class="large-12 columns" style="z-index: 500">
                <div  class="large-6 columns" style="background: red;"  id="eliminar<?php echo $i ?>" align="center" ><a style="display: "  onclick="eliminar('<?php echo $i; ?>')" >Eliminar</a></div>
                <div  class="large-6 columns" style="background:<?php echo $color; ?>;" ok='<?php echo $acti; ?>' id="principal<?php echo $i ?>" align="center" ><a style="display: "  onclick="principal('<?php echo $i; ?>')">Principal</a></div>
            </div>
            <?php
            if (isset($listado[0][$i]->imgDet_nombre)) {
                $ruta = base_url() . "uploads/" . $listado[0][$i]->id_emp . "/" . $listado[0][$i]->imgDet_nombre;
                $ima = "ya";
                $nombre="nombre='".$listado[0][$i]->imgDet_nombre."'";
            } else {
                $ruta = 'http://placehold.it/250x250&amp;text=NYGSOFT.COM';
                $ima = "ok";
                $nombre="";
                ?>
                <script>
                    $('#eliminar<?php echo $i ?>').hide();
                    $('#principal<?php echo $i ?>').hide();
                </script>          
                <?php
            }
            ?>
            <div  class="large-12 columns" >
                <img ok="<?php echo $ima; ?>" <?php echo $nombre ?> width="100%" height="100%" id="num<?php echo $i; ?>" src="<?php echo $ruta; ?>">
            </div>
            <br>    
        </div>
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
            <div  class="large-9 columns" ><input type="text" id="imgEnc_nombre" name="imgEnc_nombre" value="<?php echo $nombre_form; ?>"/> </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-3 columns" ><label for='cat_id'>Categoria</label> </div>
            <div  class="large-9 columns" >
                <select name="cat_id" id="cat_id">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($categorias as $cat) {
                        if ($cat->cat_categoria == $categoria) {
                            $select = "selected";
                        } else {
                            $select = "";
                        }
                        ?>
                        <option <?php echo $select; ?> value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_categoria ?></option>
                    <?php } ?>
                </select>
                <p>
            </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-3 columns" ><label for='subCat_id'>Sub Categoria</label> </div>
            <div  class="large-9 columns" >
                <select id="subCat_id" name="subCat_id">
                    <?php echo $sub; ?>
                </select><p>
            </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-3 columns" ><label for='imgEnc_descripcion_corta'>Descripción Corta</label></div>
            <div  class="large-9 columns" ><input type="text" id="imgEnc_descripcion_corta" name="imgEnc_descripcion_corta" value="<?php echo $desc_corta; ?>"/> </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-2 columns" ><label for='imgEnc_descripcion_larga'>Descripción Larga</label> </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-12 columns" ><textarea id="imgEnc_descripcion_larga" name="imgEnc_descripcion_larga" style="height: 100px"><?php echo $desc_larga; ?></textarea> </div>
        </div>
        <input type="hidden" name="imgEnc_id" id="imgEnc_id" value="<?php echo $imgEnc_id; ?>">
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
        jQuery(".preload, .load").show();
        var doUploadFileMethodURL = "<?php echo base_url('index.php/Empresa/doUploadFile'); ?>?imgEnc_id=" + imagen ;
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
        var prin = $('#principal' + numero).attr('ok');
        if (prin == 'ya') {
//            var color = "verde";
            alertas('rojo', 'Imagen principal no puede ser eliminada');
            return false;
        }
        $('#num' + numero).attr('ok', 'ok');
        $('#num' + numero).attr('src', 'http://placehold.it/250x250&text=NYGSOFT.COM');
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