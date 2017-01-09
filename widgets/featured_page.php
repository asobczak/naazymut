<?php
// Block direct requests
if ( !defined('ABSPATH') )
    die('-1');


class CoralFeaturedWidget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'CoralFeaturedWidget', // Base ID
            __('Coral Featured page', 'text_domain'), // Name
            array( 'description' => __( 'Featured post of front page.', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        $page = get_post( $instance['page_id'] );

        if ( array_key_exists('before_widget', $args) ) echo $args['before_widget'];

        if ( $page ) {
            echo '<a href="' . get_permalink( $page->ID ) . '" title="Czytaj dalej, ' . $page->post_title . '">';
            echo get_the_post_thumbnail( $page->ID, array(250,500), array('class'=>'story_featured_img') );
            echo '</a>';

            echo '<a href="' . get_permalink( $page->ID ) . '" title="Czytaj dalej, ' . $page->post_title . '">' .
                '<h2 class="story_widget_title">' . apply_filters( 'widget_title', $page->post_title ). '</h2>' .
                '</a>';

            echo '<p class="story_widget_excerpt">' . $page->post_excerpt . '</p>';
            echo '<div class="more pull-right">
				<a href="' . get_permalink( $page->ID ) . '" title="Czytaj dalej, ' . $page->post_title . '">Czytaj dalej</a>
			</div>';

        } else {

            echo __( 'No recent story found.', 'text_domain' );
        }

        if ( array_key_exists('after_widget', $args) ) echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'page_id' ] ) ) {
            $page_id = $instance[ 'page_id' ];
        } else {
            $page_id = 0;
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Page:' ); ?></label>

            <select id="<?php echo $this->get_field_id( 'page_id' ); ?>" name="<?php echo $this->get_field_name( 'page_id' ); ?>">
                <option value="0">Select page</option>
                <?php
                // get the exceprt of the most recent story
                $gp_args = array(
                    'posts_per_page' => -1,
                    'post_type' => array('page', 'product'),
                    'order' => 'ASC',
                    'orderby' => 'title',
                    'post_status' => 'publish'
                );

                $posts = get_posts( $gp_args );
                foreach( $posts as $post ) {

                    $selected = ( $post->ID == $page_id ) ? 'selected' : '';

                    if ( strlen($post->post_title) > 30 ) {
                        $title = substr($post->post_title, 0, 27) . '...';
                    } else {
                        $title = $post->post_title;
                    }
                    echo '<option value="' . $post->ID . '" ' . $selected . '>' . $title . '</option>';
                }
                ?>
            </select>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['page_id'] = ( ! empty( $new_instance['page_id'] ) ) ? strip_tags( $new_instance['page_id'] ) : '';
        return $instance;
    }

}