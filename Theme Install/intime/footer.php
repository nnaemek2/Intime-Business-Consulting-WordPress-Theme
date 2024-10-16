<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Intime
 */ 
$back_totop_on = intime_get_opt('back_totop_on', true);
?>
	</div><!-- #content inner -->
</div><!-- #content -->

<?php intime_footer(); ?>
<?php if (isset($back_totop_on) && $back_totop_on) : ?>
    <a href="#" class="scroll-top"><i class="zmdi zmdi-long-arrow-up"></i></a>
<?php endif; ?>

</div><!-- #page -->
<?php intime_search_popup(); ?>
<?php intime_sidebar_hidden(); ?>
<?php intime_cart_sidebar(); ?>
<?php intime_mouse_move_animation(); ?>
<?php intime_newsletter_popup(); ?>
<?php wp_footer(); ?>

</body>
</html>
