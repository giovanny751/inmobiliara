
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
        <div class="row">
            <!--<div class="large-2 columns small-3"><img src="http://placehold.it/80x80&text=[img]"/></div>-->
            <!--<div class="large-10 columns">-->
                <article class="contenido">
                    <?php echo anchor('index.php/login/lista_productos', 'Volver al listado'); ?>
                    <hr>
                    <form action="<?php echo base_url(); ?>index.php/login/actualizar_carrito" method="post">
                        <table class="carrito" border="1" style="width: 100%">
                            <tr>
                                <th width="90%"><center>Nombre del producto</center></th>
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
        </div>
        <hr/>
    </div>


