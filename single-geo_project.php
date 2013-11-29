                <?php
                    get_header();
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                ?>
                <div class="col-md-5" id="topNavLinks">
                    <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>" title="go back to the home page of our site">home</a></span>
                    <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>/projects" title="go to a page with all of our projects">projects</a></span>
                </div>
            </div><!-- contactNav -->
        </div><!-- .row -->
        <div class="row"><div class="col-md-12"><h1></h1></div></div>
<!--        <div class="grid_12"><h1> </h1></div> --> <!-- shameful hack for vertical line & whitespace -->
        <div class="row">
            <div class="col-md-6">
                <h2>
                    <?php
                    the_title();
                    ?>
                </h2>
                <div id="projectMeta">
                    <table>
                        <?php
                        $for = get_post_meta($post->ID, 'for', true);
                        if (!empty($for)) {
                            echo '
                            <tr>
                                <td class="key">for</td>
                                <td class="partner">';
                            echo $for;
                            echo '</td>
                            </tr>';
                        }
                        $with = get_post_meta($post->ID, 'with', true);
                        if (!empty($with)) {
                            echo '
                            <tr>
                                <td class="key">with</td>
                                <td class="partner">';
                            echo $with;
                            echo '</td>
                            </tr>';
                        }
                        $and = get_post_meta($post->ID, 'and', true);
                        if (!empty($and)) {
                            echo '
                            <tr>
                                <td class="key">and</td>
                                <td class="partner">';
                            echo $and;
                            echo '</td>
                            </tr>';
                        }
                        ?>
                        <tr>
                            <td class="key">
                                status
                            </td>
                            <td>
                                <?php
                                $terms = wp_get_object_terms( $post->ID, 'status');
                                foreach ( $terms as $term ) {
                                    echo $term->name;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="key">
                                as of
                            </td>
                            <td>
                                <?php echo get_the_date('F Y'); ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="summary">
                    <?php
                    the_excerpt();
                    ?>
                </div>
                <div id="description">
                    <?php
                    the_content();
                    ?>
                </div>
                <?php edit_post_link(); ?>
            </div>
            <div class="col-md-6">
                <div id="projectImage">
                    <?php
                    if ( has_post_thumbnail() ) {
                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                        echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
                        the_post_thumbnail('project-medium');
                        echo '</a>';
                    }
                    ?>
                </div>
                <?php
                // working from http://codex.wordpress.org/Function_Reference/wp_get_attachment_image#Display_all_images_as_a_list
                $args = array(
                    'post_type' => 'attachment',
                    'numberposts' => -1,
                    'post_status' => null,
                    'post_parent' => $post->ID
                );
                $attachments = get_posts( $args );
                array_pop($attachments); // drop the last attachment in the array, becauase it always seems to be the main image which we don't want to repeat
                $gridPosition = 'first';
                foreach ( $attachments as $attachment ) {
                    if ($gridPosition == 'first') {
                        echo '<div class="grid_3 alpha projectThumb">';
                        $gridPosition = 'last';
                    } elseif ($gridPosition == 'last') {
                        echo '<div class="grid_3 omega projectThumb">';
                        $gridPosition = 'first';
                    }
                    $largeSrcArray = wp_get_attachment_image_src($attachment->ID, 'large');
                    $largeUrl = $largeSrcArray[0];
                    $thumbSrcArray = wp_get_attachment_image_src($attachment->ID, 'thumb');
                    $thumbUrl = $thumbSrcArray[0];
                    $thumbWidth = $thumbSrcArray[1];
                    $thumbHeight = $thumbSrcArray[2];
                    echo '<a href="'.$largeUrl.'"><img width="'.$thumbWidth.'" height="'.$thumbHeight.'" src="'.$thumbUrl.'"></a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="grid_12 navLinks">
                <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>" title="go back to the home page of our site">home</a></span>
                <span class="navLink">&larr; <a href="<?php bloginfo('url'); ?>/projects" title="go to a page with all of our projects">projects</a></span>
                <span class="navLink"><a href="#top" title="jump back to the top of this page">top</a> &uarr;</span>
            </div>
        </div>
        <?php endwhile; else : ?>
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
        <?php endif; ?>
		<?php get_footer(); ?>