<!-- before the archive will show up it seems to be necessary to create a page called projects, but that page should be blank and there is no need to assign it to this template -->
    		<?php get_header(); ?>
            <div class="grid_5" id="topNavLinks">
                <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>" title="go back to the home page of our site">home</a></span>
            </div>
        </div><!-- contactNav -->
        <div class="grid_12">
            <h1>projects</h1>
        </div>
        <!-- query adapted from diceone http://wordpress.org/support/topic/297090#post-1186292 and http://wordpress.org/support/topic/adding-a-different-class-to-every-third-post -->
        <?php
            query_posts('post_type=geo_project&orderby=date&order=DESC&posts_per_page=-1');
            if ( have_posts() ) :
                while (have_posts()) : the_post();
        ?>
        <div class="grid_3 projectCard">
			<?php 
				$excerpt = strip_tags(get_the_excerpt());
				$excerpt = $excerpt . ' Click for more info.';
				$img_args = array(
					'title'	=> $excerpt,
				);
			?>
            <a href="<?php the_permalink(); ?>">
            <?php
            if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'project-thumbnail', $img_args );
            } ?>
            </a>
            <a href="<?php the_permalink(); ?>" title="<?php echo $excerpt ?>">
                <?php the_title(); ?>
            </a>
        </div>
        <?php
            endwhile;
            else :
        ?>
            <p>No projects.</p>
        <?
            endif;
            wp_reset_query();
        ?>
        <div class="grid_12 navLinks">
            <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>" title="go back to the home page of our site">home</a></span>
            <span class="navLink"><a href="#top" title="jump back to the top of this page">top</a> &uarr;</span>
        </div>
		<?php get_footer(); ?>