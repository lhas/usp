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
		<div class="text-center ver-mais">
			<a href="http://143.107.57.235/site/?page_id=6895" class="post-link btn btn-primary btn-laranja" data-load=".conteudo-archive .resultados" data-offset="1" data-search="<?php echo get_search_query(); ?>">Ver Mais</a>
		</div>
	</div><!--  container  -->

<?php get_footer(); ?>
