<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package p619
 */
$footer_string = get_theme_mod("footer_text", false);
if ( ! $footer_text ) {

}

?>

</div><!-- #content -->

<p><?php echo $footer_text; ?></p>

</div><!-- #page -->

<!--php wp_footer(); -->

</body>
</html>
