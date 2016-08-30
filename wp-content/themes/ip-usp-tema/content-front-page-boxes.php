<div class="row boxes">
	<div class="col-md-3 box box-1">
		<div class="header">
			<img src="<?php bloginfo('template_url'); ?>/imgs/home-icon-estude.png" alt="">
			<p>estude</p>
			<h1>
				PSICOLOGIA<br class="hidden-sm hidden-xs">
				NA USP
			</h1>
		</div>
		<div class="links hidden-sm hidden-xs">
		<?php
			$postType = get_post(7551);
		?>
			<ul class="list-unstyled">
				<?php
				$menusPost = get_field('links', $postType->ID);

				foreach($menusPost as $menu) :
				?>
				<li><a href="<?php echo $menu['link']; ?>"><?php echo $menu['titulo_do_link']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="col-md-3 box box-2">
		<div class="header">
			<img src="<?php bloginfo('template_url'); ?>/imgs/home-icon-servicos.png" alt="">
			<p>conheça</p>
			<h1>
				SERVIÇOS QUE<br class="hidden-sm hidden-xs">
				OFERECEMOS
			</h1>
		</div>
		<div class="links hidden-sm hidden-xs">
		<?php
			$postType = get_post(7554);
		?>
			<ul class="list-unstyled">
				<?php
				$menusPost = get_field('links', $postType->ID);

				foreach($menusPost as $menu) :
				?>
				<li><a href="<?php echo $menu['link']; ?>"><?php echo $menu['titulo_do_link']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="col-md-3 box box-3">
		<div class="header">
			<img src="<?php bloginfo('template_url'); ?>/imgs/home-icon-noticias.png" alt="">
			<p>informe-se</p>
			<h1>
				NOTÍCIAS E <br class="hidden-sm hidden-xs">
				EVENTOS
			</h1>
		</div>
		
		<div class="links hidden-sm hidden-xs">
		<?php
			$postType = get_post(7553);
		?>
			<ul class="list-unstyled">
				<?php
				$menusPost = get_field('links', $postType->ID);

				foreach($menusPost as $menu) :
				?>
				<li><a href="<?php echo $menu['link']; ?>"><?php echo $menu['titulo_do_link']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="col-md-3 box box-4">
		<div class="header">
			<img src="<?php bloginfo('template_url'); ?>/imgs/home-icon-sobre.png" alt="">
			<p>saiba mais</p>
			<h1>
				SOBRE O <br class="hidden-sm hidden-xs">
				INSTITUTO
			</h1>
		</div>
		
		<div class="links hidden-sm hidden-xs">
		<?php
			$postType = get_post(7552);
		?>
			<ul class="list-unstyled">
				<?php
				$menusPost = get_field('links', $postType->ID);

				foreach($menusPost as $menu) :
				?>
				<li><a href="<?php echo $menu['link']; ?>"><?php echo $menu['titulo_do_link']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>