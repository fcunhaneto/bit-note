<?php ?>
			<div class="eqheight-class eqheight-sidbar col-md-3 hidden-xs hidden-sm ">
				<aside class="sidebar">
					<?php
						if ( is_home() ) :
						?>
						<div class="social-media social-media-aside">
							<span class="facebook"><?php bit_note_include_facebook_share( home_url() ); ?></span>
							<span class="google"><?php bit_note_include_google_like(); ?></span>
						</div>
						<?php
						endif;
					?>
					<?php dynamic_sidebar('sidebar-right-widgets'); ?>

				</aside>    <!-- end sidbar -->
			</div>
		</div>    <!-- end row -->
	</div>    <!-- end container -->
