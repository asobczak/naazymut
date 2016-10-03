<?php /* Template Name: Landing page */ ?>

<?php get_header(); ?>

<style>
	.navbar-naazymut {
    		margin-bottom: 0px;
	}

        img.cover {
            width: 100%;
        }
</style>

<?php while ( have_posts() ) : the_post(); ?>

<div class="container-fluid">
    <div class="row">
        <img class="cover" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0]; ?>">
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>

