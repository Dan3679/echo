<?php
// home.php
get_header();
?>

    <main id="primary" class="site-main">
        <h1><?php esc_html_e('Latest Posts', 'echo'); ?></h1>

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div><?php the_excerpt(); ?></div>
                </article>
                <hr>
            <?php
            endwhile;

            the_posts_pagination();
        else :
            echo '<p>' . esc_html__('No posts found', 'echo') . '</p>';
        endif;
        ?>
    </main>

<?php
get_footer();
