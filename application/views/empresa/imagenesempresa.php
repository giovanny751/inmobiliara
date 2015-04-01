
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <title>Mini Ajax File Upload Form</title>

        <!-- Google web fonts -->
        <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />

        <!-- The main CSS file -->
        <link href="<?php echo base_url('css/style.css" rel="stylesheet') ?>" />
    </head>

    <body>

        
                                    <div id="formulario_imagenes">
                                <span><?php echo validation_errors(); ?></span>
                                <?= form_open_multipart(base_url() . "index.php/empresa/do_upload") ?>

                                <?php if (!empty($empresa[0]->userfile)) {
                                    ?>
                                    <center><img src="<?php echo base_url('/uploads/') . "/" . $empresa[0]->userfile ?>" style="width: 240px"></center>
                                <?php }
                                ?>

                                <label><h1>Imagen </h1><br></label><input type="file" name="userfile" /><br /><br />
                                <input type="submit" value="Subir imágen" class="btn green"/>
                                <?= form_close() ?>
                            </div>

        <form id="upload" method="post" action="<?php echo base_url('index.php/empresa/upload') ?>" enctype="multipart/form-data">
            <div id="drop">
                Drop Here

                <a>Browse</a>
                <input type="file" name="upl" multiple />
            </div>

            <ul>
                <!-- The file uploads will be shown here -->
            </ul>

        </form>

        <footer>
            <h2><a href="http://tutorialzine.com/2013/05/mini-ajax-file-upload-form/"><i>Tutorial:</i> Mini Ajax File Upload Form</a></h2>
            <div id="tzine-actions">

                <a id="tzine-download" href="http://tutorialzine.com/2013/05/mini-ajax-file-upload-form/" title="Download This Example!">Download</a>
            </div>
        </footer>

        <!-- JavaScript Includes -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="<?php echo base_url('js/jquery.knob.js') ?>"></script>

        <!-- jQuery File Upload Dependencies -->
        <script src="<?php echo base_url('js/jquery.ui.widget.js') ?>"></script>
        <script src="<?php echo base_url('js/jquery.iframe-transport.js') ?>"></script>
        <script src="<?php echo base_url('js/jquery.fileupload.js') ?>"></script>

        <!-- Our main JS file -->
        <script src="<?php echo base_url('js/script.js') ?>"></script>


        <!-- Only used for the demos. Please ignore and remove. --> 
        <script src="http://cdn.tutorialzine.com/misc/enhance/v1.js" async></script>

    </body>
</html>