<div id="row" align="center"><h3>Consultar Persona</h3></div>
<div id="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label>Documento</label>
        <input type="text" id="documento" class="form-control"/>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button type="button" id="consultar" class="btn btn-success">Consultar</button>  
    </div>
</div>
<script>
var index=$('#consultar').position();
console.log(index);
    $('#consultar').click(function () {
        var url = "<?php echo base_url('index.php/informacion/consultaurlusuario'); ?>"
        $.post(url, {url: url})
                .done(function (msg) {
                    var table = '<div class="row" id="resultado" ><div class="table-responsive "><table class="table table-responsive table-striped table-bordered">';
                    $.each(msg, function (key, val) {
                        table += "<tr>";
                        table += "<td >" + val.infPer_nombre;
                        table += "</td>";
                        table += '<td ><button type="button" class="btn btn-primary opcion" data-toggle="modal" data-target="#opcion" data-accion="pagina" data-url="' + val.infPer_url + '">consul</button>'
                        table += "</td>";
                        table += "</tr>";

                    });
                    table += "</table></div></div>";
                    $('.container').append(table);
                }).fail(function (msg) {

        })

    });



</script>