<aside class="col-lg-4 pt-4 pt-lg-0 text-light align-self-start">
    <div class="<?php echo ! get_the_title('Nosotros') ? 'sidebar schedules' : 'sidebar p-3 text-light';?>">
        <?php
            /* Display dynamic sidebar. */
            if(is_page( 'nosotros' )){
                dynamic_sidebar( 'carolinaspa-sidebar-widget-1' );
            }else{
                dynamic_sidebar( 'carolinaspa-sidebar-widget-2' );
            }
        ?>
    </div>
</aside>