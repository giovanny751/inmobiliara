<div class="alert alert-info"><center><b>ADMINISTRACI�N DE MODULOS</b></center></div>
<div class="row">
    <button type="button" data-toggle="modal" data-target="#myModal2"  class="btn btn-info opciones">Nuevo Modulo</button>
</div>
<?php if (!empty($nombrepadre)) {
    ?> <div padre="<?= $hijo ?>"  class="row devolver" ><b><?= $nombrepadre ?></b></div>
<?php } else { ?>
    <div class="row devolver"><b>Principal</b></div>
<?php } ?>
<div class="row">
    <form method="post" id="formulario">
        <div class="table-responsive">
            <table class="table" align="center" border="1">
                <thead>
                <th align="center">Nombre</th>
                <th align="center">Opción</th>
                <th align="center">Sub Modulo</th>
                </thead>
                <tbody id="cuerpomodulo">
                    <?php if (empty($menu)) { ?><tr><td colspan="3" align="center">No Existen Datos</td></tr><?php } ?>
                    <?php foreach ($menu as $modulo) { ?>
                        <tr id="<?= $modulo['menu_id'] ?>">
                            <td><?= $modulo['menu_nombrepadre'] ?></td>
                            <td align="center"><button type="button" data-toggle="modal" data-target="#myModal"  class="btn btn-info opciones"  idgeneral="<?= $modulo['menu_id'] ?>" nombre="<?= $modulo['menu_nombrepadre'] ?>" idpadre="<?= $modulo['menu_id'] ?>" >Opción</button>
                                <!--<button  >Option</button>-->
                            </td>
                            <td align="center"><input type="radio" class="submodulo" idgeneral="<?= $modulo['menu_id'] ?>" idpadre="<?= $modulo['menu_idpadre'] ?>" nombrepadre="<?= $modulo['menu_nombrepadre'] ?>" name="submodulo" menu="<?= $modulo['menu_idhijo'] ?>"></td>
                        </tr>    
                    <?php } ?>
                </tbody>    
            </table>
        </div>
        <input type="hidden" id="menu" name="menu">
        <input type="hidden" id="nombrepadre" name="nombrepadre">
        <input type="hidden" id="idgeneral" name="idgeneral">
    </form> 
</div>    
<div id="desicion">
    <input type="hidden" id="papa">

</div>    

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificacion</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Editar</h5>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Nombre</label><input type="text" id="nombre" class="form-control">
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Controlador</label><input type="text" name="controlador" id="controlador"  class="form-control">
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Accion</label><input type="text" name="accion" id="accion"  class="form-control">
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Estado</label>
                                <select id="estado"  class="form-control">
                                    <option value="">-Seleccionar-</option>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" class="btn btn-success guardar">Guardar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button"  class="btn btn-danger eliminar">Eliminar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>    
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Creacion de Menu</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Nuevo</h5>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Nombre Menu</label><input type="text" placeholder="Modulo" id="modulo" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-12 col-lg-12 col-sm-12 col-sx-12 margenlogo' align='right' >
                        <button type="button" general="<?= $idgeneral ?>" padre="<?= $hijo ?>" class="btn btn-success" id="guardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<form method="post" id="redireccion">
    <input type="hidden" name="idgeneral" id="idgeneral2">
    <input type="hidden" name="nombrepadre" id="nombrepadre2">
</form>    
<script>

    $('#desicion').hide();
    $('body').delegate(".opciones", "click", function() {
        var idgeneral = $(this).attr('idgeneral');
        $('.eliminar').attr('generalid', idgeneral);
        $('.guardar').attr('generalid', idgeneral);

        var url = "<?= base_url('index.php/presentacion/consultadatosmenu') ?>";
        $.post(url, {idgeneral: idgeneral}, function(data) {
            $('.modal-backdrop').css('z-index', '-1');
            $('#nombre').val(data['menu_nombrepadre']);
            $('#papa').val(data['menu_idpadre']);
            $('#controlador').val(data['menu_controlador']);
            $('#accion').val(data['menu_accion']);
            $('#estado').val(data['menu_estado']);
        });

        var idpadre = $(this).attr('idpadre');
        var nombre = $(this).attr('nombre');
//        $('#eliminar').attr('idgeneral',idgeneral);


    });

    $('body').delegate('.eliminar', 'click', function() {

        var idgeneral = $(this).attr('generalid');

        var url = "<?= base_url('index.php/presentacion/eliminarmodulo') ?>";
        $.post(url, {idgeneral: idgeneral}, function(data) {

            $('#myModal').modal('hide');

        });

    })

    $('a').click(function() {

        var papa = $(this).attr('padre');

        $('a').each(function(key, val) {

            if ($(this).attr('padre') > papa) {
                $(this).remove();
            }
        });
        var menuaseguir = $('.devolver b').html();

        $('#idgeneral2').val(papa);
        $('#nombrepadre2').val(menuaseguir);
        $('#redireccion').attr('href', "<?= base_url('index.php/presentacion/menu') ?>");
        $('#redireccion').submit();
    });

    $('#guardar').click(function() {
        var modulo = $('#modulo').val();
        var padre = $(this).attr('padre');
        var general = $(this).attr('general');
        var url = "<?= base_url('index.php/presentacion/guardarmodulo') ?>";

        $.post(url, {modulo: modulo, padre: padre, general: general}, function(data) {
            $('#cuerpomodulo *').remove();
            var tabla = "";
            $.each(data, function(key, val) {
                tabla += "<tr><td>" + val.menu_nombrepadre + "</td><td align='center'><button class='btn btn-info opciones' data-target='#myModal' data-toggle='modal' idpadre='" + val.menu_idpadre + "' nombre='" + val.menu_nombrepadre + "' idgeneral='" + val.menu_id + "' type='button'>Opcion</button></td><td align='center'><input menu='" + val.menu_idhijo + "' nombrepadre='" + val.menu_nombrepadre + "' idgeneral='" + val.menu_id + "' type='radio' name='submodulo' class='submodulo'></td></tr>";
            });
            $('#cuerpomodulo').append(tabla);
            $('#modulo').val('');
            $('#myModal2').modal('hide');
            $.notific8('Los Datos en Formacion Fueron Guardados.', {
                horizontalEdge: 'bottom',
                life: 5000,
                theme: 'amethyst',
                heading: 'EXITO'
            });
        });
    });

    $('body').delegate('.guardar', 'click', function() {

        var id = $(this).attr('generalid');
        var nombre = $('#nombre').val();
        var controlador = $('#controlador').val();
        var accion = $('#accion').val();
        var estado = $('#estado').val();

        var url = "<?= base_url('index.php/presentacion/guardaratributosmenu') ?>";

        $.post(url, {id: id, nombre: nombre, controlador: controlador, accion: accion, estado: estado}, function(data) {
            $('#myModal').modal('hide');
        });


    });

    $('body').delegate(".submodulo", "click", function() {
        var papa = $(this).attr('menu');

        var nombrepadre = $(this).attr('nombrepadre');
        var idgeneral = $(this).attr('idgeneral');

        var menuaseguir = $('.devolver b').html();

        console.log(menuaseguir);

        $('#menu').val(papa);
        $('#idgeneral').val(idgeneral);
        $('#nombrepadre').val(menuaseguir + "<i class='glyphicon glyphicon-chevron-right'></i><a padre='" + papa + "'>" + nombrepadre + "</a>");
        $('#formulario').attr('href', "<?= base_url('index.php/presentacion/menu') ?>");
        $('#formulario').submit();
    });


</script>    