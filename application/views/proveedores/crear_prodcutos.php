<form action="" method="post" id="uploadFile">
    <table width="90%" border="0" style="border:1px solid #000">
        <thead style="background-color: #fc7323;color: #FFF">
        <th>Adjuntar</th>
        <th>Subir Archivo</th>
        <th>Documento a Consultar</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="file" name="userFile" id="userFile" size="20" required="required"/>
                </td>
                <td align="center">
                    <input type="submit" value="Carga" class="btn btn-success" id="cargue" />
                </td>
                <td align="center">
                    <div id="archivo">No hay datos adjuntos</div>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<script>
    
    $('#uploadFile').submit(function(e) {
        e.preventDefault();
        var id = "1";
        var name = $('#userFile').val();
        if (name == "") {
            return false;
        }
        jQuery(".preload, .load").show();
        var doUploadFileMethodURL = "<?= site_url('proveedores/doUploadFile'); ?>?id=" + id + "&name=" + name;
        $.ajaxFileUpload({
            url: doUploadFileMethodURL,
            secureuri: false,
            type: 'post',
            fileElementId: 'userFile',
            dataType: 'json',
            data: {id: id},
            success: function(data) {
//                console.log(data);
//                jQuery(".preload, .load").hide();
//                $('#archivo').html(data.message + "     <button class='btn' onclick='eliminar()'><i class='fa fa-trash-o'></i></button>");
//                $('#archivos_nuevos').val(data.ruta);
//                $('#userFile').val('');
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