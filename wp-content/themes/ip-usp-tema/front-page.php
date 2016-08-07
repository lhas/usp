<?php 
/**
 * @package unite
 * Template Name: Front Page
 */
	
get_header(); ?>


	<div class="container conteudo conteudo-home">
		<?php get_template_part( 'content', 'front-page-boxes' ); ?>
		<div class="row headlines">
			<div class="col-md-6 noticias" id="noticias">
				<?php get_template_part( 'content', 'front-page-posts' ); ?>
			</div>
			<div class="col-md-6 eventos" id="eventos">
				<?php get_template_part( 'content', 'front-page-eventos' ); ?>
			</div>
		</div>
	</div><!--  container  -->

<?php get_footer(); ?>

