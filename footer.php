			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="<?php echo is_home()?'wrap': ''; ?> clearfix">

					<nav role="navigation">
							<?php bones_footer_links(); ?>
					</nav>
                    <div class="source-org copyright threecol pull-right">
                        <a href="https://creativecommons.org/licenses/by/4.0/" target="_blank">
                            <img src="<?php echo get_template_directory_uri() ?>/library/images/cc-icons.png"
                                 alt="CC Icon" class="cc-icons"/>
                        </a>
                        <p class="cc-text">
                         <?php echo _('
                            Except where otherwise noted, content on this site is licensed under a
                            Creative Commons Attribution 4.0 International license.
                        '); ?>
                        </p>
                    </div>


				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/library/js/libs/bootstrap.min.js"></script>
		<script src="<?php bloginfo('stylesheet_directory'); ?>/library/js/libs/jquery.sidr.min.js"></script>
		<script>
			SOO.Homepage.init();
		</script>

        <?php include_once('analyticstracking.php') ?>

	</body>

</html>
