<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.1.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>

        <script>
            var base_url_js = '<?php echo base_url() ?>';
        </script>

        <meta charset="utf-8"/>
        <title>Inicio de Sesion</title>
        <meta http-equiv="X-UA-Compatible" content2="IE=edge">
        <meta content2="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content2="" name="description"/>
        <meta content2="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/uniform/css/uniform.default.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') ?>" rel="stylesheet" type="text/css"/>

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url('/assets/global/plugins/select2/select2.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/admin/pages/css/login-soft.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->

        <link href="<?php echo base_url('/assets/global/css/components.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/css/plugins.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/admin/layout/css/layout.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/admin/layout/css/themes/default.css') ?>" id="style_color" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/admin/layout/css/custom.css') ?>" rel="stylesheet" type="text/css"/>

        <!-- END THEME STYLES -->

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
    <!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
    <!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
    <!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
    <!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
    <!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
    <!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="<?php echo base_url('') ?>">
                <img src="<?php echo base_url('/images/vice/logo_vice_02.png') ?>" alt=""/>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="menu-toggler sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGIN -->
        <div class="content2">

            <form action="<?php echo base_url('index.php/login/politica') ?>" method="post">
                <div class="portlet box green">
                    <div class="caption">
                        &nbsp;&nbsp;<i class="fa fa-users"></i>
                        Politicas de Seguridad 
                    </div>
                    <div class="portlet-body">
                        <?php
                        echo $inicio[0]->ini_politicas
                        ?>
                        <p><center>
                            <div style="display: none">
                                <input type="hidden" value="" name="username" id="username">
                                <input type="password" value="" name="password" id="password">
                            </div>
                            <button class="btn green" id="aceptar">Aceptar</button>
                            <button class="btn btn-danger" id="cancelar">Cancelar</button>
                        </center>
                    </div>
                </div>
            </form>



        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            <?php echo date("Y") ?> &copy; 
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="../../assets/global/plugins/respond.min.js"></script>
        <script src="../../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="<?php echo base_url('/assets/global/plugins/jquery-1.11.0.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/jquery-migrate-1.2.1.min.js') ?>" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="<?php echo base_url('/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/jquery.blockui.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/jquery.cokie.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/uniform/jquery.uniform.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/jquery-validation/js/messages_es.js') ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('/assets/global/plugins/backstretch/jquery.backstretch.min.js') ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('/assets/global/plugins/select2/select2.min.js') ?>"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url('/assets/global/scripts/metronic.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/admin/layout/scripts/layout.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/admin/layout/scripts/quick-sidebar.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/admin/layout/scripts/demo.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/admin/pages/scripts/login-soft.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/admin/pages/scripts/login-soft.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/assets/admin/pages/scripts/ui-confirmations.js') ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <script>
            $('#aceptar').click(function() {
                var user = "<?php echo $username ?>";
                var pass = "<?php echo $password ?>";
                $('#username').val(user);
                $('#password').val(pass);
            });

            jQuery(document).ready(function() {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                QuickSidebar.init(); // init quick sidebar
                Demo.init(); // init demo features
                Login.init();
                UIConfirmations.init(); // init page demo
                // init background slide images
                $.backstretch([
                    base_url_js + "/assets/admin/pages/media/bg/1.jpg",
                    base_url_js + "/assets/admin/pages/media/bg/2.jpg",
                    base_url_js + "/assets/admin/pages/media/bg/3.jpg",
                    base_url_js + "/assets/admin/pages/media/bg/4.jpg"
                ], {
                    fade: 1000,
                    duration: 8000
                }
                );
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>
<style>
    .login .content2 {
        background: url("../img/bg-white-lock.png") repeat scroll 0 0 rgba(0, 0, 0, 0);
        border-radius: 7px;
        margin: 0 auto;
        padding: 20px 30px 15px;
        width: 760px;
    }
    .login .content2 h3 {
        color: #eee;
    }
    .login .content2 h4 {
        color: #eee;
    }
    .login .content2 p, .login .content2 label {
        color: #fff;
    }
    .login .content2 .login-form, .login .content2 .forget-form {
        margin: 0;
        padding: 0;
    }
    .login .content2 .form-control {
        background-color: #fff;
    }
    .login .content2 .forget-form {
        display: none;
    }
    .login .content2 .register-form {
        display: none;
    }
    .login .content2 .form-title {
        font-weight: 300;
        margin-bottom: 25px;
    }
    .login .content2 .form-actions {
        background-color: transparent;
        border: 0 none;
        clear: both;
        margin-left: -30px;
        margin-right: -30px;
        padding: 0 30px 25px;
    }
    .login .content2 .form-actions .checkbox {
        margin-left: 0;
        padding-left: 0;
    }
    .login .content2 .forget-form .form-actions {
        border: 0 none;
        margin-bottom: 0;
        padding-bottom: 20px;
    }
    .login .content2 .register-form .form-actions {
        border: 0 none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .login .content2 .form-actions .checkbox {
        display: inline-block;
        margin-top: 8px;
    }
    .login .content2 .form-actions .btn {
        margin-top: 1px;
    }
    .login .content2 .forget-password {
        margin-top: 25px;
    }
    .login .content2 .create-account {
        border-top: 1px dotted #eee;
        margin-top: 15px;
        padding-top: 10px;
    }
    .login .content2 .create-account a {
        display: inline-block;
        margin-top: 5px;
    }
    .login .content2 .select2-container i {
        color: #ccc;
        display: inline-block;
        font-size: 16px;
        height: 16px;
        margin: 4px 4px 0 -1px;
        position: relative;
        text-align: center;
        top: 1px;
        width: 16px;
        z-index: 1;
    }
    .login .content2 .has-error .select2-container i {
        color: #b94a48;
    }
    .login .content2 .select2-container a span {
        font-size: 13px;
    }
    .login .content2 .select2-container a span img {
        margin-left: 4px;
    }
    .caption {
        display: inline-block;
        float: left;
        font-size: 18px;
        font-weight: 400;
        line-height: 18px;
        padding: 10px 0;
        color: #fff;
    }
    
</style>




