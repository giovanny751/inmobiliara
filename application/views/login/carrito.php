
<script src="<?php echo base_url('js/vendor/jquery.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.js') ?>"></script>
<script src="<?php echo base_url('js/foundation/foundation.reveal.js') ?>"></script>
<script src="<?php echo base_url('js/foundation.min.js" type="text/javascript') ?>"></script>
<link href="<?php echo base_url('css/foundation.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/foundation.min.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/normalize.css" rel="stylesheet" type="text/css') ?>" />
<link href="<?php echo base_url('css/font-awesome.css" rel="stylesheet" type="text/css') ?>" />

<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <center><h1>COTIZACIÓN DE PRODUCTOS</h1></center>
        </div>
    </div>
</div>

<div class="row">


    <div class="large-3 columns ">
        <div class="panel">
            <a href="#"><img src="<?php echo base_url('img/blanco.jpg') ?>" width="300px" height="240px"/></a>  
        </div>
    </div>
    <div class="large-9 columns">
        <?php // echo "<pre>";var_dump($this->cart->contents());die; ?>
        <div class="row">
            <!--<div class="large-2 columns small-3"><img src="http://placehold.it/80x80&text=[img]"/></div>-->
            <!--<div class="large-10 columns">-->
                <article class="contenido">
                    <?php echo anchor('index.php/', 'Volver al listado'); ?>
                    <hr>
                    <form action="<?php echo base_url(); ?>index.php/login/actualizar_carrito" method="post">
                        <table class="carrito" border="1" style="width: 100%">
                            <tr>
                                <th width="10%"><center>Imagen</center></th>
                                <th width="80%"><center>Nombre del producto</center></th>
                                <!--<th>Precio</th>-->
                                <th width="10%"><center>Cantidad</center></th>
                                <!--<th>Subtotal</th>-->
                            </tr>
                            <?php
                            foreach ($this->cart->contents() as $item):
                                ?>
                                <input type="hidden" name="rowid[]" value="<?php echo $item['rowid']; ?>">
                                <tr>
                                    <td>
                                        <?php
                                        if($item['options']['0'] != 'ya')echo $item['options']['0']; 
                                        else echo ""; 
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $item['name'];
                                        if ($this->cart->has_options($item['rowid']) === TRUE):
                                            ?>
                                        <?php endif; ?>
                                    </td>
                                    <!--<td>Bs.F. <?php echo number_format($item['price'], 2, ',', '.'); ?></td>-->
                                    <td>
                                        <input style="text-align: center" type="text" name="qty[]" value="<?php echo $item['qty']; ?>" maxlength="3" size="5">
                                    </td>
                                    <!--<td>Bs.F. <?php echo number_format($item['subtotal'], 2, ',', '.'); ?></td>-->
                                </tr>
                                <?php
                            endforeach;
                            ?>
<!--                            <tr>
                                <td colspan="1">
                                    <input type="submit" name="actualizar" value="Actualizar Carrito">
                                    <?php echo anchor('index.php/vaciar', 'Vaciar Carrito'); ?>
                                </td>
                                <td>Cantidad de productos</td>
                                <td>Bs.F. <?php echo number_format($this->cart->total(), 2, ',', '.'); ?></td>
                            </tr>-->
                        </table>
                    </form>
                </article>
            </div>
        <div class="row" align="right">
            <button type="button" class="button success radius"  data-reveal-id="firstModal">Enviar Cotización</button>
        </div>
        </div>
        <hr/>
    </div>
<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
    <div id="firstModal"  data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog"> 
        <h2 id="firstModalTitle"><center>REGISTRO USUARIO</center></h2> 
        <div class="row">
            <div class="large-2 columns"><label for="nombres">Nombres</label></div>
            <div class="large-4 columns"><input id="nombres" type="text" name="nombre" placeholder="Nombres"></div>
            <div class="large-2 columns"><label for="apellidos">Apellidos</label></div>
            <div class="large-4 columns" ><input id="apellidos" type="text" name="apellido" placeholder="Apellidos"></div>
        </div>
        <div class="row">
            <div class="large-2 columns" ><label for="nit">Nit</label></div> 
            <div class="large-4 columns">
                <input type="text" name="nit" placeholder="Nit" id="nit">
            </div>
            <div class="large-2 columns" ><label for="razon">Razón Social</label></div> 
            <div class="large-4 columns">
                <input type="text" name="razon" id="razon" placeholder="Razón Social">
            </div>
        </div>
        <div class="row">
            <div class="large-2 columns">
                <label for="comentario">Comentario</label>
            </div>
            <div class="large-10 columns">
                <textarea id="comentario" name="comentario" placeholder="Comentario"></textarea>
            </div>
        </div>
        <div class="row" style="margin-top: 2%">
            <div class="large-12 columns">
                <center>
                    <button type="button" class="button radius success">Enviar Cotización</button>
                </center>
            </div>
        </div>
    </div> 
    <a class="close-reveal-modal" aria-label="Close">&#215;</a> 
</div> 
<script>
 $(document).foundation();
</script>
