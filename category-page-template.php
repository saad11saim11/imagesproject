<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();

$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );

?>
<section class="custom-blogs">
    <div class="elementor-widget-wrap elementor-element-populated e-swiper-container">


        <div class="page-heading">
            <h1>THE LEET BLOG</h1>
        </div>

        <?php
                            $category = get_category( get_query_var( 'cat' ) );
                            $ccc = $category->cat_ID;
                            $catinfo = get_category($ccc);
                            $catslug= $catinfo->slug;
                            $args = array( 'category' => $ccc, 'post_type' =>  'post' );
                            $postslist = get_posts( $args );
						?>
        <div class="bread-crumb">
            <a class="bread" href="http://blog.casino1337.com/<?php echo $hom_li; ?>"><?php pll_e('Home');?> > </a>
            <a class="bread" href=""><?php echo get_cat_name( $category_id = $ccc );?> </a>
        </div>
        <?php
                            if($postslist){
                                ?>

        <div class="cuediv">
            <h2 class="elementor-heading-title elementor-size-default">
                <?php echo get_cat_name( $category_id = $ccc );?></h2>
            <?php echo category_description( $category_id = $ccc );?>
        </div>
        <div class="elementor-element elementor-element-7777ed8 elementor-posts__hover-none c-post elementor-grid-3 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-posts--thumbnail-top load-more-align-center elementor-widget elementor-widget-posts"
            data-id="7777ed8" data-element_type="widget"
            data-settings="{&quot;pagination_type&quot;:&quot;load_more_on_click&quot;,&quot;cards_columns&quot;:&quot;3&quot;,&quot;cards_columns_tablet&quot;:&quot;2&quot;,&quot;cards_columns_mobile&quot;:&quot;1&quot;,&quot;cards_row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:35,&quot;sizes&quot;:[]},&quot;cards_row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;cards_row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;load_more_spinner&quot;:{&quot;value&quot;:&quot;fas fa-spinner&quot;,&quot;library&quot;:&quot;fa-solid&quot;}}"
            data-widget_type="posts.cards">
            <div class="elementor-widget-container">
                <div
                    class="elementor-posts-container elementor-posts elementor-posts--skin-cards elementor-grid elementor-has-item-ratio">
                    <?php

                                            foreach ($postslist as $post) :  setup_postdata($post);
                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), 'single-post-thumbnail' );
                                                ?>
                    <article
                        class="elementor-post elementor-grid-item post-303 post type-post status-publish format-standard has-post-thumbnail hentry category-<?php echo $catslug; ?>">
                        <div class="elementor-post__card">
                            <a class="elementor-post__thumbnail__link" href="<?php the_permalink(); ?>">
                                <div class="elementor-post__thumbnail"><img data-attachment-id="302"
                                        data-permalink="<?php echo  $image[0]; ?>"
                                        data-orig-file="<?php echo  $image[0]; ?>?fit=378%2C304&amp;ssl=1"
                                        data-orig-size="378,304" data-comments-opened="1"
                                        data-image-meta="{&quot;aperture&quot;:&quot;0&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;0&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;0&quot;,&quot;iso&quot;:&quot;0&quot;,&quot;shutter_speed&quot;:&quot;0&quot;,&quot;title&quot;:&quot;&quot;,&quot;orientation&quot;:&quot;0&quot;}"
                                        data-image-title="Avatar’s card background" data-image-description=""
                                        data-image-caption=""
                                        data-medium-file="<?php echo  $image[0]; ?>?fit=300%2C241&amp;ssl=1"
                                        data-large-file="<?php echo  $image[0]; ?>?fit=378%2C304&amp;ssl=1" width="300"
                                        height="241" src="<?php echo  $image[0]; ?>?fit=300%2C241&amp;ssl=1"
                                        class="attachment-medium size-medium wp-image-302" alt="" decoding="async"
                                        loading="lazy"
                                        srcset="<?php echo  $image[0]; ?>?w=378&amp;ssl=1 378w, <?php echo  $image[0]; ?>?resize=300%2C241&amp;ssl=1 300w"
                                        sizes="(max-width: 300px) 100vw, 300px"></div>
                            </a>
                            <div class="elementor-post__badge"><?php echo get_cat_name( $category_id = $ccc );?></div>
                            <div class="elementor-post__text">
                                <h3 class="elementor-post__title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?> </a>
                                </h3>
                                <div class="elementor-post__excerpt">
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 17, '...'); ?></p>
                                </div>
                                <div class="elementor-post__read-more-wrapper">

                                    <a class="elementor-post__read-more" href="<?php the_permalink(); ?>"
                                        aria-label="Read more about Test Post 2">
                                        Read More <span style="color:#0ED63AF7">&gt;</span> </a>

                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
                <span class="e-load-more-spinner">
                    <i aria-hidden="true" class="fas fa-spinner"></i>
                </span>
            </div>
        </div>
        <?php
                            }
                            ?>


    </div>
</section>


<?php

get_footer();