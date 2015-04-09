<article class="contenido">
    <?php echo anchor('index.php/login/mostrar_carrito','Ver carrito');?>
    <hr>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Opciones</th>
            <th>Cantidad</th>
            <th></th>
        </tr>
        <form action="<?php echo base_url('index.php'); ?>/login/agregar_carrito" method="post">
            <tr>
                <td>
                    cod_001
                    <input type="hidden" name="id_producto" value="cod_001">
                </td>
                <td>
                    Franelas
                    <input type="hidden" name="nombre_producto" value="Franelas">
                </td>
                <td>
                    90 Bs.F.
                    <input type="hidden" name="precio_producto" value="90">
                </td>
                <td>
                    <select name="opciones[talla]">
                        <option value="" selected="selected">SELECCIONE</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                    <select name="opciones[color]">
                        <option value="" selected="selected">SELECCIONE</option>
                        <option value="Blanco">Blanco</option>
                        <option value="Rojo">Rojo</option>
                        <option value="Negro">Negro</option>
                        <option value="Azul">Azul</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="cantidad" maxlength="3">
                </td>
                <td>
                    <input type="submit" name="agregar" value="Agregar">
                </td>
            </tr>
        </form>
        <form action="<?php echo base_url('index.php'); ?>/login/agregar_carrito" method="post">
            <tr>
                <td>
                    cod_054
                    <input type="hidden" name="id_producto" value="cod_054">
                </td>
                <td>
                    Zapatos
                    <input type="hidden" name="nombre_producto" value="Zapatos">
                </td>
                <td>
                    840 Bs.F.
                    <input type="hidden" name="precio_producto" value="840">
                </td>
                <td>
                    <select name="opciones[talla]">
                        <option value="" selected="selected">SELECCIONE</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                    </select>
                    <select name="opciones[color]">
                        <option value="" selected="selected">SELECCIONE</option>
                        <option value="Blanco">Blanco</option>
                        <option value="Marrón">Marrón</option>
                        <option value="Negro">Negro</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="cantidad" maxlength="3">
                </td>
                <td>
                    <input type="submit" name="agregar" value="Agregar">
                </td>
            </tr>
        </form>
        <form action="<?php echo base_url('index.php'); ?>/login/agregar_carrito" method="post">
            <tr>
                <td>
                    cod_769
                    <input type="hidden" name="id_producto" value="cod_769">
                </td>
                <td>
                    Laptop
                    <input type="hidden" name="nombre_producto" value="Laptop">
                </td>
                <td>
                    12980 Bs.F.
                    <input type="hidden" name="precio_producto" value="12980">
                </td>
                <td></td>
                <td>
                    <input type="text" name="cantidad" maxlength="3">
                </td>
                <td>
                    <input type="submit" name="agregar" value="Agregar">
                </td>
            </tr>
        </form>
    </table>
</article>