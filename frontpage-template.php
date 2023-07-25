<?php  /* Template Name: Front Page */
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


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<section class="custom-blogs">
    <div class="elementor-widget-wrap elementor-element-populated e-swiper-container">
        <div class="page-heading">
            <h1>THE LEET BLOG</h1>
        </div>
        <?php
                        $cat_ids = get_terms(
                            array(
                                'taxonomy' => 'category',
                                'fields'   => 'ids',
                            )
                        );
                      
                        $ne=[$cat_ids[$key]];
                        unset($cat_ids[$key]);
                        array_unshift($cat_ids, $key);
                        $cat_ids = array_merge($ne,$cat_ids);

                        ?>
        <div class="main-category">
            <ul class="nav nav-pills cat-ul">

                <?php
                                        $coa=0;
				
                                        foreach ($cat_ids as $catid){
                                            $ccc=$catid;
											$na=get_cat_name( $category_id = $ccc );
											if(!empty($na)){
												 if($ccc != 1 ){

                                                $coa++;

                                             ?>
                <li class="">

                    <a data-toggle="pill"
                        href="#<?php echo 'cat-'.$ccc; ?>"><?php echo get_cat_name( $category_id = $ccc );?></a>

                    <?php
                                            }
											}
                                        }
                                        ?>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="bread-crumb bread-crumb-all">
                <a class="bread bread-home" href="http://blog.casino1337.com/"> Home > </a>
                <a class="bread" href="#">All</a>
            </div>
            <?php
                            foreach ($cat_ids as $catid){
                                $ccc=$catid;
								$na=get_cat_name( $category_id = $ccc );
								if(!empty($na)){
									$catinfo = get_category($ccc);
                                $catslug= $catinfo->slug;
                                $args = array( 'category' => $ccc, 'post_type' =>  'post' ,'numberposts' => 6);
                                $postslist = get_posts( $args );
                                if($postslist){
                                    $coun=count($postslist);
                                    ?>
            <div id="<?php echo 'cat-'.$ccc; ?>" class="tab-pane fade in active cus-tab">
                <div class="bread-crumb bread-crumb-category">
                    <a class="bread" href="http://blog.casino1337.com/<?php echo $hom_li; ?>"><?php pll_e('Home');?> >
                    </a>
                    <a class="bread"
                        href="http://blog.casino1337.com/category/<?php echo $catslug; ?>/"><?php echo get_cat_name( $category_id = $ccc );?>
                    </a>
                </div>
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
                <span class="e-load-more-spinner cus_spiner">
                    <?php
                                                    if($coun>3){
                                                        ?>
                    <div class="elementor-post__read-more-wrapper">
                        <a class="elementor-post__read-more" id="<?php echo 'showMoreBtn-'.$ccc; ?>"
                            aria-label="Show more"> Show More </a>
                    </div>
                    <?php
                                                    }
                                                    ?>
                </span>
            </div>
            <script>
            (function($) {

                var numRowsToShow = 3;
                var numRowsHidden = $('.<?php echo 'article-'.$ccc; ?>').length - numRowsToShow;
                console.log(numRowsHidden);
                jQuery('.<?php echo 'article-'.$ccc; ?>').slice(numRowsToShow).addClass('hide');

                jQuery('#<?php echo 'showMoreBtn-'.$ccc; ?>').click(function($) {
                    console.log(numRowsHidden)
                    numRowsHidden -= numRowsToShow;
                    jQuery('.<?php echo 'article-'.$ccc; ?>.hide').slice(0, numRowsToShow)
                        .removeClass('hide');

                    if (numRowsHidden <= 0) {
                        jQuery('#<?php echo 'showMoreBtn-'.$ccc; ?>').hide();
                    }
                });

            })(jQuery);
            jQuery(".cat-ul li").click(function() {
                jQuery(".bread-crumb-all").hide();
                jQuery(".bread-crumb-category").show();

            });
            </script>
            <?php
                                }
								}
                            }
                            ?>
        </div>
    </div>



</section>

<?php

get_footer();