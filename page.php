<?php get_header(); ?>
    <div class="page-title">
        <div class="w-layout-blockcontainer container w-container">
            <div class="sub-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/sub-title.svg" loading="lazy" alt="Icon"/>
                <div><?php echo get_post_meta(get_the_ID(), 'subtitle', true); ?></div>
            </div>
            <h1 class="main-title"><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="page-data">

        <?php
            // Display error or success message from session if set
            if (isset($_SESSION['error'])) {
                echo "<div style='color: red;'>" . $_SESSION['error'] . "</div>";
                unset($_SESSION['error']);  // Clear the error after displaying it
            } elseif (isset($_SESSION['success'])) {
                echo "<div style='color: green;'>" . $_SESSION['success'] . "</div>";
                unset($_SESSION['success']);  // Clear the success message after displaying it
            }
        ?>
        
        <?php the_content(); ?>
        
        <?php if (get_post_meta(get_the_ID(), '_include_volunteers', true)) : ?>
        <?php get_template_part('template-parts/volunteer-block'); ?>
        <?php endif; ?>

        <?php if (get_post_meta(get_the_ID(), '_include_posts', true)) : ?>
            <?php get_template_part('template-parts/posts-block'); ?>
        <?php endif; ?>

        <?php if (get_post_meta(get_the_ID(), '_include_faq', true)) : ?>
            <?php get_template_part('template-parts/faq'); ?>
        <?php endif; ?>

    </div>

<?php get_footer(); ?>