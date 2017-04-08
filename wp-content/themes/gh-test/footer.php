<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gh-test
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <section class="clients">
        <h2>Featured Clients</h2>
        <div class="client-list">
            <div class="slider owl-carousel owl-theme">
                <div class="item">
                    <div class="slider-content">
                        <img src="<?php echo get_theme_mod('site_slider_item1_image'); ?>" alt="Client">
                    </div>
                </div>
                <div class="item">
                    <div class="slider-content">
                        <img src="<?php echo get_theme_mod('site_slider_item2_image'); ?>" alt="Client">
                    </div>
                </div>
                <div class="item">
                    <div class="slider-content">
                        <img src="<?php echo get_theme_mod('site_slider_item3_image'); ?>" alt="Client">
                    </div>
                </div>
                <div class="item">
                    <div class="slider-content">
                        <img src="<?php echo get_theme_mod('site_slider_item4_image'); ?>" alt="Client">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (get_theme_mod('contact_bg') != '') { // if there is a background img
        $contact_bg = get_theme_mod('contact_bg'); // Assigning it to a variable to keep the markup clean
    }
    ?>
    <section class="contact-us" style="background-image:url('<?php echo $contact_bg ?>');">
        <div class="my-container">
            <div class="content">
                <div class="info col-md-6 col-xs-12">
                    <h2>Contact Us:</h2>
                    <div class="data">
                        It is a long established fact that a reader will be distracted by
                        the readable content of a page when looking at its layout.
                    </div>
                    <div class="phone">
                        <div class="icon"></div>
                        <div> <?php echo get_theme_mod('phone'); ?></div>
                    </div>
                    <div class="location">
                        <div class="icon"></div>
                        <div> <?php echo get_theme_mod('location'); ?></div>
                    </div>
                    <div id="map" style="width:560px;height:385px;">
                        <script>
                            function initMap() {
                                var uluru = {lat: -33.865143, lng: 151.209900};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 15,
                                    center: uluru
                                });
                                var marker = new google.maps.Marker({
                                    position: uluru,
                                    map: map
                                });
                            }
                        </script>
                    </div>
                </div>
                <div class="form col-md-6 col-xs-12">
                    <?php $args = array('post_type' => 'contact', 'posts_per_page' => 1);
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        the_content();
                    endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <div>
            <img src="<?php echo get_theme_mod('logo'); ?>" alt="logo">
        </div>
        <div class="copyright">
            <div>
                <?php echo get_theme_mod('copyright'); ?>
            </div>
        </div>
    </section>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOB9GIZb85_51E6VMvXxIGwDjAuAPOxqs&callback=initMap"
        async defer>
</script>
</body>
</html>
