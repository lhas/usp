<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-6 barra-superior">
				Instituto de Psicologia da USP	
			</div>
			<div class="col-md-6 barra-superior hidden-sm hidden-xs">
				Acesso rápido
			</div>
			<div class="col-md-3 barra-inferior ">
				<?php if ( is_active_sidebar( 'footer_01' ) ) : ?>
					<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer_01' ); ?>
					</div><!-- #primary-sidebar -->
				<?php endif; ?>
			</div>
			<div class="col-md-3 barra-inferior">
				<?php if ( is_active_sidebar( 'footer_02' ) ) : ?>
					<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer_02' ); ?>
					</div><!-- #primary-sidebar -->
				<?php endif; ?>
			</div>
			<div class="col-md-3 barra-inferior hidden-xs hidden-sm">
				<?php if ( is_active_sidebar( 'footer_03' ) ) : ?>
					<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer_03' ); ?>
					</div><!-- #primary-sidebar -->
				<?php endif; ?>
			</div>
			<div class="col-md-3 barra-inferior hidden-xs hidden-sm">
				<?php if ( is_active_sidebar( 'footer_04' ) ) : ?>
					<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer_04' ); ?>
					</div><!-- #primary-sidebar -->
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>


<script type="text/javascript" src="<?= bloginfo('template_url'); ?>/inc/js/jquery.min.js"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?= bloginfo('template_url'); ?>/inc/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= bloginfo('template_url'); ?>/inc/js/masonry.pkgd.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="<?= bloginfo('template_url'); ?>/inc/js/jquery.liquid-slider.js"></script>

<script type="text/javascript" src="<?= bloginfo('template_url'); ?>/js/functions.js"></script>
<script type="text/javascript" src="http://www.ccs.usp.br/uspbarra/barra2.js" charset="utf-8"></script>


<?php wp_footer(); ?>

</body>
</html>