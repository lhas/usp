<?php
/**
 * The template for displaying search forms in Unite
 *
 * @package unite
 */
?>
<form id="search" role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
	<label class="sr-only"><?php _e('Busca no site IP USP:', 'unite'); ?></label>
	<div class="input-group">
		<input type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field form-control input-sm" placeholder="Busca no site IP USP">
		<span class="input-group-btn">
			<button type="submit" class="search-submit btn btn-primary input-sm"><span class="glyphicon glyphicon-search"></span></button>
		</span>
	</div>
	<div class="btn-group acessibilidade-fonte hidden-xs hidden-sm">
		<button type="button" class="btn btn-default btn-sm" aria-label="Diminuir Fonte" id="font-sub">A-</button> 
		<button type="button" class="btn btn-default btn-sm" aria-label="Aumentar Fonte" id="font-add">A+</button>
	</div>
</form>