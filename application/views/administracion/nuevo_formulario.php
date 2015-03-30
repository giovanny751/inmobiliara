
    <form id="form1">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <td>
                    Fomulario Nombre
                </td>
                <td>
                    <?php echo form_input('form_nombreForm', '', 'id="form_nombreForm" class="obligatorio"') ?>
                </td>
                <td>
                    Formulario Numero
                </td>
                <td>
                    <?php echo $dato = $url2 + 1 ?>
                    <input type="hidden" name="form_formulario" id="form_formulario" value="<?php echo $dato; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Nombre campo
                </td>
                <td>
                    <?php echo form_input('form_campo', '', 'id="form_campo" class="obligatorio"') ?>
                </td>
            </tr>
            <tr>
                <td>
                    Campo Valor
                </td>
                <td>
                    <?php echo form_input('form_valor', '', 'id="form_valor" class="obligatorio"') ?>
                </td>
                <td>
                    Campo Texto
                </td>
                <td>
                    <?php echo form_input('form_nombre', '', 'id="form_nombre" class="obligatorio"') ?>
                </td>
            </tr>

            </tr>
        </table>
    </form>

<center>
    <?php echo form_button('Guardar', "Guardar", 'class="formulario_nuevo_form" class="btn btn-success"') ?>
</center> 
