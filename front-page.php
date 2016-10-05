<?php get_header(); ?>

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
		$teaser = str_replace(array("\r", "\n", "\r\n"), "<br>", $teaser);

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
                	<div class='col-md-4 col-md-offset-2 col-sm-12' id='pagination-holder'>
						<script type='application/javascript'>
							var pagination_data = [];
                ";
		} else {
			echo "pagination_data.push({
				permalink: '" . get_the_permalink() . "',
				img_url: '{$img_url}',
				title: '" . get_the_title() . "',
				teaser: '{$teaser}',
				more_label: '" . pll__( 'More...' ) . "',
			});";
		}
		?>

<?php endwhile; ?>
	</script>


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
<style>
	#pagination-nav {
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
	<div class='row'>
		<div class='col-md-4 col-md-offset-2 col-sm-12' id='pagination-nav'>
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
	wp_register_script( 'pagination', get_template_directory_uri() . '/js/pagination/pagination.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'pagination' );

	wp_enqueue_style( 'pagination-css', get_template_directory_uri() . '/js/pagination/pagination.css');


get_footer();
?>


<script type="application/javascript">
	function template(data) {
		console.log(data);
		var image = $('<a></a>').attr('href', data.permalink);
		image.append($('<div></div>').addClass('image-container').attr('style', 'background-image: url("' + data.img_url + '");'));

		var link = $('<a></a>').attr('href', data.permalink);
		link.append($('<h2></h2>').text(data.title));

		var content = $('<div></div>').addClass('text-container');
		content.append(link);
		content.append($('<p></p>').text(data.teaser));

		var more = $("<div></div>").addClass('more pull-right');
		more.append($('<a></a>').attr('href', data.permalink).text(data.more_label));


		return $('<div></div>').addClass('row').append(
			$('<div></div>').addClass('col-md-12 section').append(image).append(content).append(more)
		);
	};

	(function ($) {
		$('#pagination-nav').pagination({
			dataSource: pagination_data,
			pageSize: 5,
			callback: function(data, pagination) {
				$('#pagination-holder').empty();
				$.each(data, function (_, datum) {
					$('#pagination-holder').append(template(datum));
				})
			}
		});
	})(jQuery);
</script>