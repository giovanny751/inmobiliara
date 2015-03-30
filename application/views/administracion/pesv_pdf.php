<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
$contenido = array('INTRODUCCIÓN', 'OBJETIVOS', 'Objetivos generales', 'Objetivos especificos', 'OBJETIVOS POR LINEA DE ACCION DEL PESV',
    'COMPROMISO DE LA ALTA DIRECCIÓN', 'RESPONSABLE DEL PESV', 'COMITE DE SEGURIDAD VÌAL', 'COMUNICACIÒN',
    'ESTADISTICAS', 'POLÍTICA DE SEGURIDAD VIAL', 'DIAGNOSTICO', 'IDENTIFICACIÓN  DE  PRIORIDADES  DE RIESGOS',
    'PLAN DE ACCION');

$contenidomenu = array(
    'INTRODUCCIÓN'=>array(), 
    'OBJETIVOS'=>array('Objetivos generales', 'Objetivos especificos'), 
    'OBJETIVOS POR LINEA DE ACCION DEL PESV'=>array(),
    'COMPROMISO DE LA ALTA DIRECCIÓN'=>array(), 
    'RESPONSABLE DEL PESV'=>array(), 
    'COMITE DE SEGURIDAD VÌAL'=>array(), 
    'COMUNICACIÒN'=>array(),
    'ESTADISTICAS'=>array(), 
    'POLÍTICA DE SEGURIDAD VIAL'=>array(), 
    'DIAGNOSTICO'=>array(), 
    'IDENTIFICACIÓN  DE  PRIORIDADES  DE RIESGOS'=>array(),
    'PLAN DE ACCION'=>array()
    );

//echo "<pre>";
//var_dump($contenidomenu);die;

$i = 0;
?>

<!--<br><b>LOGO DE LA EMPRESA:</b>--> 
<?php if (!empty($empresa[0]->userfile)) { ?>

<div align="center"><img class="img_cl"  src="<?php echo base_url('/uploads/') . "/" . $empresa[0]->userfile ?>" ></div>
<?php }
?>

<h4><?php echo $empresa[0]->emp_razonSocial; ?></h4>
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    




<h4 class="ano"><?php echo date('Y'); ?></h4>
<span class="salto"></span>

<h2>CONENIDO</h2>

<?php 

echo "<ul>";
foreach($contenidomenu as $padre => $nhijo){
    echo "<li>$padre</li>";
    if(!empty($nhijo)){
        echo "<ul>";
    foreach($nhijo as $num => $hijo){
        echo "<li>$hijo</li>";
    }   
    echo "</ul>";
    }
}
echo "</ul>";

?>



<?php 
//foreach ($contenido as $value) {
//    $con=substr($value,0,2);
//    if(ctype_upper($con)){
//      echo $value."<br>";
//    }else{
//        
//        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value."<br>";  
//    }
//    
//}
?>

<span class="salto"></span>
<!----INTRODUCCIÓN<-->
<h2 class="principal"><?php echo $contenido[$i++] ?></h2>
<?php
if (!empty($introduccion[0]['int_introduccion'])) {
    echo "<div >" . $introduccion[0]['int_introduccion'] . "</div>";
//    echo "<div >" . $introduccion[0]['int_introduccion'] . "</div>";
}
?>
<span class="salto"></span>
<!----OBJETIVOS-->
<h2><?php echo $contenido[$i++] ?></h2>
<!----Objetivos generales-->
<h3><?php echo $contenido[$i++] ?></h3>
<?php
foreach ($general as $gen):
    ?>
    <div><?php echo utf8_encode($gen['objGen_objetivo']) ?></div>
<?php endforeach; ?>
    <!----Objetivos especificos-->
<h3><?php echo $contenido[$i++] ?></h3>
<?php foreach ($especificos as $esp) { ?>
    <div><?php echo utf8_encode($esp['objEsp_objetivo']) ?></div>
<?php } ?>
   <span class="salto"></span> 
<!----Objetivos por linea de accion del PESV-->
<h3><?php echo $contenido[$i++] ?></h3>
<?php
foreach ($lineaaccion as $accion => $objetivo) {
    echo "<b>" . $accion . "</b><ul>";
    foreach ($objetivo as $posicion => $obj) {
        echo "<li  style='line-height: 150%;'>" . utf8_encode($obj) . "</li>";
    }
    echo "</ul>";
}
?>
<span class="salto"></span>
<!----COMPROMISO DE LA ALTA DIRECCIÓN-->
<h2><?php echo $contenido[$i++] ?></h2>
<p>Los miembros de la alta dirección que aparecen a continuación: </p>
<?php
foreach ($miembros as $miembro):
    ?>
    <p>
        <label>Nombre: </label><?php echo $miembro['mie_nombre'] ?><br>
        <label>Cargo: </label><?php echo $miembro['mie_cargo'] ?>
    </p>
    <?php
endforeach;
?>
<p><?php echo $textomiembro[0]['comTex_texto']; ?></p>
<span class="salto"></span>
<div>&nbsp;</div>
<!----RESPONSABLE DEL PESV-->
<h2><?php echo $contenido[$i++] ?></h2>
<p>Como responsable del PESV se a delegado por la Alta gerencia a: </p><?php foreach ($responsables as $responsable) : ?>
    <?php if (!empty($responsable['res_nombre']) && !empty($responsable['res_cargo'])) { ?>
        <p>
            <label>Nombre: </label><?php echo $responsable['res_nombre']; ?><br>
            <label>Cargo: </label><?php echo $responsable['res_cargo']; ?>
        </p>
        <?php
    }
endforeach;
?>
<p>Quién se encargará de diseñar, desarrollar , implementar y hacer seguimiento del PESV. Y de cada una de las acciones que deriven de éste.</p>
<span class="salto"></span>
<div>&nbsp;</div>
<!----COMITE DE SEGURIDAD VÌAL-->
<h2><?php echo $contenido[$i++] ?></h2>
<?php foreach ($comites as $comite) { ?>
    <p>
        <label>Nombre: </label><?php echo $comite['com_nombre']; ?><br>
        <label>Cargo: </label><?php echo $comite['com_cargo']; ?>
    </p>
<?php } ?>

<p><?php echo $consultatextocomite[0]['texCom_texto']; ?></p>
<span class="salto"></span>
<div>&nbsp;</div>
<!----COMUNICACIÒN-->
<h2><?php echo $contenido[$i++] ?></h2>
<p><?php if (!empty($comunicacion[0]['com_comunicacion'])) echo $comunicacion[0]['com_comunicacion'] ?></p>
<span class="salto"></span>
<div>&nbsp;</div>
<!----ESTADISTICAS-->
<h2><?php echo $contenido[$i++] ?></h2>

<p>

</p>

<span class="salto"></span>
<div>&nbsp;</div>
<h2><?php echo $contenido[$i++] ?></h2>
<?php
if (!empty($politicas[0]['pol_politica'])) {
    echo "<div>" . $politicas[0]['pol_politica'] . "</div>";
}
?>
<br>
<span class="salto"></span>
<p>
<!----DIAGNOSTICO-->
<h2><?php echo $contenido[$i++] ?></h2>
<span><?php echo $diagnostico[0]['texDia_texto']; ?></span>
<span class="salto"></span>
<!----IDENTIFICACIÓN  DE  PRIORIDADES  DE RIESGOS-->
<h2><?php echo $contenido[$i++] ?></h2>
<span>En reuniones de evaluación del diagnóstico, el CSV analizó los resultados obtenidos. Una vez identificados y priorizados los riesgos encontrados, se definieron las siguientes estrategias, por riesgo así:</span></p>
<?php
foreach ($prioridades as $pri) {
    ?>
    <table >
        <tr>
            <td colspan="6"><b>Riesgo</b></td>
        </tr>
        <tr>
            <td colspan="6">
                <?php if (!empty($pri['pri_riesgo'])) echo $pri['pri_riesgo'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" ><b>Eje Afectado</b></td>
            <td  ><b>Nivel de Riesgo</b></td>
            <td  align="center"><b>Peaton</b></td>
            <td  align="center"><b>Pasajero</b></td>
            <td   align="center"><b>Conductor</b></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php if ($pri['pri_comportamiento'] == 1) echo "Comportamiento humano" ?>
                <?php if ($pri['pri_comportamiento'] == 2) echo "Vehiculo seguro" ?>
                <?php if ($pri['pri_comportamiento'] == 3) echo "Infraestructura segura" ?>
                <?php if ($pri['pri_comportamiento'] == 4) echo "Atencion a victimas" ?>
            </td>
            <td  >
                <?php if ($pri['tipRie_id'] == 1) echo "ALTO"; ?>
                <?php if ($pri['tipRie_id'] == 2) echo "MEDIO"; ?>
                <?php if ($pri['tipRie_id'] == 3) echo "BAJO"; ?>
            </td>
            <td align="center"><?php
                if ($pri['pri_peaton'] == 1) {
                    echo "SI";
                } else {
                    echo "NO";
                }
                ?></td>
            <td align="center"><?php
                if ($pri['pri_pasajero'] == 1) {
                    echo "SI";
                } else {
                    echo "NO";
                }
                ?></td>
            <td align="center"><?php
            if ($pri['pri_conductor'] == 1) {
                echo "SI";
            } else {
                echo "NO";
            }
            ?></td>
        </tr>
        <tr>
            <td colspan="6"><b>Responsable</b></td>
        </tr>
        <tr>
            <td colspan="6" align="justify">
    <?php echo $pri['pri_responsable'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="6"><b>Descripcion</b></td>
        </tr>
        <tr>
            <td colspan="6" align="justify">
    <?php if (!empty($pri['pri_descripcion'])) echo $pri['pri_descripcion'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="6"><b>Estrategia</b></td>
        </tr>
        <tr>
            <td colspan="6" align="justify">
    <?php if (!empty($pri['pri_estrategia'])) echo $pri['pri_estrategia'] ?>
            </td>
        </tr>
    </table>  <br><br><br>
    <?php
}
?>
<span class="salto"></span>
<div>&nbsp;</div>
<!----PLAN DE ACCION-->
<h2><?php echo $contenido[$i++] ?></h2>
<?php
foreach ($cronograma as $semestre => $eje) {
    if ($semestre == 1)
        echo "<h3>PRIMER SEMESTRE</h3>";
    if ($semestre == 2)
        echo "<h3>SEGUNDO SEMESTRE</h3>";
    if ($semestre == 3)
        echo "<h3>TERCER SEMESTRE</h3>";
    if ($semestre == 4)
        echo "<h3>CUARTO SEMESTRE</h3>";
    foreach ($eje as $eje => $num) {

        if ($eje == 1)
            echo "<h3>Comportamiento humano</h3>";
        if ($eje == 2)
            echo "<h3>Vehiculo seguro</h3>";
        if ($eje == 3)
            echo "<h3>Infraestructura segura</h3>";
        if ($eje == 4)
            echo "<h3>Atencion a victimas</h3>";
        foreach ($num as $cronogra) {
            echo $cronogra."";
        }
    }
}
?>

<style>
    .ano{
        margin-top: 140px;
    }
    .titulo{
        padding: 50%;
    }
    * { 
        font-family: "calibri", Garamond, 'Comic Sans'; 
        line-height: 150%;
        font: 12px/2em sans-serif;
    }
    .principal{
        margin-top: 400px;
    }
    h2,h3,h4,img{
        text-align: center;
    }
    div{
        text-align: justify;
    }
    .salto{
        page-break-after: always;
    }
    span{
        text-align: justify;
    }
    table{
        width: 100%
    }
    .img_cl{
        width: 200px
    }
</style>
