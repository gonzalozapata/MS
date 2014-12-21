<?php
/*
Template Name: Portada
*/

get_header(); ?>

	<div class="row">
		<div class="col-md-12">
			<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" class="img-responsive" />
  		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2 class="textodeportada mayusculas text-center">Estrategias para despertar tus fortalezas y usarlas <strong>ahora</strong>.</h2>
  		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
            <?php
			if ( is_active_sidebar( 'sidebar-portada-1' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-portada-1' ); ?>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
            <?php
			if ( is_active_sidebar( 'sidebar-portada-2' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-portada-2' ); ?>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
           <?php
			if ( is_active_sidebar( 'sidebar-portada-3' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-portada-3' ); ?>
			<?php endif; ?>

		</div>
	</div>
  </div>

<?php get_footer(); ?>