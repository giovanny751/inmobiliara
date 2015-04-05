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

    <script>
        $('#uploadFile').submit(function(e) {
            e.preventDefault();
            var id = "1";
            var name = $('#userFile').val();
            var i = 0;
            
            var imagen = $('#imgEnc_id').val();
            if (name == "") {
                return false;
            }
//        var nombre = "";
//        var desc_corta = "";
//        var desc_larga = "";
            jQuery(".preload, .load").show();
            var doUploadFileMethodURL = "<?php echo base_url('index.php/Empresa/doUploadFile_slider'); ?>?imgEnc_id=" + imagen;
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
    </script>