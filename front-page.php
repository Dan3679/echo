<?php
// front-page.php
get_header();
?>

    <main id="primary" class="site-main">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        else :
            echo '<p>' . esc_html__('No content found', 'echo') . '</p>';
        endif;
        ?>
    </main>

<?php
get_footer();