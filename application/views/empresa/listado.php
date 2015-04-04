<div class="row">
    <center><h1>Mis Productos</h1></center>
    <table>
        <thead>
        <th>Num</th>
        <th>Nombre</th>
        <th>Descripcion Corta</th>
        <th>Imagen</th>
        <th>Acción</th>
        </thead>
        <tbody>
            <?php
            $i = (($num*10)-10)+1;
            foreach ($listado as $poductos) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $poductos->imgEnc_nombre ?></td>
                    <td><?php echo $poductos->imgEnc_descripcion_corta ?></td>
                    <td><img src='<?php echo base_url() . "uploads/" . $poductos->id_emp . "/" . $poductos->imgDet_nombre ?>'></td>
                    <td>
                        <i class="fa fa-trash-o fa-fw" title="Eliminar"></i>
                        <i class="fa fa-eye" title="Activo"></i>
                        <i class="fa fa-pencil" title="Editar"></i>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>

</div>
<div class="row">

    <?php
    $numero = ceil($cantidad[0]->cantidad / 10);
    ?>

    <div class="pagination-centered">
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $numero; $i++) {
                if ($num == $i) {
                    $cl = 'current';
                } else {
                    $cl = '';
                }
                ?>
                <li class="<?php echo $cl ?>"><a href="<?php echo base_url('index.php/Empresa/listado') . "/".encrypt_id($i) ?>"><?php echo $i ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <br><p>
</div>

<style>
    img{
        width: 60px;
    }
    table{
        width: 100%;
    }
</style>