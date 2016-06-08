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
$url_pattern = "|(https?://([\d\w\.-]+\.[\w\.]{2,6})[^\s\]\[\<\>]*/?)|i";
$footer_text = preg_replace($url_pattern, '<a href="$1">$2</a>', $footer_text);
$mail_pattern = "/([A-z0-9_-]+\@[A-z0-9_-]+\.)([A-z0-9\_\-\.]{1,}[A-z])/";
$footer_text = preg_replace($mail_pattern, '<a href="mailto:$1$2">$1$2</a>', $footer_text);

?>

</div><!-- #content -->

</div><!-- #page -->

<div class="footer"><?php echo $footer_text; ?></div>

<?php wp_footer(); ?>
</body>
</html>
