<div class="alert alert-info"><center><b>REGISTRO USUARIO</b></center></div>
<div class="row">
    <button data-reveal-id="firstModal2"  type="button" id="insertarusuario" class="button radius">Ingresar Usuario</button>
</div>
<div class="row">
    <div class="table-responsive ">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <th style="width: 220px">Email</th>
            <th style="width: 220px">Estado</th>
            <th style="width: 220px">Modificar</th>
            <th style="width: 220px">Roles</th>
            </thead>
            <tbody>
                <?php foreach ($usaurios as $todosusuarios) { ?>
                    <tr>
                        <td><?php echo $todosusuarios['ing_correo']; ?></td>
                        <td><?php
                            if ($todosusuarios['est_id'] == 1){
                                ?>
                                <div class="switch">
                                    <input id="<?php echo $todosusuarios['ing_correo']; ?>" type="checkbox" checked="">
                                    <label for="<?php echo $todosusuarios['ing_correo']; ?>"></label>
                                </div> 
                            <?php }
                            else {
                                ?>
                                <div class="switch">
                                    <input id="<?php echo $todosusuarios['ing_correo']; ?>" type="checkbox">
                                    <label for="<?php echo $todosusuarios['ing_correo']; ?>"></label>
                                </div> 
                                <?php
                            }
                            ?></td>
                        <td align="center"><button type="button"  class="modificar button radius" idpadre="<?php echo $todosusuarios['ing_id']; ?>">Modificar</button></td>
                        <td align="center"><button type="button"  data-reveal-id="firstModal"   class="button radius permiso" usuarioid="<?php echo $todosusuarios['ing_id']; ?>">Roles</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="alerta"></div>
    </div>
</div>


<div id="firstModal2" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal2"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <center><h2 id="firstModalTitle">CREACIÒN DE USUARIOS</h2></center> 

        <form method="post" id="creacionusuario">
            <div class="row">    
                <div class="large-6 columns">
                    <label>Correo</label><input type="text" placeholder="Correo" id="email" name="ing_correo" class="obligatorio form-control">
                </div>
                <div class="large-6 columns">
                    <label>Tipo Usuario</label>
                    <select name="tipUsu_id">
                        <option value="">-Seleccionar-</option>
                        <?php foreach ($tipo_usuario as $tusuario) { ?>
                            <option value="<?php echo $tusuario['tipUsu_id'] ?>"><?php echo $tusuario['tipUsu_nombre'] ?></option> 
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">    
                <div class="large-6 columns">
                    <label>Contraseña</label><input type="password" placeholder="Contraseña" id="contrasena" name="ing_contrasena" class="obligatorio form-control">
                </div>
                <div class="large-6 columns">
                    <label>Repetir Contraseña</label>
                    <input type="password" id="rcontrasena"  placeholder="Repetir contraseña" class="obligatorio form-control">
                </div>
            </div>
        </form>

        <div class="row" style="margin-top: 10px">
            <button type="button" class="button radius guardar">Guardar</button>
        </div>
    </div> 
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div>  

<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <center><h2 id="firstModalTitle">ASIGNACIÒN DE ROL</h2></center> 
        <div class="row">
            <div class="row">
                <div class="form-group has-success has-feedback">
                    <label>Roles</label>
                    <select id="roles" class="form-control">
                        <option value="">-Seleccionar-</option>
                        <?php foreach ($roles as $rol) { ?>
                            <option value="<?php echo $rol['rol_id']; ?>"><?php echo $rol['rol_nombre']; ?></option>
                        <?php } ?>
                    </select>
                    <button type="button" class="button radius insertarrol">Asignar</button>
                </div>
            </div>
            <div class="row">
                <form method="post" id="formulariopermisos">
                    <input type="hidden" name="usuarioid" id="usuarioid">
                    <div class="large-6 columns rolseleccionado">

                    </div>
                    <div class="large-6 columns permisomenu">

                    </div>
                </form>    
            </div>
        </div>
        <div class="row" style="margin-top: 10px" align="right">
            <button type="button" class="button radius guardarpermiso">Guardar</button>
        </div>
    </div> 
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div>

<style>
    .error{
        border: 2px solid #7d7d7d;
        background-color: lightgoldenrodyellow;
    }
</style>
<script>
    $('#ingresousuario').hide();

//------------------------------------------------------------------------------
//                      CREACIÒN DE USUARIO    
//------------------------------------------------------------------------------ 

    $('.guardar').click(function () {

        if ($('#contrasena').val() == $('#rcontrasena').val()) {
            var url = "<?= base_url('index.php/presentacion/creacionusuario') ?>"
            $.post(url, $('#creacionusuario').serialize()).done(function (msg) {

            }).fail(function (msg) {

            });
        }
    });

//------------------------------------------------------------------------------    
    $('.insertarrol').click(function () {

        $('.permisomenu *').remove();
        $('.rolseleccionado *').remove();

        var idusuario = $(this).attr('usuarioid');

        var idrol = $('#roles').val();
        var textrol = $('#roles option:selected').text();


        if (idrol != "") {
            $('.rolseleccionado').append('<input type="hidden" name="roluser" value="' + idrol + '"><div style="cursor:pointer" class="alert alert-success rolusuario" rolid="' + idrol + '">' + textrol + '</div>');
        }

        var url = "<?= base_url('index.php/presentacion/permisosporrol') ?>";

        $('.permisomenu *').remove();
        $.post(url, {idrol: idrol, idusuario: idusuario}, function (data) {
            $('.permisomenu').append(data);
        });


    });

    $('.modificar').click(function () {
        $('.obligatorio').val('');

        var id = $(this).attr('idpadre');
        var url = "<?= base_url('index.php/presentacion/consultausuario') ?>";
        $.post(url, {id: id}, function (data) {
            $('#usuario').val(data.usu_nombres_apellido);
            $('#email').val(data.usu_correo);
            $('#celular').val(data.usu_telF);
        });
    });

    $('body').delegate('.permiso', 'click', function () {
        
                    $('.permisomenu *').remove();
            $('.rolseleccionado *').remove();
            $('#roles').val('');
        
        var id = $(this).attr('usuarioid');
        $('#usuarioid').val(id);
        $('.insertarrol').attr('usuarioid', id);
        var url = "<?php echo base_url('index.php/presentacion/permisos') ?>";
        $.post(url, {id: id}, function (data) {
            

            
            $('.totalpermisos').html(data);
        });
    });

    $('body').delegate('.guardarpermiso', 'click', function () {

        var url = "<?php echo base_url('index.php/presentacion/guardarpermisos') ?>"

        $.post(url, $('#formulariopermisos').serialize(), function () {

        });

    });

    $('#insertarusuario').click(function () {
        $('.obligatorio').val('');
    });


</script>    