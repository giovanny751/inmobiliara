<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />

<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>


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
        <div class="hide-for-small">
            <div id="featured">
                <img src="http://placehold.it/1000x400&text=Slide Image" alt="slide image"> 
            </div>
        </div>
        <div class="row">
            <div class="small-12 show-for-small"><br>
                <img src="http://placehold.it/1000x600&text=For Small Screens"/>
            </div>
        </div>
    </div>
</div><br>
<div class="row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-3 small-6 columns">
                <img src="http://placehold.it/250x250&text=Thumbnail"/>
                <h6 class="panel">Description</h6>
            </div>
            <div class="large-3 small-6 columns">
                <img src="http://placehold.it/250x250&text=Thumbnail"/>
                <h6 class="panel">Description</h6>
            </div>
            <div class="large-3 small-6 columns">
                <img src="http://placehold.it/250x250&text=Thumbnail"/>
                <h6 class="panel">Description</h6>
            </div>
            <div class="large-3 small-6 columns">
                <img src="http://placehold.it/250x250&text=Thumbnail"/>
                <h6 class="panel">Description</h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-8 columns">
                <div class="panel radius">
                    <div class="row">
                        <div class="large-6 small-6 columns">
                            <h4>Header</h4><hr/>
                            <h5 class="subheader">Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum odio ornare sagittis.
                            </h5>
                            <div class="show-for-small" align="center">
                                <a href="#" class="small radius button">Call To Action!</a><br>

                                <a href="#" class="small radius button">Call To Action!</a>
                            </div>
                        </div>
                        <div class="large-6 small-6 columns">
                            <p>Suspendisse ultrices ornare tempor. Aenean eget ultricies libero. Phasellus non ipsum eros. Vivamus at dignissim massa. Aenean dolor libero, blandit quis interdum et, malesuada nec ligula. Nullam erat erat, eleifend sed pulvinar ac. Suspendisse ultrices ornare tempor. Aenean eget ultricies libero.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="large-4 columns hide-for-small">
                <h4>Get In Touch!</h4><hr/>
                <a class="large button expand" href="#">
                    Call To Action!
                </a>
                <a class="large button expand" href="#">
                    Call To Action!
                </a>
            </div>
        </div>
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
    $(document).foundation();
</script>