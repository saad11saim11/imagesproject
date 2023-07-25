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
        <div class="post-card-wrapper">
                    <?php

                                                    foreach ($postslist as $post) :  setup_postdata($post);
                                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), 'single-post-thumbnail' );
                                                        ?>
                    <article class="<?php echo 'article-'.$ccc; ?> category-<?php echo $catslug; ?>">
                        <div class="post-card">
                            <a class="post__thumbnail__link" href="<?php the_permalink(); ?>">
                                <div class="post-featured-img"><img class="attachment-medium size-medium wp-image-302"
                                        alt="" loading="lazy"
                                        srcset="<?php echo  $image[0]; ?>?w=378&amp;ssl=1 378w, <?php echo  $image[0]; ?>?resize=300%2C241&amp;ssl=1 300w">
                                </div>
                            </a>
                            <div class="post-card-content">
                                <p class="post-category">
                                    <?php echo get_cat_name( $category_id = $ccc );?></p>
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?> </a>
                                </h3>
                                <div class="elementor-post__read-more-wrapper">
                                    <a href="<?php the_permalink(); ?>"> Read More </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>



                </div>
        <?php
                            }
                            ?>


    </div>
</section>


<?php

get_footer();