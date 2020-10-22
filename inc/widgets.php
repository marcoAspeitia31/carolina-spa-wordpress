<?php
 
/**
 * Adds Foo_Widget widget.
 */
class Schedule_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'schedule_widget', // Base ID
            'Tabla Horario SPA', // Name
            array( 'description' => __( 'Agrega el horario de trabajo', 'text_domain' ), ) // Args
        );
    }
 
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        /* The next lines render the ACF dynamic content in our side bar */
        ?>
<p class="text-center lead mt-3"><?php the_field('horarios_texto'); ?></p>
<?php $horario = get_field('horario'); 
    if($horario):
?>
<table class="table table-hover text-center mt-3 mb-5 text-light">
    <thead>
        <tr>
            <?php foreach($horario['header'] as $th): ?>

            <th class="text-center"><?php echo $th['c']; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($horario['body'] as $tr): ?>
        <tr>
            <?php foreach($tr as $td): ?>
            <td><?php echo $td['c']; ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
        endif;
        echo $after_widget;
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'text_domain' );
        }
        ?>
<p>
    <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
        name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
    }
 
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
 
} // class Schedule_Widget
 
// Register Schedule_Widget widget
add_action( 'widgets_init', 'carolinaspa_schedule_widget' );
     
function carolinaspa_schedule_widget() { 
    register_widget( 'Schedule_Widget' ); 
}
?>