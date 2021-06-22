<?php
/**
 * This file allows you to include the buttons share and like for facebook and
 * google with out any plugin. You only need to put the below functions in the
 *
 * You only need to put the functions below in the parts of wordpress where you
 * need it, the only thing you need to change if necessary is the language used
 * in the scripts of the functions:
 *
 * include_facebook_script () where you should replace in line:
 * js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9&appId=1099541506786581";
 * The pt_BR string for a referent language used on your site.
 *
 * include_google_script () where in the same way on the line where it is:
 * window .___ gcfg = {lang: 'pt-BR'};
 * Replace the pt-BR string with a referent language used on your site.
 *
 * Theme: Bit Note
 * Theme URI: https://github.com/fcunhaneto/bit-note
 * Author: Francisco Cunha Neto
 * Author URI: http://cadernoscicomp.com.br/
 *
 * Version: 1.0
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

// Get the link for use in social midias
function get_social_media_link() {
	if ( is_home() || is_archive()  )
		return home_url();

	return get_permalink();
}

 // Include facebook like button
 function bit_note_include_facebook_like() {
	 ?>
	 	<div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
	 <?php
 }

// Include facebook share button
function bit_note_include_facebook_share() {

	?>
	<div class="fb-share-button" data-href="<?php echo $link; ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartilhar</a></div>
	<?php
}

// Include google like button
function bit_note_include_google_like() {
	$link = get_social_media_link();
	?>
		<div class="g-plusone" data-size="medium" data-annotation="none" data-width="300" data-href="<?php echo $link; ?>"></div>
	<?php
}

// Include google like button
function bit_note_include_google_share() {
	$link = get_social_media_link();
	?>
		<div class="g-plus" data-action="share" data-annotation="none" data-action="share" data-annotation="none" data-href="<?php the_permalink() ?>"></div>
	<?php
}

// Facebook like and share buttons script
function bit_note_include_facebook_script() {
	?>
		<div id="fb-root"></div>
		<script type="text/javascript">
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9&appId=1099541506786581";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
	<?php
}

// Google like and share buttons script
function bit_note_include_google_script() {
	?>
		<script type="text/javascript">
		  window.___gcfg = {lang: 'pt-BR'};
		  (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/platform.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
	<?php
}

function bit_note_social_media() {
    ?>
    <div class="social-media">
        <span class="facebook"><?php bit_note_include_facebook_share(); ?></span>
        <span class="google"><?php bit_note_include_google_like(); ?></span>
    </div>
    <?php
}
