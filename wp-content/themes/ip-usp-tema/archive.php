<?php
/**
 * The template for displaying Archive Results pages.
 *
 * @package unite
 */

get_header(); ?>
	
	<div class="container conteudo conteudo-archive">
		<div class="resultados">
			<?php get_template_part( 'content', 'archive' ); ?>
		</div>
	</div>

<?php get_footer(); ?>