<div class="row">
    <?php
//    echo print_y($listado);
    ?>
    <form action="<?php echo base_url('index.php/Empresa/listado') ?>"  id="form1" method="post" onsubmit="return activar();">
        <center><h1>Información General</h1></center>
        <div  class="large-12 columns" >
            <div  class="large-2 columns" ><label for='imgEnc_nombre'>Nombre</label> </div>
            <div  class="large-4 columns" ><input type="text" id="imgEnc_nombre" name="imgEnc_nombre"/> </div>
            <div  class="large-2 columns" ><label for='imgEnc_descripcion_corta'>Descripción Corta</label></div>
            <div  class="large-4 columns" ><input type="text" id="imgEnc_descripcion_corta" name="imgEnc_descripcion_corta"/> </div>
        </div>
        <div  class="large-12 columns" >
            <div  class="large-2 columns" ><label for='cat_id'>Categoria</label> </div>
            <div  class="large-4 columns" >
                <select name="cat_id" id="cat_id">
                    <option value="">-Seleccionar-</option>
                    <?php foreach ($categorias as $cat) { ?>
                        <option value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_categoria ?></option>
                    <?php } ?>
                </select>
                <p>
            </div>
            <div  class="large-2 columns" ><label for='subCat_id'>Sub Categoria</label> </div>
            <div  class="large-4 columns" >
                <select id="subCat_id" name="subCat_id">
                    <option value=""></option>
                </select><p>
            </div>
        </div>

        <div  class="large-12 columns" >
            <div  class="large-2 columns" ><label for='imgEnc_descripcion_larga'>Descripción Larga</label> </div>
            <div  class="large-10 columns" ><input type="text" id="imgEnc_descripcion_larga" name="imgEnc_descripcion_larga" ></div>
        </div>
        <div  class="large-12 columns" >
            <center><button  class="button tiny"> Consultar </button></center><p><br><p>
        </div>
    </form>

    <center><h1>Mis Productos</h1></center>
    <table>
        <thead>
        <th>Num</th>
        <th>Nombre</th>
        <th>Descripcion Corta</th>
        <th>Categoria</th>
        <th>Imagen</th>
        <th>Acción</th>
        </thead>
        <tbody>
            <?php
            $i = (($num * 10) - 10) + 1;
            foreach ($listado[0] as $poductos) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $poductos->imgEnc_nombre ?></td>
                    <td><?php echo $poductos->imgEnc_descripcion_corta ?></td>
                    <td><?php echo $poductos->cat_categoria ?></td>
                    <td><img src='<?php echo base_url() . "uploads/" . $poductos->id_emp . "/" . $poductos->imgDet_nombre ?>'></td>
                    <td>
                <a href="<?php echo base_url('index.php/Empresa/inactivar') . "/" . encrypt_id($num) . "/" . encrypt_id($poductos->imgEnc_id) . "/" . encrypt_id(3) ?>"><i class="fa fa-trash-o fa-fw fa-2x" title="Eliminar"></i></a>
                <?php if ($poductos->est_id == 1) { ?>
                    <a href="<?php echo base_url('index.php/Empresa/inactivar') . "/" . encrypt_id($num) . "/" . encrypt_id($poductos->imgEnc_id) . "/" . encrypt_id(2) ?>"><i class="fa fa-eye fa-2x" title="Activo"></i></a>
                <?php } else { ?>
                    <a href="<?php echo base_url('index.php/Empresa/inactivar') . "/" . encrypt_id($num) . "/" . encrypt_id($poductos->imgEnc_id) . "/" . encrypt_id(1) ?>"><i class="fa fa-eye-slash fa-2x" title="Inactivo"></i></a>
                <?php } ?>
                    <a href="<?php echo base_url('index.php/Empresa/imagenesempresa') . "/" . encrypt_id($poductos->imgEnc_id); ?>"><i class="fa fa-pencil fa-2x" title="Editar"></i></a>
            
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
    $numero = ceil(count($listado[1]) / 10);
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
                <li class="<?php echo $cl ?>"><a href="<?php echo base_url('index.php/Empresa/listado') . "/" . encrypt_id($i) ?>"><?php echo $i ?></a></li>
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