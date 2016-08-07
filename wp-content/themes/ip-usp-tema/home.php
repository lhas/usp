<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unite
 */

get_header(); ?>

	<div class="container conteudo conteudo-posts">
		<div class="destaque row" id="destaque-posts">
			<div class="col-md-offset-1 col-md-10">
				<?php get_template_part( 'content', 'posts-destaque' ); ?>
			</div>
		</div>
		<div class="outros">
			<?php if (in_array ('evento', array_keys($wp_query->query) ) ){ ?>
				<?php get_template_part( 'content', 'posts-eventos-outros' ); ?>
			<?php } else { ?>
				<?php get_template_part( 'content', 'posts-outros' ); ?>
			<?php } ?>
		</div>
	</div><!--  container  -->

<?php get_footer(); ?>