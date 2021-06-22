<?php ?>
		<footer class="wrap-center footer-page">
			<div class="container">
				<div class="row">
					<div class="footer-left col-md-3"><?php dynamic_sidebar( 'footer-left-widget' ); ?>		
					</div>
					<div class="footer-center-left col-md-3"><?php dynamic_sidebar( 'footer-center-left-widget' ); ?></div>
					<div class="footer-center-right col-md-3"><?php dynamic_sidebar( 'footer-center-right-widget' ); ?></div>
					<div class="footer-right col-md-3"><?php dynamic_sidebar( 'footer-right-widget' ); ?></div>
				</div>
			</div>
		</footer>
	<?php wp_footer(); ?>
	<?php bit_note_include_google_script(); ?>
</body>
</html>
