<?php /* Template Name: Tekst */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php the_content(); ?>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>

