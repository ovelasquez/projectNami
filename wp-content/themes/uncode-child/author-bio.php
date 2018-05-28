<?php global $themeum_options; ?>
<?php
/**
 * The template for displaying Author bios
 *

 */
if (get_the_author_meta('description') !== ""):
    ?>
    <div class="my-profile clearfix">
        <div class="t-inside style-color-xsdn-bg animate_when_almost_visible bottom-t-top start_animation" data-delay="200">
            <div class="t-entry-visual" tabindex="0">
                <div class="t-entry-visual-tc">
                    <div class="t-entry-visual-cont">                        
                        <a tabindex="-1" href="<?php the_author_meta('url'); ?>" class="pushed" target="_self">
                            
                            <!--img src="https://www.medeconsult.com/blog/wp-content/uploads/2017/05/dr-raul-storey-2-uai-450x600.jpg" width="450" height="600" alt=""-->
                            <?php echo get_avatar(get_the_author_meta( 'ID' ),480); ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="t-entry-text">
                <div class="t-entry-text-tc half-block-padding text-center">
                    <div class="t-entry">
                        <h3 class="t-entry-title font-175345">
                            <a href="<?php the_author_meta('url'); ?>"><?php echo get_the_author(); ?></a></h3>
                        <div class="t-entry-excerpt">
                            <p><?php the_author_meta('description'); ?></p>

                        </div>
                        <a class="btn btn-color-164525 btn-icon-left" href="www.medeconsult.com"><i class="fa fa-angle-double-right"></i>Solicitar Consulta</a>
                        <p class="t-entry-meta">
                            <?php //get_template_part('social-share-author'); ?>
                        </p>
                        <a class="text-uppercase " href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author">
                            Ver todos los post
                        </a>
                    </div>
                </div>
            </div></div>


    </div>
    <?php


         
endif;
