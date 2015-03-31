<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />

<?php

function modulos($datosmodulos, $idusuario, $dato = null, $papito = null) {

    $ci = &get_instance();

    $ci->load->model("ingreso_model");
    $user = null;
    $menu = $ci->ingreso_model->menu($datosmodulos, $idusuario, 2);
    $i = array();
    foreach ($menu as $modulo)
        $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion']);

    if ($datosmodulos == 'prueba'){
    echo "<ul class='off-canvas-list'>";}
    else
    {
        echo "<ul class='left-submenu'>";
        echo "<li class='back'><a href='#'>Atras</a></li>";
        echo "<li><label>".$papito."</label></li>";
    }
    foreach ($i as $padre => $nombrepapa):
//            
        foreach ($nombrepapa as $nombrepapa => $menuidpadre):
            foreach ($menuidpadre as $modulos => $menu):
                    
                foreach ($menu as $submenus):
                    if ($submenus[1] == "" && $submenus[2] == "") {
                        
                        echo "<li class='has-submenu'><a href='#'>" . strtoupper($nombrepapa). "</a>";
//                        
                    } else {
                        echo "<li><a href='" . base_url("index.php/" . $submenus[1] . "/" . $submenus[2]) . "'>" . strtoupper($nombrepapa) . "</a>";
                    }
                    if (!empty($submenus[0])) {
                        modulos($submenus[0], $idusuario, null, strtoupper($nombrepapa));
                    }
                    echo "</li>";
                endforeach;
            endforeach;
        endforeach;
    endforeach;
    echo "</ul>";
}

?>

<div class="off-canvas-wrap" data-offcanvas> 
    <div class="inner-wrap"> <nav class="tab-bar"> 
            <section class="left-small"> <a class="left-off-canvas-toggle menu-icon" ><span></span></a> </section> 
            <section class="middle tab-bar-section"> <h1 class="title">NYGSOFT</h1> </section> 
            <section class="right tab-bar-section" style="cursor:pointer"><h5 class="title"><a href="<?php echo base_url('index.php/login/logout') ?>">Cerrar Sesion</a></h5></section>
        </nav> 
        <aside class="left-off-canvas-menu"> 
            <?php  echo modulos('prueba', $id); ?>
        </aside> 
        <section class="main-section" style="height: 100%">
            <?php echo $content_for_layout ?>
        </section> 
    </div> 
</div>

<script>
    $(document).foundation();
</script>