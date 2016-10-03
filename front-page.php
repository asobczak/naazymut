<?php get_header(); ?>


<?php if (have_posts()) : ?>
<?php
  $count = 0;
  $posts_s = array();
?>
<?php while (have_posts()) : the_post(); ?>
<?php $count++; ?>

        <?php
            if($count == 1) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
                $image = "<a href='".get_the_permalink()."'><div class='image-container' style='background-image: url(".$img_url.");'></div></a>";

                echo '<div class="big-section">'.$image.'</div>';
            }
        ?>

<?php
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

        if($count == 1) {
            echo "<div class='container-fluid'>
                <div class='row main-row'>
                    <div class='col-md-8 col-md-offset-2 col-sm-12'>
                        {$content}
                    </div>
                </div>";
        }
        else if($count % 2 == 0) {
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

<hr>

<p class="text-center" style="font-size: 14;margin-top: 20px">Partnerzy: <a title="Katalog-blogow.pl - Katalog Blogów Polskiej Blogosfery" href="http://katalog-blogow.pl/" target="_blank" data-wpel-link="internal">Katalog-Blogow.pl</a></p>

<?php get_footer(); ?>
