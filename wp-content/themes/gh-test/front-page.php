<?php
get_header();
?>
<section class="why-us">
    <div class="my-container">
        <div class="content">
            <div class="picture col-md-6 col-xs-12">
                <img src="<?php echo get_theme_mod('why_image'); ?>" alt="">
            </div>
            <div class="description col-md-6 col-xs-12">
                <h1>Why <span>Us</span>?</h1>
                <div>
                    We are Professional
                </div>
                <div>
                    1000+ Clients, <span>Live Support</span>
                </div>
                <div class="info">
                    Lorem Ipsum is simply dummy text of the printing
                    and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever
                    since the 1500s,
                </div>
            </div>
        </div>
        <div class="arrow"></div>
    </div>
</section>
<section class="welcome">
    <div class="my-container">
        <div class="content">
            <div class="picture col-md-5 col-xs-12">
                <img src="<?php echo get_theme_mod('welcome_image'); ?>" alt="">
            </div>
            <div class="description col-md-7 col-xs-12">
                <h2>Welcome Here<span>.</span></h2>
                <div class="info">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since
                    the 1500s, when an unknown printer took a galley of type and scrambled it
                    to make a type <span>specimen book</span>. It has survived not only five centuries, but
                    also the leap into electronic typesetting, remaining essentially unchanged.
                    It was popularised in the 1960s with the <span>release of Letraset</span> sheets
                    containing Lorem Ipsum passages, and more recently with desktop
                    publishing software <span>like Aldus PageMaker including versions of
                Lorem Ipsum.</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="we-offer">
    <div class="my-container">
        <div class="content">
            <h2>We are Offering...</h2>
            <div class="description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's
                standard dummy text ever since the 1500s,
            </div>
            <div class="offers-list">
                <?php $args = array('post_type' => 'offers', 'posts_per_page' => 10);
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    echo '<div class="offer-item">';
                    echo '<div class="image">'; ?>
                    <img src="<?php the_field('Image'); ?>" alt="">
                    <?php echo '</div>';
                    echo '<div class="name">';
                    echo '<div>';
                    the_field('Name');
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="descr">'; ?>
                    <?php the_field('Descr'); ?>
                    <?php echo '</div>';
                    echo '</div>';
                endwhile; ?>
            </div>
        </div>
    </div>
</section>
<section class="works">
    <div class="my-container">
        <div class="content">
            <div class="description">
                <h2>Some of latest Work...</h2>
                <div class="descr">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's
                    standard dummy text ever since the 1500s,
                </div>
            </div>
            <div class="showcase">
                <nav>
                    <ul>
                        <li class="active"><a>All</a></li>
                        <li><a>Design</a></li>
                        <li><a>Development</a></li>
                        <li><a>SEO</a></li>
                        <li><a>Others</a></li>
                    </ul>
                </nav>
                <div class="work-list">
                    <?php $args = array('post_type' => 'works', 'posts_per_page' => 6);
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        echo '<div class="work-item">';
                        echo '<div class="type">';
                        echo '<div>';
                        the_field('Type');
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="image">'; ?>
                        <img src="<?php the_field('Image'); ?>" alt="">
                        <?php echo '</div>';
                        echo '</div>';
                    endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>
