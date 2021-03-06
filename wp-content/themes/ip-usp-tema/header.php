<?php
  $menus = array();

  $args = array(
    'post_type' => 'menus',
    'p' => 7172
  );
  // Busca os dados do menu principal
  $queryMenus = new WP_Query($args);

  // Iteração do menu
  while ( $queryMenus->have_posts() ) : $queryMenus->the_post();

    // Iteração dos componentes
    while ( have_rows('componentes') ) : the_row();

      // Inicializa o menu atual
      $menu = array(
        'titulo' => get_sub_field('titulo'),
        'colunas' => array()
      );

      // Iteração das colunas
      while ( have_rows('colunas') ) : the_row();
        // Inicializa a coluna atual
        $coluna = array(
          'titulo' => get_sub_field('titulo'),
          'link_coluna' => get_sub_field('link_coluna'),
          'links' => array()
        );

        // Iteração dos links
        while ( have_rows('sub-itens') ) : the_row();
          $link = array(
            'titulo' => get_sub_field('titulo'),
            'url' => get_sub_field('url'),
            'abrir_em_nova_janela' => get_sub_field('abrir_em_nova_janela'),
          );

          // Relaciona link a coluna
          $coluna['links'][] = $link;
        endwhile; // Fim Links

        // Relaciona coluna a menu
        $menu['colunas'][] = $coluna;

      endwhile; // Fim Colunas

      // Calcula tamanho do menu
      $tamanhoPadrao = 12;
      $totalColunas = sizeof($menu['colunas']);
      $tamanho = $tamanhoPadrao / $totalColunas;

      $menu['tamanho'] = $tamanho;

      // Adiciona o componente ao menu final
      $menus[] = $menu;
      
    endwhile; // Fim Componentes

  endwhile; // Fim Menu

  wp_reset_postdata();

?>

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

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">

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
                
                <?php foreach($menus as $menu) : ?>

                  <li class="mega-dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown">
                  
                    <a aria-expanded="true" title="<?php echo $menu['titulo']; ?>" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">
                    <?php echo $menu['titulo']; ?></a>
                    
                    <ul role="menu" class="dropdown-menu row">
                          
                          <?php foreach($menu['colunas'] as $coluna) : ?>
                          <li class="col-sm-<?php echo $menu['tamanho']; ?>">
                            <ul>

                              <?php if(!empty($coluna['link_coluna'])) : ?>
                              <li role="presentation" class="dropdown-header"> <a href="<?php echo $coluna['link_coluna']; ?>" style="font-weight: 300 !important;"><?php echo $coluna['titulo']; ?></a> </li>
                              <?php else: ?>
                              <li role="presentation" class="dropdown-header"> <?php echo $coluna['titulo']; ?> </li>
                              <?php endif; ?>

                              <li role="presentation" class="divider"></li>
                              
                              <?php foreach($coluna['links'] as $link) : ?>
                                <li class="menu-item"><a title="<?php echo $link['titulo']; ?>" href="<?php echo $link['url']; ?>" <?php if($link['abrir_em_nova_janela']) : ?>target="_blank"<?php endif; ?>><?php echo $link['titulo']; ?></a></li>
                              <?php endforeach; ?>

                            </ul>
                          </li>
                          <?php endforeach; ?>

                    </ul>

                  </li>
                  <?php endforeach; ?>

                </ul>

              </div> <!-- #menu-home -->

            </nav>
          </div><!-- busca e menu -->
        </div><!-- row -->
      </div>
      <?php if(is_search()) : ?>
      <div class="nav-segundo-nivel" style="padding: 40px 0 0;">
        <div class="container">
          <div class="row">

            <div class="col-sm-12">
            <h1 style="text-transform: inherit !important; font-size: 2.1em; margin-bottom: 20px;">Busca por <span style="color: rgba(255, 255, 255, 0.5); font-weight: 600;"><?php echo get_search_query(); ?></span></h1>
            </div>

            </div>
        </div>
        </div>
      <?php endif; ?>
      <?php if(!is_front_page() && !is_search()){ ?>
      <div class="nav-segundo-nivel">
        <div class="container">

        <?php
        $postTypeAtual = get_post_type();
        $postTypesExistentes = get_post_types();
        $menus = get_posts(array(
          'post_type' => 'menus',
          'posts_per_page' => 9999
        ));
        $menuParaPostType = false;
        $menuParaPaginaAtual = get_field_object('menu');

        if(!empty($menuParaPaginaAtual)) {
          $menuParaPostType = $menuParaPaginaAtual['value'];
        }
        
        foreach($menus as $menu) {
          $tiposDePostPermitidosPeloMenu = get_field('tipos_de_post', $menu->ID);

          if(!empty($tiposDePostPermitidosPeloMenu)) {
            if(in_array($postTypeAtual, $tiposDePostPermitidosPeloMenu) && $menuParaPostType == false) {
              $menuParaPostType = $menu;
            }
          }
        } // end foreach $menu

        if(!empty($menuParaPostType)) :

        ?>
          <div class="row">

            <div class="col-sm-4">
              <?php
                $titulo = (get_field('imagem', $menuParaPostType->ID)) ? '<img src="' . get_field('imagem', $menuParaPostType->ID) . '" />' : $menuParaPostType->post_title;
              ?>
              <h1><?php echo $titulo; ?></h1>
            </div> <!-- .col-sm-4 -->

            <div class="col-sm-8">

              <nav>
              
                <ul id="menu-biblioteca" class="nav navbar-nav">
                  <?php
                  // Recuperar menu relacionado

                    while(have_rows('submenu', $menuParaPostType->ID)) : the_row(); ?>
                    <li>
                      <div class="dropdown">

                      <?php
                      
                      $subitens = get_sub_field('sub-itens');
                      ?>
                        <?php if(empty($subitens)) : ?>
                        <a href="<?php echo get_sub_field('link'); ?>" <?php if(get_sub_field('abrir_em_nova_janela')) : ?>target="_blank"<?php endif; ?>><?php echo get_sub_field('titulo'); ?></a>
                        <?php else : ?>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><?php echo get_sub_field('titulo'); ?> <span class="caret"></span></a>
                        
                        <ul class="dropdown-menu">
                          <?php foreach($subitens as $subitem) : ?>
                          <li><a href="<?php echo $subitem['link']; ?>" <?php if($subitem['abrir_em_nova_janela']) : ?>target="_blank"<?php endif; ?>><?php echo $subitem['titulo']; ?></a></li>
                          <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                      </div>
                    </li>
                    <?php endwhile; ?>
                </ul> <!-- #menu-biblioteca -->

              </nav>

            </div> <!-- .col-sm-8 -->

          </div> <!-- .row -->
          <?php else: ?>

          <div class="row">

            <!-- Título -->
            <div class="col-sm-4">
              <?php if(is_page_template("page-biblioteca.php")){ ?>

                <img src="<?= bloginfo('template_url'); ?>/imgs/biblioteca-titulo.png" class="header-biblioteca" alt="Biblioteca Dante Moreira Leite">

              <?php } else if(get_query_var('tag')) { ?>
                <h1 class="busca">Tag: <span><?php echo single_tag_title(); ?></span></h1>
              <?php } else if(is_category()) { ?>
                <h1 class="busca">Categoria: <span><?php echo single_cat_title(); ?></span></h1>
              <?php } else if(is_search()) { ?>
                <h1 class="busca">Busca por <span><?php echo $_GET['s']; ?></span></h1>
              <?php } else if(is_page_template("page-faq-biblioteca.php")){ ?>
                <h1>FAQ da Biblioteca</h1>
              <?php } else if(is_post_type_archive('evento')) { ?>
                <h1>Eventos</h1>	
              <?php } else { ?>
                <h1>
                  <?php 
                    // Recuperar menu relacionado
                    $menuRelacionado = get_field_object('menu');

                    if(!empty($menuRelacionado['value']->ID)) :
                      echo $menuRelacionado['value']->post_title;
                    else:
                      echo post_type_archive_title( '', false );
                    endif;
                  ?>
                </h1>
              <?php } ?>
            </div>
            
            <!-- Navegação -->
            <div class="col-sm-8">

            <nav>

                <ul id="menu-biblioteca" class="nav navbar-nav">
                  <?php
                  // Recuperar menu relacionado
                  $menuRelacionado = get_field_object('menu');

                  if(!empty($menuRelacionado['value']->ID)) :
                    $subMenus = get_field('submenu', $menuRelacionado['value']->ID);

                    foreach($subMenus as $menu) : ?>
                    <li>
                      <a href="<?php echo $menu['link']; ?>"><?php echo $menu['titulo']; ?></a>
                    </li>
                    <?php

                    endforeach;

                  endif;
                  ?>
                </ul> <!-- #menu-biblioteca -->
              

              </nav>

            </div>
          </div><!--	row	-->
          
          <?php endif; ?>
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

        <!-- Se for a página de IP Comunica -->
        <?php if(is_page(178)) : ?>

          <?php 
            wp_reset_query();
            $args = array (
              'post_type'              => array('noticia'),
              'posts_per_page'         => '3',
              'order'                  => 'DESC',
              'orderby'                => 'date',
              'category__not_in'  	 => '-255,-24',
            );
            $the_query = new WP_Query( $args ); 
          ?>

          <div class="crop" id="crop-crop">

          <svg width="0" height="0">
  <clipPath id="clipPolygon">
    <polygon points="40 385,893 217,702 113,16 -33">
    </polygon>
  </clipPath>
</svg>

            <div class="liquid-slider" id="crop-slider">

              <!-- Iterar todos os posts em destaque dele -->
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <div>
                  <img class="img-fundo clip" src="<?php echo set_custom_bg($post->ID); ?>" />	
                </div>

              <?php endwhile; ?>

            </div> <!-- #crop-slider -->
      
          </div> <!-- #crop-crop -->

        <?php endif; ?>
        <!-- Fim IP Comunica -->

        <!-- Se for a página de Biblioteca -->
        <?php if(is_page(112)) : ?>

          <?php 
            wp_reset_query();
            $args = array (
              'post_type'              => array('biblioteca'),
              'posts_per_page'         => '3',
              'order'                  => 'DESC',
              'orderby'                => 'date',
            );
            $the_query = new WP_Query( $args ); 
          ?>

          <div class="crop" id="crop-crop">

          <svg width="0" height="0">
  <clipPath id="clipPolygon">
    <polygon points="40 385,893 217,702 113,16 -33">
    </polygon>
  </clipPath>
</svg>

            <div class="liquid-slider" id="crop-slider">

              <!-- Iterar todos os posts em destaque dele -->
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <div>
                  <img class="img-fundo clip" src="<?php echo set_custom_bg($post->ID); ?>" />	
                </div>

              <?php endwhile; ?>

            </div> <!-- #crop-slider -->
      
          </div> <!-- #crop-crop -->

        <?php endif; ?>
        <!-- Fim Biblioteca -->

        <!-- Se for Outras Páginas -->
        <?php if(!is_page(112) && !is_page(178) ) : ?>
          <div class="crop">

          <svg width="0" height="0">
  <clipPath id="clipPolygon">
    <polygon points="40 385,893 217,702 113,16 -33">
    </polygon>
  </clipPath>
</svg>

            <div class="liquid-slider" id="crop-slider">

                <div>
                  <img class="img-fundo clip" src="<?php echo set_custom_bg(); ?>" />	
                </div>

            </div> <!-- #crop-slider -->
      
          </div> <!-- #crop-crop -->
        <?php endif; ?>
        <!-- Fim Outras Páginas -->

      <?php }?>
    <?php } ?>

      