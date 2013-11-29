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
            <div class="col-md-6 pull-right" id="projectImage">
                <?php
                if ( has_post_thumbnail() ) {
                    $img_args = array(
                        'title'	=> 'click to enlarge',
                        'class' => 'img-responsive'
                    );
                    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                    echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
                    the_post_thumbnail('project-medium', $img_args);
                    echo '</a>';
                }
                ?>
            </div>
            <div class="col-md-6">
                <h2>
                    <?php
                    the_title();
                    ?>
                </h2>
                <div class="row">
                    <div id="projectMeta" class="col-md-5 col-sm-4">
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
                    <div id="summary" class="col-md-7 col-sm-8">
                        <span class="key">summary</span>
                        <span id="summaryText">
                            <?php the_excerpt(); ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div id="description" class="col-md-12">
                        <?php
                            the_content();
                            edit_post_link();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 pull-right">
                <div class="row">
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
                        foreach ( $attachments as $attachment ) {
                            ?>
                                <div class="col-xs-6 projectThumb">
                            <?php
                                $largeSrcArray = wp_get_attachment_image_src($attachment->ID, 'large');
                                $largeUrl = $largeSrcArray[0];
                                $thumbSrcArray = wp_get_attachment_image_src($attachment->ID, 'project-thumbnail');
                                $thumbUrl = $thumbSrcArray[0];
                                echo '<a href="'.$largeUrl.'"><img class="img-responsive" src="'.$thumbUrl.'"></a>';
                            ?>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 navLinks">
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