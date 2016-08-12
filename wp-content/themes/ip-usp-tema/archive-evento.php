<?php
/**
 * The template for displaying Archive Results pages.
 *
 * @package unite
 */

get_header(); ?>
	
<div class="green-espacamento container conteudo conteudo-archive">

	<div class="destaque row" id="destaque-posts">
		<div class="col-md-offset-1 col-md-10">
			<?php require_once "carousel-eventos.php"; ?>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<hr class="green-linha-laranja">
		</div>
	</div>

	<div class="row">

		<div class="calendarios"></div>

	</div> <!-- .row -->

	<div class="row">
		

	</div> <!-- .row -->

</div>

<?php get_footer(); ?>