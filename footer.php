			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">

					<nav role="navigation">
							<?php bones_footer_links(); ?>
					</nav>

					<p class="source-org copyright"><?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

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
	</body>

</html>
