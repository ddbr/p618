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
$footer_text = get_theme_mod("footer_text", false);
if ( ! $footer_text ) {
	$footer_text = preg_replace(
              "~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~",
              "<a href=\"\\0\">\\0</a>",
              $footer_text);

	$footer_text = preg_replace(
              "/(\S+@\S+\.\S+)/",
              "<a href="mailto:$1">$1</a>", 
              $footer_text);
}
?>

</div><!-- #content -->

</div><!-- #page -->

<p><?php echo $footer_text; ?></p>
<?php wp_footer(); ?>

</body>
</html>
