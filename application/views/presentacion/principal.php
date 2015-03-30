<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>
            BIENVENIDO
    </h5>
</div>
<?php
if (isset($inicio[0]->ini_p_inicio)) {
    ?>
    <div class="" style="border: 2px solid #CCC;padding: 15px;margin-top:3px;">
        <?php echo $inicio  [0]->ini_p_inicio; ?>
    </div>
    <?php
}
?>
<?php
if (isset($inicio2[0]->emp_inicio)) {
    ?>
    <div class="" style="border: 2px solid #CCC;padding: 15px;margin-top:3px;">
        <?php echo (isset($inicio2[0]->emp_inicio) ? $inicio2[0]->emp_inicio : "") ?>
    </div>
    <?php
}
?>