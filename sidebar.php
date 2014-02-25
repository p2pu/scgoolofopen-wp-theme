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
                        <ul class="clearfix">
                            <li class="onecol"><a href="#"><i class="icon-twitter-sign"></i></a></li>
                            <li class="onecol"><a href="#"><i class="icon-facebook-sign"></i></a></li>
                            <li class="onecol"><a href="#"><i class="icon-facebook-sign"></i></a></li>
                            <li class="onecol"><a href="#"><i class="icon-rss-sign"></i></a></li>
                        </ul>
                    </div>
                    <div class="widget hidden-phone">
                        <h4 class="widgettitle"><?php echo _('Twitter feed'); ?></h4>
                        <a class="twitter-timeline"  href="https://twitter.com/search?q=%23schoolofopen"  data-widget-id="438048936431857664">Tweets about "#schoolofopen"</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


                    </div>

				</div>