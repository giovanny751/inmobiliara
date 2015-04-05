<div class="row" >
    <div id="form">
        <form action="" method="post" id="uploadFile">
            <div  class="large-12 columns" >    
                <div  class="large-6 columns" >
                    <label for="sli_fecha_inicio">Fecha Inicial</label>
                </div>    
                <div  class="large-6 columns" for="sli_fecha_final">
                    <label for="sli_fecha_final">Fecha Final</label>
                </div>
            </div>
            <div  class="large-12 columns" >    
                <div  class="large-6 columns" >
                    <input type="text" id="sli_fecha_inicio" class="fecha" name="sli_fecha_inicio">
                </div>    
                <div  class="large-6 columns" >
                    <input type="text" id="sli_fecha_final" class="fecha" name="sli_fecha_final">
                </div>
            </div>
            <div  class="large-12 columns" >    
                <div  class="large-6 columns" >
                    <label for="sli_descripcion">Información</label>
                </div>    
                <div  class="large-6 columns" >
                    <label for="userFile">Archivo</label>
                </div>
            </div>
            <div  class="large-12 columns" >
                <div  class="large-6 columns" >
                    <input type="text" id="sli_descripcion" class="fecha" name="sli_descripcion">
                </div>
                <div  class="large-6 columns" >
                    <input type="file" name="userFile" id="userFile"  required="required"/>     
                </div>
            </div>
            <div  class="large-12 columns" >
                <input type="text" id="sli_id" name="sli_id">
                <center><input type="submit" id="butom" value="Carga" class="button success" id="cargue" /></center>
            </div>
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
            if (name == "") {
                return false;
            }
            var i = 0;

            var sli_fecha_inicio = $('#sli_fecha_inicio').val();
            var sli_fecha_final = $('#sli_fecha_final').val();
            var sli_id = $('#sli_id').val();
            var sli_descripcion = $('#sli_descripcion').val();

            jQuery(".preload, .load").show();
            var doUploadFileMethodURL = "<?php echo base_url('index.php/Empresa/doUploadFile_slider'); ?>?sli_fecha_inicio=" + sli_fecha_inicio + "&sli_fecha_final=" + sli_fecha_final + "&sli_id=" + sli_id + "&sli_descripcion=" + sli_descripcion;
            $.ajaxFileUpload({
                url: doUploadFileMethodURL,
                secureuri: false,
                type: 'post',
                fileElementId: 'userFile',
                dataType: 'json',
                data: {sli_id: sli_id},
                success: function(data) {
                    jQuery(".preload, .load").hide();
                },
                error: function(data) {
                    alertas('rojo', 'El archivo no se ha podido cargar, el formato puede no ser valido');
                    jQuery(".preload, .load").hide();
                }
            });

            return false;
            //                    return false;
        });
        $(function() {
            $(".fecha").datepicker();
        });

    </script>