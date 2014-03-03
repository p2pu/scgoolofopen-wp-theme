<?php get_header(); ?>

<div id="content" class="index">

    <div id="jumbotron" class="jumbotron clearfix">

        <div class="wrap">


            <div class="threecol first">

                <img src="<?php echo get_template_directory_uri() ?>/library/images/soo-logo-new-260x260.png"
                     alt="SOO Logo"/>

            </div>

            <?php query_posts('name=welcome-to-the-school-of-open'); ?>
            <?php while (have_posts()) : the_post(); ?>

                <div class="eightcol">

                    <div class="welcome">
                        <?php echo the_title(); ?>
                    </div>
                    <p>&nbsp;</p>

                    <p><?php the_content(); ?></p>
                </div>

            <?php endwhile;?>
        </div>

    </div>

    <div id="actions" class="actions-wrapper">

        <div class="section wrap clearfix actions-section">
            <?php $defaults =
                array(
                    'theme_location' => 'Jumbotrone Menu',
                    'container'       => 'nav',
                    'container_class' => 'actions',
                    'menu_class' => 'invitation-list',
                    'walker' => new Description_Walker
                );
            wp_nav_menu($defaults); ?>

        </div>

    </div>

    <div id="news-involved" class="section-background clearfix">

        <div id="inner-content" class="wrap clearfix">

            <div id="news" class="sixcol first news" role="main">

                <h1 class="section-heading"><?php echo __('News'); ?></h1>

                <?php query_posts(array ( 'category_name' => 'news', 'posts_per_page' => 2 )); ?>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

                        <header class="article-header">

                            <h3 class="h3"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                        </header>

                        <section class="entry-content clearfix">

                            <div class="excerpt-wraper">
                                <?php the_excerpt(); ?>
                            </div>

                        </section>

                        <?php // comments_template(); // uncomment if you want to use them ?>

                    </article>

                <?php endwhile; ?>

                    <a href="<?php echo get_category_link( get_cat_ID( 'news' ) ); ?> " class="btn btn-primary"><?php echo _('Read All'); ?> </a>

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

            <div id="get-involved" class="sixcol">

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

    <div id="community" class="section-background whitesmoke clearfix">

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
                                        <a href="<?php echo esc_attr($term_meta['profile']); ?>"
                                            class="community-member" target="_blank"
                                           data-toggle="popover" data-placement="bottom"
                                           data-content="<?php echo $term->description; ?>"
                                           data-original-title="<?php echo $term->name; ?>"
                                           data-trigger="hover"
                                           data-html="true">
                                            <img src="<?php echo esc_attr($term_meta['image']) ? esc_attr($term_meta['image']) : 'http://placehold.it/100x100'; ?>"
                                                 alt="<?php echo $term->name; ?>" />
                                        </a>
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

    <div id="workshops" class="section-background white clearfix">

        <div class="wrap clearfix">
            <div class="twelvecol">
                <h1 class="section-heading"><?php echo _('Workshops'); ?></h1>
            </div>
            <div class="sevencol first">
                <?php $defaults =
                    array(
                        'theme_location' => 'Training programs Menu',
                        'container'       => 'ul',
                        'container_class' => 'workshop-link-item',
                        'menu_class' => 'workshop-link-list clearfix first',
                    );
                wp_nav_menu($defaults); ?>
            </div>
            <?php query_posts('name=workshops'); ?>
            <?php while (have_posts()) : the_post(); ?>

                <div class="fivecol first">
                    <p><?php the_content(); ?></p>
                </div>

            <?php endwhile;?>

        </div>
    </div>

    <div id="training" class="section-background whitesmoke clearfix">
        <div class="wrap clearfix">
            <div class="twelvecol">
                <h1 class="section-heading"><?php echo _('Training programs') ?></h1>
            </div>
            <div class="fivecol first">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Vestibulum in magna in nibh accumsan adipiscing ut eu leo.
                Aenean eu ipsum adipiscing, gravida mi scelerisque, faucibus nisi.
                Sed id luctus lorem. Duis ultricies, ligula non euismod mattis,
                sapien neque cursus mi, vel vulputate nibh metus in eros.
                Etiam ut felis sit amet nunc posuere malesuada.
                Phasellus eleifend orci et vestibulum porttitor.
                Quisque pellentesque sem nulla, quis eleifend est suscipit ac.
                Cras vitae ante mauris. Integer eleifend dictum nisi adipiscing pharetra.
                Donec sed fermentum quam.
            </div>

            <div class="sevencol">

            </div>
        </div>


    </div>



</div>

<?php get_footer(); ?>
