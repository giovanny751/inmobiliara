<div class="alert alert-info"><center>REPORTES</center></div>
<form method="post" action="<?php echo base_url('index.php/reportes/abrirxml') ?>"> 
    <div class="row" style="border: 2px solid #CCC;padding: 15px;margin-top:3px;height: 300px">
        <?php
        echo $logicareportes;
        ?>
    </div>
    <div class="row" align="center">
        <input type="submit" class="btn btn-success" value="REPORTE">
    </div>
</form>
