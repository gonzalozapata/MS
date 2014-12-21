<?php get_header(); ?>

	<div class="row contenidos">
		<div class="col-md-8">
        <div class="breadcrumb">
		<?php if(function_exists('bcn_display'))
    	{
   		     bcn_display();
    	}?>
		</div>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <div class="imagendestacadasingle">
			<?php the_post_thumbnail('grande'); ?>
        </div>
        
		<header class="entry-header">
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink a %s', 'MS' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continúa leyendo <span class="meta-nav">&rarr;</span>', 'MS' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Páginas:', 'MS' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Editar', 'MS' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'Acerca de %s', 'MS' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'Ver todos los posts de %s <span class="meta-nav">&rarr;</span>', 'MS' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
                
	</article><!-- #post -->
				
			<?php /* FIN DE LOOP */ ?>

                
			<?php endwhile; ?>

			<?php posts_nav_link(); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No hay posts para mostrar', 'MS' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Listo para publicar tu primer post? <a href="%s">Hazlo aquí</a>.', 'MS' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No encontramos nada.', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Lo sentimos, pero no encontramos resultados. Quizás buscando puedas encontrar lo que necesitas.', 'MS' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>
  		</div>
        <div class="col-md-4">
            <?php
			if ( is_active_sidebar( 'sidebar-blog-1' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-blog-1' ); ?>
			<?php endif; ?>
        </div>
	</div>
  </div>

<?php get_footer(); ?>