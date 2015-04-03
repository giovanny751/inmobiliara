<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />

<nav class="top-bar" data-topbar>
    <ul class="title-area">

        <li class="name">
            <h1>
                <a href="#" data-reveal-id="firstModal">Iniciar sesion</a> 
            </h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <ul class="right">
            <li class="divider"></li>
            <li class="has-dropdown">
                <a href="#">Main Item 1</a>
                <ul class="dropdown">
                    <li><label>Section Name</label></li>
                    <li class="has-dropdown">
                        <a href="#" class="">Has Dropdown, Level 1</a>
                        <ul class="dropdown">
                            <li><a href="#">Dropdown Options</a></li>
                            <li><a href="#">Dropdown Options</a></li>
                            <li><a href="#">Level 2</a></li>
                            <li><a href="#">Subdropdown Option</a></li>
                            <li><a href="#">Subdropdown Option</a></li>
                            <li><a href="#">Subdropdown Option</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li class="divider"></li>
                    <li><label>Section Name</label></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li class="divider"></li>
                    <li><a href="#">See all →</a></li>
                </ul>
            </li>
            <li class="divider"></li>
            <li><a href="#">Main Item 2</a></li>
            <li class="divider"></li>
            <li class="has-dropdown">
                <a href="#">Main Item 3</a>
                <ul class="dropdown">
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li class="divider"></li>
                    <li><a href="#">See all →</a></li>
                </ul>
            </li>
        </ul>
    </section>
</nav>
<div class="row">
    <div class="large-12 columns">
        <ul class="example-orbit" data-orbit> 
            <li> <img src="http://placehold.it/250x250&text=Thumbnail" /> 
                <div class="orbit-caption"> Caption One. </div> 
            </li> 
            <li class="active"> 
                <img src="http://placehold.it/250x250&text=Thumbnail" alt="slide 2" /> 
                <div class="orbit-caption"> Caption Two. </div> 
            </li> 
            <li> 
                <img src="http://placehold.it/250x250&text=Thumbnail" alt="slide 3" /> 
                <div class="orbit-caption"> Caption Three. </div> 
            </li> 
        </ul>
    </div>
</div>
<br>

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
                        <img class="imagenes" style="cursor: pointer" src="<?php echo base_url('uploads'."/".$img->id_emp."/".$img->imgDet_nombre); ?>"/>
                    <h6 class="panel"><?php echo $g."***".$contador; ?></h6>
                    </div>
                <?php if ($h == 4 || $contador == $g+1) { ?>        
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
            <a href="">&laquo;</a></li> 
            <?php for($i = 0; $i < $numeracion;$i++){ 
                if($i+1 == $numero)  $class = "class='current'";
                else $class = '';
                ?>
            <li <?php echo $class ?> class="numeracion"><a href="javascript:"><?php echo $i+1; ?></a></li> 
            <?php } ?>
            <li class="arrow"><a href="">&raquo;</a></li> 
        </ul>
        </form>    
    </center>
</div>
<footer class="row">
    <div class="large-12 columns">
        <hr>
        <div class="row">
            <div class="large-6 columns">
                <p>© Copyright NYGSOFT.COM 2015-2020</p>
            </div>
            <div class="large-6 columns">
                <ul class="inline-list right">
                    <li><a href="javascript:">Link 1</a></li>
                    <li><a href="javascript:">Link 2222222</a></li>
                    <li><a >Link 3</a></li>
                    <li><a >Link 4</a></li>
                </ul>
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
    
    $('.imagenes').click(function(){
        var form = "<form method='post' action='<?php echo base_url('index.php/login/producto'); ?>' id='producto'>";
            form += "<input type='hidden' value='2' name='img'>";
            form += "</form>";
            
         $('body').append(form);
         
         $('#producto').submit();
    });
    
    $(document).foundation();
    
    $('.numeracion').click(function(){
        var numeracion = $(this).text();
        $('#f1').append('<input type="hidden" value="'+numeracion+'" name="numeracion">');
        $('#f1').submit();
    });
        
</script>