<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gh-test
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="blog-head">
                <div>Blog Posts</div>
            </div>
            <div class="posts">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post(); ?>
                        <div class="post-wrap">
                            <article class="post">
                                <div class="thumbnail">
                                    <img src="<?php the_field('Thumbnail'); ?>" alt="<?php echo the_title(); ?>">
                                </div>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="content">
                                    <?php
                                    if ($post->post_excerpt) { ?>
                                        <p>
                                            <?php echo get_the_excerpt(); ?>
                                            <a href="<?php the_permalink(); ?>">Continue reading &raquo;</a>
                                        </p>
                                    <?php } else {
                                        the_content();
                                    } ?>
                                </div>
                                <div class="post-info">
                                    <div class="icon"></div>
                                    <div class="time"><?php the_time('d,m,Y'); ?></div>
                                </div>
                            </article>
                        </div>
                    <?php }
                } else {
                    echo '<p>No posts found!</p>';
                } ?>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
