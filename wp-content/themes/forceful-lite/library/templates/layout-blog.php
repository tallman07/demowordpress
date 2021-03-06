<?php
$kopa_setting = kopa_get_template_setting();
$sidebars = $kopa_setting['sidebars'];
?>

<?php get_header(); ?>
<?php if (is_active_sidebar($sidebars[1]) || is_active_sidebar($sidebars[2])) { ?>
    <div class="top-sidebar">

        <div class="wrapper">
            <div class="row-fluid">
                <div class="span12 clearfix">
                    <div class="l-col widget-area-2">
                        <div class="r-color"></div>
                        <?php
                        if (is_active_sidebar($sidebars[1])) {
                            dynamic_sidebar($sidebars[1]);
                        }
                        ?>
                    </div>
                    <!-- l-col -->
                    <div class="r-col widget-area-3">
                        <?php
                        if (is_active_sidebar($sidebars[2])) {
                            dynamic_sidebar($sidebars[2]);
                        }
                        ?>
                    </div>
                    <!-- r-col -->
                </div>
                <!-- span12 -->
            </div>
            <!-- row-fluid -->
        </div>
        <!-- wrapper -->
    </div>
<?php } ?>
<?php get_template_part('library/templates/template', 'headline'); ?>

<div id="main-content">

    <div class="wrapper">
        <div class="row-fluid">
            <div class="span12 clearfix">
                <div class="l-col widget-area-6">   
                    <div class="r-color"></div>                 

                    <?php kopa_breadcrumb(); ?>

                    <div class="row-fluid">

                        <div class="span12">

                            <?php get_template_part('library/templates/loop','blog'); ?>

                        </div>
                        <!-- span12 -->
                    </div>
                    <!-- row-fluid -->

                </div>
                <!-- l-col -->

                <div class="r-col widget-area-7">

                    <?php
                    if (is_active_sidebar($sidebars[3])) {
                        dynamic_sidebar($sidebars[3]);
                    }
                    ?>

                </div>
                <!-- r-col -->
            </div>
            <!-- span12 -->
        </div>
        <!-- row-fluid -->
    </div>
    <!-- wrapper -->
</div>
<!-- main-content -->


<?php get_footer(); ?>