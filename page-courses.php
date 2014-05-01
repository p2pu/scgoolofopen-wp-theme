<?php
/*
Template Name: Courses Page
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix">

    <?php get_sidebar(); ?><div class="onecol hidden-phone">&nbsp;</div>

    <div id="main" class="sixcol clearfix" role="main">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <section class="entry-content clearfix" itemprop="articleBody"><?php
					// get courses

					$course_lists = get_posts(array('post_type' => 'course_list', 'orderby' => 'title', 'order' => 'ASC'));
					foreach($course_lists as $course_list){

						$courses = get_terms( 'courses', array( 'hide_empty' => 0 ) );
						if ( !empty( $courses ) && !is_wp_error( $courses ) ){?>
							<div class="course-list-title">
								<h2 id="<?php echo $course_list->post_name; ?>"><?php echo $course_list->post_title; ?></h2>
							</div>
							<div class="course-list-description">
								<?php echo $course_list->post_content; ?>
							</div>
							<div class="course-list"><?php
							foreach ( $courses as $course ) {
								$term_id = $course->term_id;
								$course_version = get_tax_meta($term_id,'course_version');
								//print_r($course_list->post_name);
								if( $course_version == $course_list->post_name ){
									$course_title = $course->name;
									$course_url = get_tax_meta($term_id,'course_url');
									$course_desc = $course->description;
									$img_object = get_tax_meta($term_id,'course_image');
									$signup = get_tax_meta($term_id,'course_status');
									?>
									<a href="<?php echo $course_url; ?>" class="course-thumbnail">
										<div class="course-item clearfix">
											<img src="<?php echo $img_object['src']; ?>" alt="<?php echo $course_title; ?> Cover Image"/>
											<div class="course-description">
												<h3 class="course-title"><?php echo $course_title; ?></h3>

												<div class="course-desc">
													<?php echo $course_desc; ?>
												</div>
												<hr/>
												<div class="course-status pull-right">
													<i class="fa fa-<?php echo ($signup == 'closed')?'ban': 'check';?>"></i>
													<?php echo _('Signup is '.$signup); ?>
												</div>
											</div>
										</div>
									</a><?php
								}

							}
							echo "</div>";
						}
					}

					/*
					//print_r($course_lists);
					$courses = get_terms( 'courses', array(
						'orderby'    => 'course_list',
						'hide_empty' => 0
					) );
					//print_r($courses);
					if($courses) {?>
						<div class="course-list"><?php

							foreach ($courses as $course) {
								$term_id = $course->term_id;
								$course_version = get_tax_meta($term_id,'course_version');

								if($course_version == 'facilitated-courses'){
									$course_version = get_tax_meta($term_id,'course_version');
									$course_title = $course->name;
									$course_url = get_tax_meta($term_id,'course_url');
									$course_desc = $course->description;
									$img_object = get_tax_meta($term_id,'course_image');
									$signup = get_tax_meta($term_id,'course_status');
									?>
									<a href="<?php echo $course_url; ?>" class="course-thumbnail">
										<div class="course-item clearfix">
											<img src="<?php echo $img_object['src']; ?>" alt="<?php echo $course_title; ?> Cover Image"/>
											<div class="course-description">
												<h3 class="course-title"><?php echo $course_title; ?></h3>

												<div class="course-desc">
													<?php echo $course_desc; ?>
												</div>
												<hr/>
												<div class="pull-right"><?php echo _('Signup is '.$signup);?></div>
											</div>
										</div>
									</a><?php
							}
						}?>
						</div><?php
					}*/

					?>




                    <div class="courses-notice">
						<?php the_content(); ?>
                    </div>
                </section>

                <footer class="article-footer">
                    <?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?>

                </footer>

            </article>

        <?php endwhile; else : ?>

            <article id="post-not-found" class="hentry clearfix">
                <header class="article-header">
                    <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                </header>
                <section class="entry-content">
                    <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                </section>
                <footer class="article-footer">
                    <p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
                </footer>
            </article>

        <?php endif; ?>

    </div>

</div>

<?php get_footer(); ?>

