<?php /* Template Name: Margins 3 */ ?>

<?php get_header(); ?>

<style>
    h2 {
        margin-top: 75px;
    }

    table.spis {
        margin-top: 30px;
    }

    table.spis td:nth-child(3n+2) {
        color: #00dfd9;
    }

    table.spis tbody td {
        border-bottom: 2px solid #00dfd9;
        padding-top: 25px;
    }

    table.spis td:nth-child(3n+3) {
        border: none;
        width: 30px;
    }

    a.maxbutton-1 {
        margin: 30px 0px;
    }
</style>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php the_content(); ?>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>

