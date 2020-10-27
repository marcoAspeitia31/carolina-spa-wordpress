<?php
 
 if(!defined('ABSPATH')) die();
 
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
        $scheduleText = $instance['scheduleText'];
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        /* The next lines render the ACF dynamic content in our side bar */
        ?>
<p class="text-center lead mt-3"><?php echo $scheduleText; ?></p>
<?php
    $horario = get_field('horario'); 
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
        if ( isset( $instance[ 'scheduleText' ] ) ) {
            $scheduleText = $instance[ 'scheduleText' ];
        }
        else {
            $scheduleText = __( 'Descuento', 'text_domain' );
        }
        ?>
<p>
    <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
        name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <label
        for="<?php echo $this->get_field_name( 'scheduleText' ); ?>"><?php _e( 'Texto informativo adicional a los horarios:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'scheduleText' ); ?>"
        name="<?php echo $this->get_field_name( 'scheduleText' ); ?>" type="text"
        value="<?php echo esc_attr( $scheduleText ); ?>" />
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
        $instance['scheduleText'] = ( !empty( $new_instance['scheduleText'] ) ) ? strip_tags( $new_instance['scheduleText'] ) : '';
        return $instance;
    }
 
} // class Schedule_Widget
 
// Register Schedule_Widget widget
add_action( 'widgets_init', 'carolinaspa_schedule_widget' );
     
function carolinaspa_schedule_widget() { 
    register_widget( 'Schedule_Widget' ); 
}

/**
 * Adds Cupon_Widget widget.
 */
class Cupon_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'cupon_widget', // Base ID
            'Cupon de descuento', // Name
            array( 'description' => __( 'Ofrece un cupón de descuento para tus clientes', 'text_domain' ), ) // Args
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
        $cuponTextArea = $instance['cuponTextArea'];
        $cuponAditionalInformation = $instance['cuponAditionalInformation'];
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        ?>
<div class="cupon p-2 my-4">
    <p class="text-uppercase text-center m-0">
        <span><?php echo $cuponTextArea = ! empty($cuponTextArea) ? $cuponTextArea : ""; ?></span>
        <br><?php echo $cuponAditionalInformation = ! empty($cuponAditionalInformation) ? $cuponAditionalInformation : ""; ?>
    </p>
</div>

<?      
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
            $title = __( 'Encabezado', 'text_domain' );
        }
        if ( isset( $instance[ 'cuponTextArea' ] ) ) {
            $cuponTextArea = $instance[ 'cuponTextArea' ];
        }
        else {
            $cuponTextArea = __( 'Descuento', 'text_domain' );
        }
        if ( isset( $instance[ 'cuponAditionalInformation' ] ) ) {
            $cuponAditionalInformation = $instance[ 'cuponAditionalInformation' ];
        }
        else {
            $cuponAditionalInformation = __( 'Información adicional', 'text_domain' );
        }
        ?>
<p>
    <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
        name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <label
        for="<?php echo $this->get_field_name( 'cuponTextArea' ); ?>"><?php _e( 'Texto promocional del cupón de descuento:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'cuponTextArea' ); ?>"
        name="<?php echo $this->get_field_name( 'cuponTextArea' ); ?>" type="text"
        value="<?php echo esc_attr( $cuponTextArea ); ?>" />
</p>
<p>
    <label
        for="<?php echo $this->get_field_name( 'cuponAditionalInformation' ); ?>"><?php _e( 'Información adicional sobre el cupón de descuento:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'cuponAditionalInformation' ); ?>"
        name="<?php echo $this->get_field_name( 'cuponAditionalInformation' ); ?>" type="text"
        value="<?php echo esc_attr( $cuponAditionalInformation ); ?>" />
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
        $instance['cuponTextArea'] = ( !empty( $new_instance['cuponTextArea'] ) ) ? strip_tags( $new_instance['cuponTextArea'] ) : '';
        $instance['cuponAditionalInformation'] = ( !empty( $new_instance['cuponAditionalInformation'] ) ) ? strip_tags( $new_instance['cuponAditionalInformation'] ) : '';
 
        return $instance;
    }
 
} // class Cupon_Widget
 
// Register Cupon_Widget widget
add_action( 'widgets_init', 'carolinaspa_cupon_widget' );
     
function carolinaspa_cupon_widget() { 
    register_widget( 'Cupon_Widget' ); 
}

?>