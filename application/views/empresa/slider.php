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
<div class="row" >
    <div id="tabla"><?php echo $tabla; ?></div>
</div>
<script src="<?php echo base_url() ?>/js/ajaxfileupload.js"></script>
<p>

    <script>
        function editar(desc,id){
            $('#sli_descripcion').val(desc);
            $('#sli_id').val(id);
        }
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
                    $('#sli_fecha_inicio').val('');
                    $('#sli_fecha_final').val('');
                    $('#sli_id').val('');
                    $('#sli_descripcion').val('');
                    $('#userFile').val('');
                    alertas('verde', 'La Informacion fue Guardada con Exito');
                    var tabla=decode64(data.tabla);
                    $('#tabla').html(tabla);
//                    console.log
                },
                error: function(data) {
                    alertas('rojo', 'El archivo no se ha podido cargar, el formato puede no ser valido');
                    jQuery(".preload, .load").hide();
                }
            });
            return false;
        });

        var keyStr = "ABCDEFGHIJKLMNOP" +
                "QRSTUVWXYZabcdef" +
                "ghijklmnopqrstuv" +
                "wxyz0123456789+/" +
                "=";
        function encode64(input) {
            input = escape(input);
            var output = "";
            var chr1, chr2, chr3 = "";
            var enc1, enc2, enc3, enc4 = "";
            var i = 0;
            do {
                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);
                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;
                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }
                output = output +
                        keyStr.charAt(enc1) +
                        keyStr.charAt(enc2) +
                        keyStr.charAt(enc3) +
                        keyStr.charAt(enc4);
                chr1 = chr2 = chr3 = "";
                enc1 = enc2 = enc3 = enc4 = "";
            } while (i < input.length);
            return output;
        }



        function decode64(input) {
            var output = "";
            var chr1, chr2, chr3 = "";
            var enc1, enc2, enc3, enc4 = "";
            var i = 0;
            // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
            var base64test = /[^A-Za-z0-9\+\/\=]/g;
            if (base64test.exec(input)) {
                alert("There were invalid base64 characters in the input text.\n" +
                        "Valid base64 characters are A-Z, a-z, 0-9, '+', '/',and '='\n" +
                        "Expect errors in decoding.");
            }
            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            do {
                enc1 = keyStr.indexOf(input.charAt(i++));
                enc2 = keyStr.indexOf(input.charAt(i++));
                enc3 = keyStr.indexOf(input.charAt(i++));
                enc4 = keyStr.indexOf(input.charAt(i++));
                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;
                output = output + String.fromCharCode(chr1);
                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }
                chr1 = chr2 = chr3 = "";
                enc1 = enc2 = enc3 = enc4 = "";
            } while (i < input.length);
            return unescape(output);
        }



        $(function() {
            $(".fecha").datepicker();
        });

    </script>