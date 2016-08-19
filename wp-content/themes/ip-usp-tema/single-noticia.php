<?php
/**
 * Noticia template file.
 *
 * @package unite
 */

get_header(); ?>

	<div class="container conteudo">
		
		<?php get_template_part( 'content', 'single-noticia' ); ?>

		<?php get_template_part( 'content', 'single-relacionados' ); ?>
			

	</div><!--  container  -->


<?php get_footer(); ?>