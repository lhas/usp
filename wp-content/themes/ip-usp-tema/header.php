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

							<div id="menu-home" class="collapse navbar-collapse">
							
							<ul id="menu-primario" class="nav navbar-nav">
							
							<li id="menu-item-122" class="mega-dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-122 dropdown">
							
								<a aria-expanded="true" title="Ensino e Pesquisa" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">teste e Pesquisa</a>
								<ul role="menu" class="dropdown-menu mega-dropdown-menu row mega-dropdown-menu-0">
									<li class="col-sm-3">
										<ul>
											<li role="presentation" class="dropdown-header">Convênio e intercâmbio		</li><li role="presentation" class="divider"></li>
											<li id="menu-item-5678" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5678"><a title="Cooperação Internacional" href="#">Cooperação Internacional</a></li>
											<li id="menu-item-5679" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5679"><a title="Editais Abertos" href="#">Editais Abertos</a></li>
											<li id="menu-item-5680" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5680"><a title="Exchange Students" href="#">Exchange Students</a></li>
											<li id="menu-item-5681" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5681"><a title="Contato" href="#">Contato</a></li>
										</ul>
									</li>
									<li class="col-sm-3">
										<ul>
											<li role="presentation" class="dropdown-header">Convênio e intercâmbio		</li><li role="presentation" class="divider"></li>
											<li id="menu-item-5678" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5678"><a title="Cooperação Internacional" href="#">Cooperação Internacional</a></li>
											<li id="menu-item-5679" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5679"><a title="Editais Abertos" href="#">Editais Abertos</a></li>
											<li id="menu-item-5680" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5680"><a title="Exchange Students" href="#">Exchange Students</a></li>
											<li id="menu-item-5681" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5681"><a title="Contato" href="#">Contato</a></li>
										</ul>
									</li>
								</ul>
							</li>
<li id="menu-item-127" class="mega-dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-127 dropdown"><a title="Serviços" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Serviços</a>
<ul role="menu" class="dropdown-menu mega-dropdown-menu row">
	<li class="col-sm-4">
	<ul>
		<li role="presentation" class="dropdown-header">Atendimento Clínico		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-5682" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5682"><a title="Como ser atendido" href="#">Como ser atendido</a></li>
		<li id="menu-item-5683" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5683"><a title="Clínica Psicológica Durval Marcondes" href="#">Clínica Psicológica Durval Marcondes</a></li>
		<li id="menu-item-5684" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5684"><a title="Serviço de Aconselhamento Psicológico" href="#">Serviço de Aconselhamento Psicológico</a></li>
	</ul>
</li>
	<li class="col-sm-4">
	<ul>
		<li role="presentation" class="dropdown-header">Serviços à comunidade		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-5685" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5685"><a title="Orientação Profissional" href="#">Orientação Profissional</a></li>
		<li id="menu-item-5686" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5686"><a title="Outros Serviços" href="#">Outros Serviços</a></li>
		<li id="menu-item-5687" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5687"><a title="Fale Conosco" href="#">Fale Conosco</a></li>
	</ul>
</li>
	<li class="col-sm-4">
	<ul>
		<li role="presentation" class="dropdown-header">Biblioteca		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-5688" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5688"><a title="A Biblioteca" href="http://localhost/green/usp/biblioteca/">A Biblioteca</a></li>
		<li id="menu-item-5689" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5689"><a title="Serviços e Produtos" href="#">Serviços e Produtos</a></li>
		<li id="menu-item-5690" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5690"><a title="Fontes de Informação" href="#">Fontes de Informação</a></li>
		<li id="menu-item-5691" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5691"><a title="Capacitação" href="#">Capacitação</a></li>
	</ul>
</li>
</ul>
</li>
<li id="menu-item-131" class="mega-dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-131 dropdown"><a title="IP Comunica" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">IP Comunica</a>
<ul role="menu" class="dropdown-menu mega-dropdown-menu row">
	<li class="col-sm-3">
	<ul>
		<li role="presentation" class="dropdown-header">Eventos		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-6857" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6857"><a title="Eventos" href="?evento">Eventos</a></li>
		<li id="menu-item-6860" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-6860"><a title="OldDefesas" href="http://localhost/green/usp/category/oldnoticias/olddefesas/">OldDefesas</a></li>
		<li id="menu-item-6863" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6863"><a title="Organização" href="#">Organização</a></li>
	</ul>
</li>
	<li class="col-sm-3">
	<ul>
		<li role="presentation" class="dropdown-header">Notícias		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-6873" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6873"><a title="IP Comunica" href="http://localhost/green/usp/ip-comunica/">IP Comunica</a></li>
		<li id="menu-item-133" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-133"><a title="Notícias" href="?noticia">Notícias</a></li>
		<li id="menu-item-6864" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-6864"><a title="IP na Mídia" href="http://localhost/green/usp/category/oldnoticias/oldna-midia/">IP na Mídia</a></li>
		<li id="menu-item-6865" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-6865"><a title="OldPremiações" href="http://localhost/green/usp/category/comunidade-ipusp/oldpremiacoes/">OldPremiações</a></li>
	</ul>
</li>
	<li class="col-sm-3">
	<ul>
		<li role="presentation" class="dropdown-header">Publicações		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-6866" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-6866"><a title="Revistas" href="http://localhost/green/usp/category/publicacoes/revistas/">Revistas</a></li>
		<li id="menu-item-6867" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6867"><a title="Produção científica" href="#">Produção científica</a></li>
	</ul>
</li>
	<li class="col-sm-3">
	<ul>
		<li role="presentation" class="dropdown-header">Concursos e Licitações		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-6870" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6870"><a title="Concursos" href="#">Concursos</a></li>
		<li id="menu-item-6871" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6871"><a title="Estágios" href="#">Estágios</a></li>
		<li id="menu-item-6872" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6872"><a title="Monitoria" href="#">Monitoria</a></li>
	</ul>
</li>
</ul>
</li>
<li id="menu-item-136" class="mega-dropdown menu-item menu-item-type- menu-item-object- menu-item-has-children menu-item-136 dropdown"><a title="Institucional" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Institucional</a>
<ul role="menu" class="dropdown-menu mega-dropdown-menu row">
	<li class="col-sm-3">
	<ul>
		<li role="presentation" class="divider"></li>
		<li id="menu-item-142" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-142"><a title="Apresentação" href="#">Apresentação</a></li>
		<li id="menu-item-145" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-145"><a title="Diretoria" href="#">Diretoria</a></li>
		<li id="menu-item-146" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-146"><a title="Departamentos" href="#departamento">Departamentos</a></li>
		<li id="menu-item-147" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-147"><a title="Estrutura administrativa" href="#">Estrutura administrativa</a></li>
	</ul>
</li>
	<li class="col-sm-3">
	<ul>
		<li role="presentation" class="dropdown-header">Pessoas		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-150" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-150"><a title="Docentes" href="#">Docentes</a></li>
		<li id="menu-item-151" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-151"><a title="Funcionários" href="#">Funcionários</a></li>
		<li id="menu-item-152" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-152"><a title="Alunos" href="#">Alunos</a></li>
		<li id="menu-item-153" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-153"><a title="Colaboram conosco" href="#">Colaboram conosco</a></li>
	</ul>
</li>
	<li class="col-sm-3">
	<ul>
		<li role="presentation" class="dropdown-header">Memória IP		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-156" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-156"><a title="Centro de Memória" href="#">Centro de Memória</a></li>
		<li id="menu-item-157" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-157"><a title="Imagens e Vídeos" href="#">Imagens e Vídeos</a></li>
		<li id="menu-item-158" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-158"><a title="Memória USP" href="#">Memória USP</a></li>
	</ul>
</li>
	<li class="col-sm-3">
	<ul>
		<li role="presentation" class="dropdown-header">Links internos		</li><li role="presentation" class="divider"></li>
		<li id="menu-item-163" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-163"><a title="Lista telefônica" href="#">Lista telefônica</a></li>
		<li id="menu-item-6882" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-6882"><a title="OldNa Mídia" href="http://localhost/green/usp/category/oldnoticias/oldna-midia/">OldNa Mídia</a></li>
		<li id="menu-item-164" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-164"><a title="Comitê de Ética" href="#">Comitê de Ética</a></li>
		<li id="menu-item-165" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-165"><a title="Intranet" href="#">Intranet</a></li>
		<li id="menu-item-166" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-166"><a title="Webmail" href="#">Webmail</a></li>
		<li id="menu-item-167" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-167"><a title="Sistema USP" href="#">Sistema USP</a></li>
	</ul>
</li>
</ul>
</li>
</ul></div>

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

			