<?php
/*
YARPP Template: Na Azymut
Description: Multilingual with miniatures and short summary
Author: ssobczak
*/

if (function_exists("icl_register_string")) {
        icl_register_string("YARPP", "related posts", "Read more about:");
        icl_register_string("YARPP", "read more", "More...");
        icl_register_string("YARPP", "no related posts message", "No related posts.");
}

  function tag_names($tags) {
      $tag_names = array();
      foreach($tags as $individual_tag)
        $tag_names[] = $individual_tag->name;
      return implode(", ", $tag_names);
  }

?>

<div class="row related">
  <div class='col-md-6 col-md-offset-3 az_centered'>
    <h3><?php 
      echo (function_exists("icl_t") ? icl_t("YARPP", "related posts", "Read more about:") : "Read more about:");
      echo ' '.tag_names(wp_get_post_tags($post->ID)); 
    ?></h3>
  </div>
</div>

<?php if (have_posts()):?>
  <div class="row">
    <?php while (have_posts()) : the_post(); ?>

      <?php 
        $teaser = substr(get_the_content('', true), 0, 700);
        $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0];
      ?>

      <div class='col-md-4 col-sm-4 section'>
        <div class='content small-section'>
          <a href="<?php the_permalink() ?>"><div class='image-container' style='background-image: url("<?php echo $img_url ?>");'></div></a>
          <div class='text-container'>
            <a href="<?php the_permalink() ?>" rel="bookmark"><h2><?php the_title() ?></h2></a>
            <p><?php echo $teaser ?></p>
          </div>
          <div class='more pull-right'>
            <a href='<?php the_permalink() ?>'><?php echo (function_exists("icl_t") ? icl_t("YARPP", "read more", "More...") : "More...") ?></a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php else: ?>
  <p><?php echo (function_exists("icl_t") ? icl_t("YARPP", "no related posts message", "No related posts.") : "No related posts.") ?></p>
<?php endif; ?>

