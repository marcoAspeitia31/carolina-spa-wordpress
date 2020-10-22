<?php
            /** Consulting Gallery Custom Field
             * 
             * get_field() is a custom function of ACF
             * for more information please visit -> https://www.advancedcustomfields.com/resources/get_field/
             * 
             * preg_match() is a PHP function that returns whether a match was found in a string.
             * for more info please visit -> https://www.w3schools.com/php/func_regex_preg_match.asp
             * 
             * explode() Break a string into an array
             * more info, please visit -> https://www.w3schools.com/php/func_string_explode.asp
             * 
             **/
            $gallery = get_field('galeria', $post, false);
            if($gallery):
            preg_match('/\[gallery.*ids=.(.*).\]/',$gallery,$ids);
            $imagesIds = explode(",", $ids[1]);            
            ?>
<div class="row justify-content-center">
    <?php foreach($imagesIds as $singleImageId): ?>
    <div class="col-md-6 col-lg-4 mb-3">
        <a href="#" data-target="#image-<?php echo $singleImageId?>" data-toggle="modal">
            <?php 
            /**
             * wp_get_attachment_image() get an HTML img element representing an image attachment
             * for more information please visit -> https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
             **/
            echo wp_get_attachment_image($singleImageId, 'gallery-thumbnail', false, ['class' => 'img-fluid', 'srcset' => ' ']); ?>
        </a>
    </div>
    <div class="modal fade" id="image-<?php echo $singleImageId?>" tabindex="-1" role="dialog"
        aria-labelledby="Imagen <?php echo $singleImageId?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo wp_get_attachment_image($singleImageId, 'full', false, ["class" => "img-fluid"]); ?>
                </div>
            </div><!-- modal-content end -->
        </div><!-- modal-dialog end -->
    </div><!-- repeatable modal -->
    <?php endforeach; ?>
</div><!-- gallery end -->
<?php endif; ?>