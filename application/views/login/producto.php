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



<div class="row" style="margin-top: 3%;">
    <div class="large-3 small-4 columns">
        <h1><img src="<?php echo base_url('img/blanco.jpg') ?>"></h1>
    </div>
    <div class="large-9 small-8 columns right" style="padding-top: 6%">
        <form>
            <div class="row collapse">
                <div class="large-10 small-8 columns">
                    <input type="text"/>
                </div>

                <div class="large-2 small-4 columns">
                    <a href="#" class="postfix button expand">Search</a>
                </div>
            </div>
        </form>
    </div>
</div>





<div class="row">
    <hr>
    <center><h4><?php echo $datos[0]->imgEnc_nombre ?></h4></center>
    <hr>
    <div class="large-2 small-12 columns" >
        <?php foreach ($datos as $imagenes) { ?>
            <div class="large-12 small-3 columns subimagenes" >
                <img class="imagenes" dato  src="<?php echo base_url('uploads' . "/" . $imagenes->id_emp . "/" . $imagenes->imgDet_nombre); ?>">
            </div>
        <?php } ?>
    </div>
    <div  class="large-5 small-12 columns ">
        <div class="large-12 small-12 imgprincipal" style="width: 100%;height: 75%">
             <img  src="<?php echo base_url('uploads' . "/" . $datos[0]->id_emp . "/" . $datos[0]->imgDet_nombre); ?>">
        </div>
    </div>
    <div class="large-5 columns">
        <h4>DESCRIPCIÓN</h4>
        <p>
            <?php
            $datos = str_replace("a", " ", $datos[0]->imgEnc_descripcion_larga);
            echo $datos
            ?> 
        </p>

        <div class="panel">
            <h5>Header</h5>
            <h6 class="subheader">Praesent placerat dui tincidunt elit suscipit sed.</h6>
            <a href="#" class="small button">Adjuntar a la cotización</a>
        </div>

    </div>
</div>

<div class="row">
    <hr/>
    <div class="large-6 columns">
        <h4>This is a content section.</h4>
        <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
    </div>
    <div class="large-6 columns">
        <h4>This is a content section.</h4>
        <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p>
    </div>
</div>

<div class="row">
    <hr>
    <div class="large-12 columns">
        <h4>PRODUCTOS</h4>
        <img src="http://placehold.it/200x150&text=[img]">
        <img src="http://placehold.it/200x150&text=[img]">
        <img src="http://placehold.it/200x150&text=[img]">
        <img src="http://placehold.it/200x150&text=[img]">
    </div>
</div>

<footer class="row">
    <div class="large-12 columns">
        <hr>
        <div class="row">
            <div class="large-6 columns">
                <p>© Copyright no one at all. Go to town.</p>
            </div>
            <div class="large-6 columns">
                <ul class="inline-list right">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script>
    $(document).foundation();
    $('.subimagenes').mouseover(function () {

        var dato = $(this).html();
        
        var objeto = dato.replace('dato','style="width: 100%;height: 100%"')
        
//        console.log(objeto);
        
        $('.imgprincipal').html(objeto);

    });
</script>
