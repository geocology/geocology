                <?php get_header(); ?>
                <div class="col-md-5" id="topNavLinks">
                    <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>" title="go back to the home page of our site">home</a></span>
                </div>
            </div><!-- contactNav -->
        </div><!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <h1>projects</h1>
            </div>
            <!-- query adapted from diceone http://wordpress.org/support/topic/297090#post-1186292 and http://wordpress.org/support/topic/adding-a-different-class-to-every-third-post -->
            <?php
                query_posts('post_type=geo_project&orderby=date&order=DESC&posts_per_page=-1');
                if ( have_posts() ) :
                while (have_posts()) : the_post();
            ?>
            <div class="col-xs-6 col-sm-3 projectCard">
                <?php
                    $excerpt = strip_tags(get_the_excerpt());
                    $excerpt = $excerpt . ' Click for more info.';
                    $img_args = array(
                        'title'	=> $excerpt,
                        'class' => 'img-responsive'
                    );
                ?>
                <a href="<?php the_permalink(); ?>">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'project-thumbnail', $img_args);
                        }
                    ?>
                </a>
                <div class="projectCardTitle">
                    <a href="<?php the_permalink(); ?>" title="<?php echo $excerpt ?>">
                        <?php the_title(); ?>
                    </a>
                </div>
            </div>
            <?php
                endwhile;
                else :
            ?>
            <p>No projects.</p>
            <?php
                endif;
                wp_reset_query();
            ?>
        </div>
        <div class="row">
            <div class="grid_12 navLinks">
                <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>" title="go back to the home page of our site">home</a></span>
                <span class="navLink"><a href="#top" title="jump back to the top of this page">top</a> &uarr;</span>
            </div>
        </div>
		<?php get_footer(); ?>