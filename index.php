<?php get_header(); ?>

<div id="content" class="index">

    <div class="jumbotron clearfix">

        <div class="wrap">


            <div class="threecol first">

                <img src="<?php echo get_template_directory_uri() ?>/library/images/soo_logo.png"
                     alt="SOO Logo"/>

            </div>

            <?php
            $the_slug = 'welcome-to-the-school-of-open';
            $args=array(
                'name' => $the_slug,
                'post_type' => 'post',
                'post_status' => 'publish',
                'numberposts' => 1
            );
            $heading = get_post(44);?>
                <div class="eightcol">

                <div class="welcome"><?php echo $heading->post_title; ?></div>

                <p><?php echo $heading->post_content; ?></p>
            </div>

        </div>

    </div>

    <div class="section wrap clearfix">
        <?php $defaults =
            array(
                'theme_location' => 'Jumbotrone Menu',
                'container'       => 'nav',
                'container_class' => 'actions',
                'menu_class' => 'invitation-list',
                'walker' => new Description_Walker
            );
        wp_nav_menu($defaults); ?>

        <!--
        <nav class="actions">

           <?php

            query_posts(array(
                'post_type' => 'jumbotron_menu',
                'showposts' => 3
            ) );?>

            <?php if (have_posts()): ?>

                <ul>

                <?php while (have_posts()) : the_post(); ?>

                    <li class="first <?php echo get_post_meta( get_the_ID(), 'class', true ); ?> fourcol">

                        <div class="clearfix">

                            <h1><?php the_title(); ?></h1>

                            <?php the_post_thumbnail(); ?>

                        </div>

                        <p><?php echo get_the_excerpt(); ?></p>

                        <a href="<?php the_permalink() ?>">
                            <?php echo __(get_post_meta( get_the_ID(), 'read more link', true )); ?>
                        </a>

                    </li>

                <?php endwhile;?>

                </ul>

            <?php endif; ?>

        </nav>
        -->
    </div>

    <div class="section-background clearfix">

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="sixcol first" role="main">

                <h1 class="section-heading"><?php echo __('News'); ?></h1>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

                        <header class="article-header">

                            <h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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

                        <section class="entry-content clearfix">

                            <?php
                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                ?>
                                <div class="thumbnail-wrapper img-polaroid pull-left">
                                <a href="<?php the_permalink() ?>">
                                    <?php echo get_the_post_thumbnail( $id, array( 160, 160) ); ?>
                                </a>
                                </div><?php
                                //echo get_the_post_thumbnail( $id );
                            } ?>
                            <div class="excerpt-wraper">
                                <?php the_excerpt(); ?>
                            </div>

                        </section>

                        <footer class="article-footer">
                            <p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

                        </footer>

                        <?php // comments_template(); // uncomment if you want to use them ?>

                    </article>

                <?php endwhile; ?>

                    <?php if ( function_exists( 'bones_page_navi' ) ) { ?>
                        <?php bones_page_navi(); ?>
                    <?php } else { ?>
                        <nav class="wp-prev-next">
                            <ul class="clearfix">
                                <li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
                                <li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
                            </ul>
                        </nav>
                    <?php } ?>

                <?php else : ?>

                    <article id="post-not-found" class="hentry clearfix">
                        <header class="article-header">
                            <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                        </header>
                        <section class="entry-content">
                            <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                        </section>
                        <footer class="article-footer">
                            <p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
                        </footer>
                    </article>

                <?php endif; ?>

            </div>

            <div class="sixcol">

                <h1 class="section-heading"><?php echo __('Get Involved'); ?></h1>

                <?php $defaults =
                    array(
                        'theme_location' => 'Involvement Menu',
                        'container'       => 'nav',
                        'container_class' => 'invitation',
                        'menu_class' => 'invitation-list'
                    );
                wp_nav_menu($defaults); ?>

            </div>

        </div>

    </div>

    <div class="section-background whitesmoke clearfix">

        <div class="wrap clearfix">

            <div class="twelwecol">

                <h1 class="section-heading">Community</h1>

            </div>

            <?php
                query_posts(array(
                    'post_type' => 'coummunity'
                ) );
            ?>
            <?php if (have_posts()): ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $terms = get_terms( 'members', array(
                        'hide_empty' => 0,
                    ));
                    ?>
                    <?php

                    ?>
                <div class="community clearfix">
                    <div class="sixcol first">
                        <h2 class="community-heading"><?php the_title(); ?></h2>
                        <?php echo get_the_content(); ?>
                    </div>

                    <div class="sixcol">
                        <?php if ($terms) {?>
                        <h2>&nbsp;</h2>
                        <ul class="media-list">
                        <?php
                            foreach($terms as $term) {
                                $t_id = $term->term_id;
                                $term_meta = get_option("taxonomy_$t_id");
                                if (esc_attr($term_meta['community']) == $post->post_name){?>
                                    <li class="first pull-left">
                                        <div class="thumbnail"
                                           data-toggle="popover" data-placement="top"
                                           data-content="<?php echo $term->description; ?>"
                                           data-original-title="<?php echo $term->name; ?>"
                                           data-trigger="hover"
                                           data-html="true">
                                            <img src="<?php echo esc_attr($term_meta['image']) ? esc_attr($term_meta['image']) : 'http://placehold.it/100x100'; ?>" alt=""/>
                                            <a href="<?php echo esc_attr($term_meta['profile'])?>">
                                                <?php echo $term->name; ?>
                                            </a>
                                        </div>
                                    </li><?php
                                }
                            }?>
                        </ul><?php
                        }?>
                    </div>
                </div>
                <?php endwhile;?>
            <?php endif; ?>

        </div>

    </div>

    <div class="section-background whitesmoke clearfix">

        <div class="wrap clearfix">

        </div>
    </div>










			</div>

<?php get_footer(); ?>
