<?php get_header(); ?>


<?php if (have_posts()) : ?>
<?php
  $count = 0;
  $posts_s = array();
?>
<?php while (have_posts()) : the_post(); ?>
<?php $count++; ?>

<?php
  if ($count == 1)
    $img_size = 'large';
  else
    $img_size = 'medium';

  $c = get_the_content('', true);
  $teaser = substr($c, 0, 700);

  $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), $img_size)[0];
  $image = "<a href='".get_the_permalink()."'><div class='image-container' style='background-image: url(".$img_url.");'></div></a>";
  $content = $image."
      <div class='text-container'>
        <a href='".get_the_permalink()."'><h2>".get_the_title()."</h2></a>
        <p>{$teaser}</p>
      </div>
      <div class='more pull-right'>
        <a href='".get_the_permalink()."'>".pll__('More')."...</a>
      </div>";

  if($count == 1) {
    $posts_s[$count] = "<div class='content big-section'>
            {$content}
        </div>";
  } else {
    $posts_s[$count] = "<div class='col-md-6 col-sm-6 section'>
      <div class='content small-section'>
        {$content}
      </div>
    </div>";
  }
?>

<?php endwhile; else: ?>
  <p><?php _e('Brak postów ;('); ?></p>
<?php endif; ?>


<div class="row main-row">
  <div class="col-md-6 section">
    <?php echo $posts_s[1] ?>
  </div>
  <div class="col-md-6">
    <div class="row">
      <?php echo $posts_s[2] ?>
      <?php echo $posts_s[3] ?>
    </div>
    <div class="row">
      <?php echo $posts_s[4] ?>
      <?php echo $posts_s[5] ?>
    </div>
  </div>
</div>
<div class="row">
  <section id="canvas1">
    <iframe id="map_canvas1" src="https://mapsengine.google.com/map/embed?mid=zlJiKZi2TdSY.kbVcV7Pze9FY"  class="mapa"></iframe>
  </section>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        // you want to enable the pointer events only on click;

        $('#map_canvas1').addClass('scrolloff'); // set the pointer events to none on doc ready
        $('#canvas1').on('click', function () {
            $('#map_canvas1').removeClass('scrolloff'); // set the pointer events true on click
        });

        // you want to disable pointer events when the mouse leave the canvas area;

        $("#map_canvas1").mouseleave(function () {
            $('#map_canvas1').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
        });
    });
</script>

<?php get_footer(); ?>
