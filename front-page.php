<?php get_header(); ?>

<style>
	#pagination-buttons {
		margin-top: 20px;
	}

	.paginationjs {
		display: flex;
	}

	.paginationjs-pages {
		display: block;
		margin-right: auto;
		margin-left: auto
	}
</style>

<div class='container-fluid'>

<?php if ( have_posts() ) : ?>
	<?php
		$count   = 0;
		$posts_s = array();
	?>
	<?php while ( have_posts() ) : the_post(); ?>

	<?php
		$count ++;

		if ( $count == 1 ) {
			$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0];
			$image   = "<a href='" . get_the_permalink() . "'><div class='image-container' style='background-image: url(" . $img_url . ");'></div></a>";

			echo '<div class="big-section">' . $image . '</div>';
		}

		$c      = get_the_content( '', true );
		$teaser = substr( $c, 0, 700 );

		$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[0];
		$image   = "<a href='" . get_the_permalink() . "'><div class='image-container' style='background-image: url(" . $img_url . ");'></div></a>";
		$content = "
			<div class='text-container'>
				<a href='" . get_the_permalink() . "'><h2>" . get_the_title() . "</h2></a>
				<p>{$teaser}</p>
			</div>
			<div class='more pull-right'>
				<a href='" . get_the_permalink() . "'>" . pll__( 'More...' ) . "</a>
			</div>";

		if ( $count == 1 ) {
			echo "
				<div class='row main-row'>
                    <div class='col-md-7 col-md-offset-2 col-sm-12'>
                        {$content}
                    </div>
                </div>
                <!-- container row -->
                <div class='row'>
                	<!-- left column -->
                	<div class='col-md-4 col-md-offset-2 col-sm-12'>
                ";
		} else {
			echo "
				<div class='row paginable'>
					<div class='col-md-12 section'>
                		{$image}{$content}
            		</div>
                </div>";
		}
		?>

<?php endwhile; ?>

<!--left column-->
</div>
<div class="col-md-offset-1 col-md-2 col-sm-3">
	<?php if ( is_active_sidebar( 'frontpage-widget' ) ) : ?>
		<div id="tertiary" class="widget-area" role="supplementary">
			<?php dynamic_sidebar( 'frontpage-widget' ); ?>
		</div>
	<?php endif; ?>
</div>
<!--container row-->
</div>

<div class='row'>
	<div class='col-md-4 col-md-offset-2 col-sm-12'>
		<div id="pagination-buttons"></div>
	</div>
</div>

<!--container fluid-->
</div>

<?php else: ?>
	<p><?php _e( 'Brak postów ;(' ); ?></p>
<?php endif; ?>

<hr>

<p class="text-center" style="font-size: 14px; margin-top: 20px">Partnerzy: <a
		title="Katalog-blogow.pl - Katalog Blogów Polskiej Blogosfery" href="http://katalog-blogow.pl/" target="_blank"
		data-wpel-link="internal">Katalog-Blogow.pl</a></p>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<?php
	wp_register_script('pagination-js', get_template_directory_uri() . '/js/paginationjs-2.7/pagination.js', array( 'jquery' ));
	wp_enqueue_script('pagination-js');

	wp_enqueue_style('pagination-css', get_template_directory_uri() . '/js/paginationjs-2.7/pagination.css');
?>

<script type="application/javascript">
	jQuery(document).ready(function($) {
		$('#pagination-buttons').pagination({
			dataSource: $('.paginable').toArray(),
			pageSize: 5,
			callback: function (data, pagination) {
				$('html, body').animate({scrollTop:0}, 'slow');

				$('.paginable').attr('style', 'display: none;');
				$.each(data, function (_, d) {
					console.log(d);
					$(d).attr('style', 'display: block;');
				});
//				window.scrollTo(0, 0);
			}
		});
	});
</script>

<?php get_footer(); ?>
