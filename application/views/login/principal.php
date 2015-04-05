
<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />


<style>
    body{
        background-image: url('<?php echo base_url('img/pattern.png') ?>');
    }
</style>

<nav class="top-bar" data-topbar>
    <ul class="title-area">

        <li class="name">
            <h1>
                <a href="#" data-reveal-id="firstModal">Iniciar sesion</a> 
            </h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
    </ul>
</nav>
<div class="large-12 columns"  >
    <ul class="example-orbit" data-orbit>
        <?php 
        if(!empty($imagenesslide)){
        foreach($imagenesslide as $img){ ?>
        <li><img  onerror="this.onerror=null;this.src='http://placehold.it/1350x400&amp;text=[%20img%1350%20]';" src="<?php echo base_url('uploads')."/".$img->emp_id."/".$img->sli_nombre_archivo; ?>"></li>
        <?php }}else{ ?>
           <li><img  onerror="this.onerror=null;this.src='http://placehold.it/1350x400&amp;text=[%20img%1350%20]';" src="http://placehold.it/1350x400&amp;text=[%20img%1350%20]"></li> 
        <?php } ?>
    </ul>
</div>
<div class="row" >
    <div class="large-12 small-12 columns right" style="padding-top: 3%">
        <form>
            <div class="row collapse">
                <div class="large-3 small-12 columns">
                    <a href="#" class="postfix button expand split">Categorias 
                        <span data-dropdown="drop"></span>
                    </a><br> 
                    <ul id="drop" class="f-dropdown" data-dropdown-content> 
                        <?php foreach ($categorias as $cat) { ?>
                            <li cat_id="<?php echo $cat->cat_id ?>" class="categorias"><a href="javascript:"><?php echo $cat->cat_categoria ?></a></li> 
                        <?php } ?>
                      
                    </ul>
                </div>
                <div class="large-7 small-12 columns">
                    <input type="text" placeholder="Buscar Producto"/>
                </div>
                <div class="large-2 small-12 columns">
                    <a href="#" class="postfix button expand">Buscar</a>
                </div>
            </div>
        </form>
    </div>
</div>s
<?php
$i = 4;
$h = 1;
$g = 0;
$contador = count($imagenes);

foreach ($imagenes as $img) {

    if ($i == 4) {
        ?>

        <div class="row">
            <div class="large-12 columns">
                <div class="row">
                <?php } ?>    
                <div class="large-3 small-6 columns" >
                    <img  onerror="this.onerror=null;this.src='http://placehold.it/250x250&text=NYGSOFT';" class="imagenes" img_id="<?php echo $img->imgEnc_id; ?>" style="cursor: pointer;width: 100%;height: 26%" src="<?php echo base_url('uploads' . "/" . $img->id_emp . "/" . $img->imgDet_nombre); ?>"/>
                    <div class="large-12 small-12 columns panel" >
                        <div class="large-8 small-8 columns">
                            <h6 ><?php echo $img->imgEnc_nombre ?></h6>
                        </div>
                        <div class="large-4 small-4 columns">
                            <img  onerror="this.onerror=null;this.src='http://placehold.it/250x250&text=NYGSOFT';" class="imagenes" img_id="<?php echo $img->imgEnc_id; ?>" style="cursor: pointer;width: 100%;height: 5%" src="<?php echo base_url('img/carrito.jpg'); ?>"/>
                        </div>
                    </div>
                </div>
                <?php if ($h == 4 || $contador == $g + 1) { ?>        
                </div>
            </div>
        </div>  
        <?php
        $i = 4;
        $h = 0;
    } else {
        $i = 0;
    }
    $h++;
    $g++;
}
?>
<div class="row">
    <center>
        <form method="post" id="f1">
            <ul class="pagination"> 
                <li class="arrow unavailable">
                    <!--<a href="">&laquo;</a></li>--> 
                <?php
                for ($i = 0; $i < $numeracion; $i++) {
                    if ($i + 1 == $numero)
                        $class = "class='current'";
                    else
                        $class = '';
                    ?>
                    <li <?php echo $class ?> class="numeracion"><a href="javascript:"><?php echo $i + 1; ?></a></li> 
                <?php } ?>
                <!--<li class="arrow"><a href="">&raquo;</a></li>--> 
            </ul>
        </form>    
    </center>
</div>
<footer class="row">
    <div class="large-12 columns">
        <hr>
        <div class="row">
            <div class="large-12 columns">
                <p>© Copyright NYGSOFT.COM 2015-2020</p>
            </div>
        </div>
    </div>
</footer>

<!--MODAL-->
<!-- Reveal Modals begin --> 
<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <h2 id="firstModalTitle">INICIO SESION</h2> 
        <form method="post" action="<?php echo base_url('index.php/login/verify') ?>">
            <label>CORREO</label><input type="text" name="username">
            <label>CONTRASEÑA</label><input type="password" name="password">
            <input type="submit" class="button radius success" value="INGRESAR">
        </form>
    </div> 
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div> 

<script>
    
//  -----------------------------------------------------------------------------
//                      AUTOCOMPLETAR  
//  -----------------------------------------------------------------------------  
//    $(function () {
//        function log(message) {
//            $("<div>").text(message).prependTo("#log");
//            $("#log").scrollTop(0);
//        }
//        $("#buscarproducto").autocomplete({
//            source: function (request, response) {
//                $.ajax({
//                    url: "<?php echo base_url('index.php/login/autocomplete') ?>",
//                    dataType: "jsonp",
//                    data: {
//                        q: request.term
//                    },
//                    success: function (data) {
//                        
//                        response(data);
//                        
//                    }
//                });
//            },
//            minLength: 3,
//            select: function (event, ui) {
//            
//                log(ui.item ?
//                        "Selected: " + ui.item.label :
//                        "Nothing selected, input was " + this.value);
//            },
//            open: function () {
//                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
//            },
//            close: function () {
//                $(this).removeClass("ui-cor ner-top").addClass("ui-corner-all");
//            }
//        });
//    });
//------------------------------------------------------------------------------

    $('.imagenes').click(function () {
        var id = $(this).attr('img_id');
        var form = "<form method='post' action='<?php echo base_url('index.php/login/producto'); ?>' id='producto'>";
        form += "<input type='hidden' value='" + id + "' name='img'>";
        form += "</form>";

        $('body').append(form);

        $('#producto').submit();
    });
    $('.categorias').click(function () {
        var id = $(this).attr('cat_id');
        var form = "<form method='post' action='<?php echo base_url('index.php/login/index'); ?>' id='producto'>";
        form += "<input type='hidden' value='" + id + "' name='categoria'>";
        form += "</form>";

        $('body').append(form);

        $('#producto').submit();
    });

    $(document).foundation();

    $('.numeracion').click(function () {
        var numeracion = $(this).text();
        $('#f1').append('<input type="hidden" value="' + numeracion + '" name="numeracion">');
        $('#f1').submit();
    });

</script>