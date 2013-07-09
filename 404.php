			<?php
				/**
				 * @package WordPress
				 * @subpackage geocology_Theme
				 */
				get_header();
            ?>
            <div class="grid_5" id="topNavLinks">
                <h2>
                    <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>" title="go back to the home page of our site">home</a></span>
                </h2>
            </div>
        </div><!-- contactNav -->
        <div class="grid_12"><h1> </h1></div> <!-- shameful hack for vertical line & whitespace -->
        <div class="grid_6">
			<div>
				<p>Sorry, there is nothing at this address.<br />
				Maybe we moved it somewhere else?</p>
				
				<p>If you suspect this is an error, please let us know.</p>
			</div>
		</div>
		<?php get_footer(); ?>