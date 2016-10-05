<?php /* Template Name: O mnie */ ?>

<?php get_header(); ?>

<style type="text/css">
    .portret {
        width: 100%;
        height: 513px;
        display: inline-block;
        background-size: contain;
	    background-position: 50%;
        background-repeat: no-repeat;
    }

    .main-container {
        margin-top: 50px;
    }
</style>

<div class="container-fluid main-container">

<?php while ( have_posts() ) : the_post(); ?>
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <?php the_content(); ?>
        </div>

        <div class="col-md-5">
            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0]; ?>
            <div class='portret' style='background-image: url("<?php echo $image ?>");'></div>
            <div class="text-center" style="padding-top: 10px"><?php pll_e('Contact me'); ?>:<br>ania@coralnotes.com</div>
        </div>
    </div>
<?php endwhile; ?>

</div>

<?php get_footer(); ?>

