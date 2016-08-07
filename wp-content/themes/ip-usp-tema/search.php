<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package unite
 */

get_header(); ?>

	<div class="container conteudo conteudo-search">
		<div class="resultados">
			<?php get_template_part( 'content', 'archive' ); ?>
		</div>
	</div><!--  container  -->

<?php get_footer(); ?>
