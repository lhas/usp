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
		
		<div class="text-center ver-mais" <?php if($wp_query->post_count < 10): ?> style="display:none;"<?php endif; ?>>
			<a href="javascript:void(0);" id="btn-ver-mais" class="btn btn-primary btn-laranja" data-offset="10">Ver Mais</a>
		</div>
	</div><!--  container  -->

<?php get_footer(); ?>
