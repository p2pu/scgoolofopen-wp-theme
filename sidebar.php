				<div id="sidebar1" class="sidebar threecol first clearfix" role="complementary">

                    <?php get_search_form(); ?>


					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>


                    <div class="widget">
                        <h4 class="widgettitle"><?php echo _('Follow'); ?></h4>
                        <ul class="social-icons-list clearfix">
                            <li>
                                <a href="https://twitter.com/creativecommons" class="social-icon" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                            <li>
                                <a href="https://www.facebook.com/creativecommons" class="social-icon" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                            <li>
                                <a href="<?php bloginfo('rss2_url'); ?>" class="social-icon" target="_blank"><i class="fa fa-rss-square"></i></a></li>
                        </ul>
                    </div>
                    <div class="widget hidden-phone">
                        <h4 class="widgettitle"><?php echo _('Twitter feed'); ?></h4>
                        <a class="twitter-timeline"  href="https://twitter.com/search?q=%23schoolofopen"
                           data-widget-id="438048936431857664" data-link-color="#05c6b4"
                           data-chrome="noheader nofooter noborders transparent noscrollbar"
                           data-tweet-limit="5"
                           data-aria-polite="assertive"
                           lang="EN">Tweets about "#schoolofopen"</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


                    </div>

				</div>