<div class="alert alert-info"><center><b>ADMINISTRACIÒN DE ROLES</b></center></div>
<div class="row">
    <button type="button"  data-reveal-id="firstModal2"  class="btn btn-info opciones">Nuevo Rol</button>
</div>
<div class="row">
    <div class="table-responsive ">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Opciones</th>
            <th>Eliminar</th>
            </thead>
            <tbody id="cuerporol">
                <?php foreach ($roles as $datos) { ?>
                    <tr>
                        <td><?php echo $datos['rol_nombre']; ?></td>
                        <td><?php echo $datos['rol_estado']; ?></td>
                        <td align="center"><button type="button" rol="<?php echo $datos['rol_id']; ?>"  data-toggle="modal" data-target="#myModal"  class="button radius modificar">Opciones</button></td>
                        <td align="center"><button type="button" rol="<?php echo $datos['rol_id']; ?>" class="button alert radius eliminar">Eliminar</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
</div>

<div id="firstModal2" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
            <h2 id="firstModalTitle">ROLES</h2> 
        <div class="row" >
                        <form id="nuevorol" method="post">
                            <input type="hidden" id="rol" name="rol">
                            <div class="form-group agregarrol">

                            </div>
                            <div class="form-group"  style="overflow: scroll;height: 250px;">
                                <label>Permisos </label>
                                <?php
                                echo $content;
                                ?>
                            </div>
                        </form>    
                    </div>
        <div class="row" style="margin-top: 10px">
            <button type="button" class="button guardar">Guardar</button>
        </div>
    </div> 
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div>   

    <script>


//------------------------------------------------------------------------------
//                      ELIMINAR ROL    
//------------------------------------------------------------------------------ 

    $('body').delegate('.eliminar', 'click', function() {

        var id = $(this).attr('rol');

        var url = "<?php echo base_url('index.php/presentacion/eliminarrol'); ?>";
        $.post(url, {id: id}).done(function(msg){
            
        }).fail(function(msg){
            
        });
        $(this).parents('tr').remove();
    });

//------------------------------------------------------------------------------
//                      NUEVO ROL    
//------------------------------------------------------------------------------    
    $('body').delegate('.guardar', 'click', function() {

        var url = "<?php echo base_url('index.php/presentacion/guardarroles'); ?>";

        $.post(url, $('#nuevorol').serialize(), function(data) {
                var filas = "";
                $.each(data, function(key, val) {

                    filas += "<tr>";
                    filas += "<td>" + val.rol_nombre + "</td>";
                    filas += "<td>" + val.rol_estado + "</td>";
                    filas += "<td align='center'><button type='button' rol='" + val.rol_id + "' class='btn btn-danger eliminar'>Eliminar</button></td>";
                    filas += "<td align='center'><button type='button' rol='" + val.rol_id + "' class='btn btn-info opciones'>Opciones</button></td>";
                    filas += "</tr>";
                });
                $('#cuerporol *').remove();
                $('#cuerporol').append(filas);
                $('#nombre').val('');
        });

    });

    $('.opciones').click(function() {

        $('input[type="checkbox"]').prop('checked', false);
        $('.agregarrol').append('<label >Nombre</label><input type="text" id="nombre" name="nombre" class="form-control">');
        $('#nombre').val('');
        $('.seleccionados').prop('checked', false);
    });

    $('.modificar').click(function() {

        var idrol = $(this).attr('rol');
        $('#rol').val(idrol);

        $('input[type="checkbox"]').prop('checked', false);
        $('.agregarrol *').remove();
        var url = "<?php echo base_url('index.php/presentacion/rolesasignados'); ?>";
        var id = $(this).attr('rol');
        $.post(url, {id: id}, function(data) {
            $.each(data, function(key, val) {
                $('.seleccionados[value=' + val.menu_id + ']').prop('checked', true);
            });
        });

    });
</script>