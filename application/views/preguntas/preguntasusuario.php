<div class="well">
<?php // echo $tipo;die;

if($tipo == 1){
                    $primero = 'ALTO';  
                    $segundo = 'MEDIO';  
                    $tercero = 'BAJO';  
                }
                else{
                    $primero = 'SI';  
                    $segundo = 'NO';  
                    $tercero = 'NA'; 
                }

if ($contador == 0) {
    echo "<div class='row'><form method='post' id='fusuario'>";
    echo "<input type='hidden' value='".$tipo."' name='tipousuario'>";
    foreach ($i as $tipo => $preguntaopcion) {
        echo "<div class='table-responsive'>
            <table class='table table-responsive table-striped table-bordered'>";
        echo "<tr ><td colspan='4' align='center' class='alert alert-info'><b>" . $tipo . "</b></td></tr>";
        foreach ($preguntaopcion as $opcion => $opcionpregunta) {
            
            echo "<tr style='background-color:#7CACFA;color:white'><td  style='width:85%;background-color:#7CACFA;color:white'><b>" . $opcion . "</b></td>
                <td style='width:5%;background-color:#7CACFA;color:white' align='center'><b>".$primero."</b></td>
                <td style='width:5%;background-color:#7CACFA;color:white' align='center'><b>".$segundo."</b></td>
                <td style='width:5%;background-color:#7CACFA;color:white' align='center'><b>".$tercero."</b></td>
                </tr>";
            foreach ($opcionpregunta as $id => $pregunta) {
                
                echo "<tr><td>" . $pregunta . "</td><td  align='center'>
                    <input type='checkbox' value='".$id."'  name='si[]' class='seleccionado' ></td>
                    <td align='center' ><input type='checkbox' value='".$id."' name='no[]' class='seleccionado' ></td>
                    <td align='center'><input type='checkbox' value='".$id."' name='na[]' class='seleccionado' ></td>
                    </tr>";
            }
        }
        echo "</table>
            </div>";
    }
    echo "</form></div>";
    ?>
    <div class="row" align="right">
        <button type="button" class="btn btn-success guardar">Guardar</button>
    </div>
    <script>
        $('.seleccionado').click(function() {

            $(this).parents('td').siblings().children('input').each(function(indice, campo) {
                $(this).prop('checked', false);
            });
        });
        $('.guardar').click(function() {
            var h = 0;
            $('table tbody tr').each(function(key, val) {

                var i = 0;

                $(this).children('td').children('input').each(function(indice, campo) {
                    if ($(this).prop('checked') == false) {
                        i++;
                    }
                });
                if (i == 3) {
                    h++;

                }
            });
            console.log(h);
            if (h == 0) {
                var url = "<?php echo base_url('index.php/preguntas/guardarpreguntasusuario') ?>";

                $('form').attr('action',url);
                
                $('form').submit();

//                $.post(url, $('#fusuario').serialize(), function(data) {

//                });
            }else{
                $.notific8('POR FAVOR RESPONDER TODAS LAS PREGUNTAS', {
                        horizontalEdge: 'bottom',
                        life: 7000,
                        theme: 'amethyst',
                        heading: 'PREGUNTAS'
                    });
            }
        });
    </script>    
<?php } else { ?>
    <div class="row">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-sx-offset-2 col-sm-8 col-sx-8 col-lg-8 col-md-8">
            <div class="alert alert-info"><center><b>LA PRUEBA YA HA SIDO PRESENTADA</b></center></div>
        </div>
    </div>
<?php } ?>
</div>