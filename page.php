			<?php
			/**
			 * @package WordPress
			 * @subpackage geocology_Theme
			 */
                get_header();
                if ( have_posts() ) : while ( have_posts() ) : the_post();
            ?>
            <div class="grid_5" id="topNavLinks">
                <h2>
                    <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>" title="go back to the home page of our site">home</a></span>
                </h2>
            </div>
        </div><!-- contactNav -->
        <div class="grid_12"><h1> </h1></div> <!-- shameful hack for vertical line & whitespace -->
        <div class="grid_6">
            <h2>
                <?php
                    the_title();
                ?>
            </h2>
			<div>
			<?php
                the_content();
            ?>
			</div>
			<?php edit_post_link(); ?>
		</div>
		<div class="grid_6">
		<?php
            if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'project-medium', $img_args );
        } ?>
		</div>
		<div class="grid_12 navLinks">
            <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>" title="go back to the home page">home</a></span>
            <span class="navLink"><a href="#top" title="jump back to the top of this page">top</a> &uarr;</span>
        </div>
        <?php endwhile; else : ?>
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
        <?php endif; ?>
		<?php get_footer(); ?>