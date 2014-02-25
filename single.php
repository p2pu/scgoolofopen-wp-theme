<?php get_header(); ?>

			<div id="content clearfix">

                <?php get_sidebar(); ?><div class="onecol hidden-phone">&nbsp;</div>

                <div id="main" class="sixcol first clearfix" role="main">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                            <header class="article-header">

                                <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
                                <p class="byline vcard"><?php
                                    printf( __( 'by <span class="author">%3$s</span> on <time class="updated" datetime="%1$s" pubdate>%2$s</time> <span class="amp">&middot;</span> <span class="comments-count" ><a href="%5$s#disqus_thread">%4$s Comments</a></span>. ', 'bonestheme' ),
                                        get_the_time( 'Y-m-j' ),
                                        get_the_time( __( 'F j, Y', 'bonestheme' ) ),
                                        bones_get_the_author_posts_link(),
                                        wp_count_comments( $id )->approved,
                                        get_permalink( $id )
                                    );
                                    if ( is_user_logged_in() ) {
                                        echo '<a href="' . get_edit_post_link( $id, $context ) . '"><small>[EDIT]</small></a>';
                                    }
                                ?></p>

                            </header>

                            <section class="entry-content clearfix" itemprop="articleBody">
                                <?php the_content(); ?>
                            </section>

                            <footer class="article-footer">
                                <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                                <div class="post-footer social">

                                    <div class="left">
                                        <?php printf(__('If you enjoyed this article, please consider sharing it!'));?>
                                    </div>
                                    <div class="right">
                                        <?php
                                            $upermalink = urlencode(get_permalink());
                                            $utitle = urlencode(get_the_title());
                                        ?>

                                            <a href="http://reddit.com/submit?phase=2&amp;url=<?php echo $upermalink;?>&amp;title=<?php echo urlencode( strip_tags($utitle) );?>" title="<?php printf( __('Share on'));?> Reddit" rel="nofollow" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/library/images/share_icons/reddit.png" alt="Reddit" /></a>

                                            <a href="http://www.facebook.com/sharer.php?u=<?php echo $upermalink; ?>&amp;t=<?php echo urlencode( strip_tags($utitle) );?>" title="<?php printf( __('Share on'));?> Facebook" rel="nofollow" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/library/images/share_icons/facebook.png" alt="Facebook" /></a>

                                            <a href="http://twitter.com/?status=New%20post%20%40p2pu%20blog%3A%20<?php echo $utitle;?>%20<?php echo $upermalink;?>%20" title="<?php printf( __('Share on'));?> Twitter" rel="nofollow" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/library/images/share_icons/twitter.png" alt="Twitter" /></a>

                                            <a href="https://plus.google.com/share?url=<?php echo $upermalink;?>" target="_blank" title="<?php printf( __('Share on'));?> Google+" rel="nofollow" ><img src="<?php bloginfo ('template_url'); ?>/library/images/share_icons/google.png" alt="Google+" ></a>

                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $upermalink;?>" target="_blank" title="<?php printf( __('Share on'));?> Linkedin" rel="nofollow"><img src="<?php bloginfo ('template_url'); ?>/library/images/share_icons/linkedin.png" alt="LinkedIn" ></a>

                                            <a href="http://www.stumbleupon.com/submit?url=<?php echo $upermalink;?>&amp;title=<?php echo $utitle;?>" target="_blank" title="<?php printf( __('Share on'));?> Stumbleupon" rel="nofollow"><img src="<?php bloginfo ('template_url'); ?>/library/images/share_icons/stumbleupon.png" alt="StumbleUpon"></a>

                                            <a href="http://www.tumblr.com/share/link?url=<?php echo $upermalink; ?>&amp;name=<?php echo $utitle; ?>" title="<?php printf( __('Share on'));?> Tumblr" rel="nofollow" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/library/images/share_icons/tumblr.png" alt="tumblr"></a>

                                    </div>
                                <div class="clear"></div>
                            </div>
                            </footer>

                            <?php comments_template(); ?>

                        </article>

                    <?php endwhile; ?>

                    <?php else : ?>

                        <article id="post-not-found" class="hentry clearfix">
                                <header class="article-header">
                                    <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                                </header>
                                <section class="entry-content">
                                    <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                                </section>
                                <footer class="article-footer">
                                        <p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
                                </footer>
                        </article>

                    <?php endif; ?>

                </div>

			</div>

<?php get_footer(); ?>
