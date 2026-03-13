<?php

get_header();

// Fetch the posts page title for the header
$posts_page_id = get_option('page_for_posts');
$posts_page_title = get_the_title($posts_page_id);
?>

<!-- <div class="col-12 text-center text-white" style="padding-top:25px;padding-bottom:25px;background:#1E2D34;">

</div> -->

<section class="body" style="padding:50px 0;">
    <div class="container">
        <div class="row">
			<div class="col-12">
				<h1><?php echo esc_html($posts_page_title); ?></h1>
			</div>
<div class="col-md-9 order-1 d-flex flex-wrap">
            <?php
            if (have_posts()) :
                $counterBlog = 0;
                while (have_posts()) : the_post();
                    $counterBlog++;
                    if ($counterBlog > 2) {
                        $counterBlog = 1; // Reset counter for delay calculation
                    }
            ?>
                    <div class="col-md-6 col-12" style="margin-bottom: 50px;" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($counterBlog . '00'); ?>">
                        <div class="w-100 h-100 blog-content position-relative overflow-hidden">
                            <div class="img-hover overflow-hidden">
                                <a href="<?php echo esc_url(get_permalink()); ?>" style="text-decoration:none;" title="<?php echo esc_attr('Read more for article ' . get_the_title()); ?>">
                                    <?php
                                    the_post_thumbnail(
                                        'full',
                                        array(
                                            'class' => 'w-100 d-block',
                                            'style' => 'height:250px;object-fit:contain;object-position:top;'
                                        )
                                    );
                                    ?>
                                </a>
                            </div>
                            <div class="position-relative z-1" style="padding:25px 0;">
                                <a href="<?php echo esc_url(get_permalink()); ?>" style="text-decoration:none;" title="<?php echo esc_attr('Read more for article ' . get_the_title()); ?>">
                                    <h3 class="h5 text-black bold" style="line-height:1.5;"><?php echo esc_html(get_the_title()); ?></h3>
                                </a>
                                <?php echo wp_kses_post(get_the_excerpt()); ?>
                            </div>
                            <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr('Read more for article ' . get_the_title()); ?>" class="z-3 bold" style="color:var(--accent-secondary);">
                                Read More <?php echo chevronRight(); ?>
                            </a>
                        </div>
                    </div>
            <?php
                endwhile;

                echo '<div class="col-12 d-flex justify-content-center pt-4">';
                the_posts_pagination(array(
                    'mid_size' => 2, // Reduced mid_size to show fewer page numbers
                    'prev_text' => __('Previous Page', 'textdomain'),
                    'next_text' => __('Next Page', 'textdomain'),
                ));
                echo '</div>';

            else : ?>
                <div class="col-12"><p><?php echo esc_html__('No posts found.', 'textdomain') ?></p></div>
<?php           
	endif;
            ?>
			</div>
			<?php echo get_template_part('partials/sidebar'); ?>
        </div>
    </div>
</section>

<?php 
echo do_shortcode('[discovery_engineering_contact]');
?>

<?php get_footer(); ?>