    <div class="row">
        <center><h1>CREACION DE MENU</h1></center> 
    </div>
<div class="row">
    <button type="button" data-reveal-id="firstModal2"  class="button radius opciones">Nuevo Modulo</button>
</div>
<link type="text/css" media="screen" rel="stylesheet" href="<?php echo base_url('css/responsive-tables.css') ?>" />
<script type="text/javascript" src="<?php echo base_url('js/responsive-tables.js') ?>"></script>


<?php if (!empty($nombrepadre)) {
    ?> <div padre="<?= $hijo ?>"  class="row devolver" ><b><?= $nombrepadre ?></b></div>
<?php } else { ?>
    <div class="row devolver"><b>Principal</b></div>
<?php } ?>
<div class="row">
    <form method="post" id="formulario">
        <table class="responsive">
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
                        <td align="center"><button type="button" data-reveal-id="firstModal"  class="button radius opciones"  idgeneral="<?= $modulo['menu_id'] ?>" nombre="<?= $modulo['menu_nombrepadre'] ?>" idpadre="<?= $modulo['menu_id'] ?>" >Opción</button>
                            <!--<button  >Option</button>-->
                        </td>
                        <td align="center"><input type="radio" class="submodulo" idgeneral="<?= $modulo['menu_id'] ?>" idpadre="<?= $modulo['menu_idpadre'] ?>" nombrepadre="<?= $modulo['menu_nombrepadre'] ?>" name="submodulo" menu="<?= $modulo['menu_idhijo'] ?>"></td>
                    </tr>    
                <?php } ?>
            </tbody>    
        </table>
        <input type="hidden" id="menu" name="menu">
        <input type="hidden" id="nombrepadre" name="nombrepadre">
        <input type="hidden" id="idgeneral" name="idgeneral">
    </form>
</div>  
<div id="desicion">
    <input type="hidden" id="papa">

</div>    

<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <center><h2 id="firstModalTitle">MODIFICACIÒN MENU</h2></center> 
        <div class="row">
            <div class="large-12 columns">
                <label>Nombre</label><input type="text" id="nombre" class="form-control">
            </div>
            <div class="large-6 columns">
                <label>Controlador</label><input type="text" name="controlador" id="controlador"  class="form-control">
            </div>
            <div class="large-6 columns">
                <label>Accion</label><input type="text" name="accion" id="accion"  class="form-control">
            </div>
            <div class="large-12 columns">
                <label>Estado</label>
                <select id="estado"  class="form-control">
                    <option value="">-Seleccionar-</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px" align="right">

            <ul class="button-group">
                <li><button type="button" class="button radius guardar">guardar</button></li>
                <li><button type="button" class="button alert eliminar">Eliminar</button></li>
            </ul>

        </div>
    </div> 
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div>     
<div id="firstModal2" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <h2 id="firstModalTitle">CREACIÒN MENÙ</h2> 
        <div class="row">
            <label>Nombre Menù</label><input type="text" placeholder="Menu" id="modulo" class="form-control">
        </div>
        <div class="row" style="margin-top: 10px">

            <button type="button" general="<?= $idgeneral ?>" padre="<?= $hijo ?>" class="button radius success"  id="guardar">Guardar</button>

        </div>
    </div> 
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div>     

<form method="post" id="redireccion">
    <input type="hidden" name="idgeneral" id="idgeneral2">
    <input type="hidden" name="nombrepadre" id="nombrepadre2">
</form>    
<script>

    $('#desicion').hide();
    $('body').delegate(".opciones", "click", function () {
        var idgeneral = $(this).attr('idgeneral');
        $('.eliminar').attr('generalid', idgeneral);
        $('.guardar').attr('generalid', idgeneral);

        var url = "<?= base_url('index.php/presentacion/consultadatosmenu') ?>";
        $.post(url, {idgeneral: idgeneral}, function (data) {
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

    $('body').delegate('.eliminar', 'click', function () {

        var idgeneral = $(this).attr('generalid');

        var url = "<?= base_url('index.php/presentacion/eliminarmodulo') ?>";
        $.post(url, {idgeneral: idgeneral}, function (data) {  });

    })

    $('a').click(function () {

        var papa = $(this).attr('padre');

        $('a').each(function (key, val) {

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

    $('#guardar').click(function () {
        var modulo = $('#modulo').val();
        var padre = $(this).attr('padre');
        var general = $(this).attr('general');
        var url = "<?= base_url('index.php/presentacion/guardarmodulo') ?>";

        $.post(url, {modulo: modulo, padre: padre, general: general}, function (data) {
            $('#cuerpomodulo *').remove();
            var tabla = "";
            $.each(data, function (key, val) {
                tabla += "<tr><td>" + val.menu_nombrepadre + "</td><td align='center'><button class='button radius   opciones' data-target='#myModal' data-toggle='modal' idpadre='" + val.menu_idpadre + "' nombre='" + val.menu_nombrepadre + "' idgeneral='" + val.menu_id + "' type='button'>Opcion</button></td><td align='center'><input menu='" + val.menu_idhijo + "' nombrepadre='" + val.menu_nombrepadre + "' idgeneral='" + val.menu_id + "' type='radio' name='submodulo' class='submodulo'></td></tr>";
            });
            $('#cuerpomodulo').append(tabla);
            $('#modulo').val('');
            
        });
    });

    $('body').delegate('.guardar', 'click', function () {

        var id = $(this).attr('generalid');
        var nombre = $('#nombre').val();
        var controlador = $('#controlador').val();
        var accion = $('#accion').val();
        var estado = $('#estado').val();

        var url = "<?= base_url('index.php/presentacion/guardaratributosmenu') ?>";

        $.post(url, {id: id, nombre: nombre, controlador: controlador, accion: accion, estado: estado})
                .done(function(msg){
                    
                })
                .fail(function(msg){
                    
                });


    });

    $('body').delegate(".submodulo", "click", function () {
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