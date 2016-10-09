<?php get_header(); ?>
            
<div class='container-fluid' style="padding-top: 20px;">

<?php if (have_posts()) : ?>
<?php
  $count = 0;
  $posts_s = array();
?>
<?php while (have_posts()) : the_post(); ?>
<?php 
  $count++;

  $c = get_the_content('', true);
  $teaser = substr($c, 0, 700);

  $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
  $image = "<a href='".get_the_permalink()."'><div class='image-container' style='background-image: url(".$img_url.");'></div></a>";
  $content = "
      <div class='text-container'>
        <a href='".get_the_permalink()."'><h2>".get_the_title()."</h2></a>
        <p>{$teaser}</p>
      </div>
      <div class='more pull-right'>
        <a href='".get_the_permalink()."'>".pll__('More...')."</a>
      </div>";

        if($count % 2 == 1) {
            echo "<div class='col-md-5 col-md-offset-1 col-sm-6 section'>
                {$image}{$content}
            </div>";
        } else {
            echo "<div class='col-md-5 col-sm-6 section'>
                {$image}{$content}
            </div>";
        }
?>

<?php endwhile; ?>

</div>

<?php else: ?>
  <p><?php _e('Brak postów ;('); ?></p>
<?php endif; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<?php get_footer(); ?>
