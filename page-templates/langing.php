<?php /* Template Name: Landing page */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <style>
        img.paralax {
            margin-top: -30vh;
        }
    </style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="padding: 0px;">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>

