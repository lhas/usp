<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/inc/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.0.0/animate.min.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/inc/css/liquid-slider.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/inc/css/font-awesome.min.css">

		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<?php wp_head(); ?>

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css">

	</head>

	<body <?php body_class(); ?>>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<a href="<?= home_url(); ?>"><img src="<?= bloginfo('template_url'); ?>/imgs/logo.png" class="logo" alt="Instituto de Psicologia da USP" /></a>
					</div>
					<div class="col-sm-7 busca-e-menu">	
						<nav>
							<div class="navbar-header hidden-md pull-right">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-search" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<i class="fa fa-search"></i> Busca
								</button>
							</div>

							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-home" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<i class="fa fa-bars"></i> Menu
								</button>
							</div>

							<div class="collapse navbar-collapse" id="menu-search">
								<?php get_search_form(); ?>
							</div>

							<?php 
								wp_nav_menu( array(
									'menu'              => 'primary',
									'theme_location'    => 'primary',
									'depth'             => 3,
									'container'         => 'div',
									'container_class'   => 'collapse navbar-collapse',
									'container_id'      => 'menu-home',
									'menu_class'        => 'nav navbar-nav',
									'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
									'walker'            => new wp_bootstrap_navwalker())
								);
							?>

						</nav>
					</div><!-- busca e menu -->
				</div><!-- row -->
			</div>
			<?php if(!is_front_page()){ ?>
			<div class="nav-segundo-nivel">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<?php if(is_page_template("page-biblioteca.php")){ ?>
								<img src="<?= bloginfo('template_url'); ?>/imgs/biblioteca-titulo.png" class="header-biblioteca" alt="Biblioteca Dante Moreira Leite">
							<?php } else if(get_query_var('tag')) { ?>
								<h1 class="busca">Tag: <span><?php echo single_tag_title(); ?></span></h1>
							<?php } else if(is_category()) { ?>
								<h1 class="busca">Categoria: <span><?php echo single_cat_title(); ?></span></h1>
							<?php } else if(is_search()) { ?>
								<h1 class="busca">Busca por <span><?php echo $_GET['s']; ?></span></h1>
							<?php } else { ?>
								<h1>IP Comunica</h1>								
							<?php } ?>
						</div>
						<div class="col-sm	-8">
							<?php if(is_page_template("page-biblioteca.php")){ ?>
								<nav>
									<?php 
										wp_nav_menu( array(
											'menu'              => 'biblioteca',
											'theme_location'    => 'biblioteca',
											'depth'             => 3,
											'container'         => 'div',
											'container_class'   => 'collapse navbar-collapse',
											'container_id'      => 'menu-home',
											'menu_class'        => 'nav navbar-nav',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
								</nav>
							<?php } elseif ( !( is_search() || is_category() || get_query_var('tag') ) ){ ?>
								<nav>
									<?php 
										wp_nav_menu( array(
											'menu'              => 'secondary',
											'theme_location'    => 'secondary',
											'depth'             => 3,
											'container'         => 'div',
											'container_class'   => 'collapse navbar-collapse',
											'container_id'      => 'menu-home',
											'menu_class'        => 'nav navbar-nav',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
								</nav>
							<?php } ?>
						</div>
					</div><!--	row	-->
				</div><!--	container	-->
			</div><!--	nav	-->
			<?php } ?>
		</header>
		<?php if ( !( is_search() || is_category() || get_query_var('tag') ) ){ ?>
			<?php if(is_front_page()){ ?>
				<div class="crop home">
					<?php 
						wp_reset_query();
						$args = array (
							'post_type'              => 'background_home_img',
							'posts_per_page'         => '1',
							'orderby'                => 'rand',
						);
						$the_query = new WP_Query( $args ); 
					?>
					<?php if ( $the_query->have_posts() ): ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<img class="img-fundo" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $the_ID ), 'large' )[0]; ?>" />
						<?php endwhile; // end of the loop. ?>
					<?php else: ?>
						<img class="img-fundo" src="<?php bloginfo('template_url'); ?>/imgs/bg-home.png" />
					<?php endif ?>					
				</div>
			<?php } else {?>
				<div class="crop">
					<img class="img-fundo clip" src="<?php echo set_custom_bg(); ?>" />			
				</div>
			<?php }?>
		<?php } ?>

			