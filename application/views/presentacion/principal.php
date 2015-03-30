
<fieldset><legend>BIENVENIDO</legend>

<?php
if (isset($inicio[0]->ini_p_inicio)) {
    ?>
    <div class="panel">
        <?php echo $inicio  [0]->ini_p_inicio; ?>
    </div>
    <?php
}
?>
<?php
if (isset($inicio2[0]->emp_inicio)) {
    ?>
    <div class="panel">
        <?php echo (isset($inicio2[0]->emp_inicio) ? $inicio2[0]->emp_inicio : "") ?>
    </div>
    <?php
}
?>
</fieldset>


