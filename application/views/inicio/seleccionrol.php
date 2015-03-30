<head>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>" type="text/javascript"></script>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<div class="container" style="margin-top: 10%;">
    <center><h3>Seleccion De Rol</h3></center>
    <br>
    <div class="table-responsive ">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <th>Rol</th>
            <th>Rol Por Defecto</th>
            </thead>
            <tbody>
                <?php foreach ($datos as $roles) { ?>
                    <tr>
                        <td><?php echo $roles['rol_nombre']; ?></td>
                        <td align="center"><input type="radio" name="defecto" class="seleccionrol"></td>
                    </tr>
                <?php } ?>
            </tbody>   
            <tfoot>
                <tr>
                    <td colspan="2" align="right">
                        <button type="button" id="guardar" class="btn btn-success">Guardar</button>
                        <button type="button" id='siguiente' class="btn btn-info">Siguiente</button>
                    </td>
                </tr>
            </tfoot>
        </table>    
    </div>
</div>
<script>
//------------------------------------------------------------------------------
//                  SIGUIENTE    
//------------------------------------------------------------------------------ 

$('#siguiente').click(function(){
    var seleccion = $('.seleccionrol').is(':checked');
    if(seleccion == true){
        
    }
});
//------------------------------------------------------------------------------
//                  GUARDAR    
//------------------------------------------------------------------------------    
$('#guardar').click(function(){
    var seleccion = $('.seleccionrol').is(':checked');  
    if(seleccion == true){
        
    }
});

</script>    