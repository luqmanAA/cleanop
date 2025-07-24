<?php set_query_var('set_header_bg', true); ?>
<?php get_header(); ?>


<section class="pagetitle-section">
    <div class="section-gradient-wrap">
        <div class="shadow-gradient page-title"></div>
    </div>
    <div class="w-layout-blockcontainer container w-container">
        <div class="pagetitle-section-wrapper">
            <div class="pagetitle-title-box">
                <h1 class="pagetitle-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<?php the_content(); ?>

<?php if (get_post_meta(get_the_ID(), '_include_posts', true)) : ?>
    <?php get_template_part('template-parts/posts-block'); ?>
<?php endif; ?>

<?php get_footer(); ?>