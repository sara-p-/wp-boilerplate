<?php 
	include( locate_template('./blocks/settings/global.php') );
	
	$orderby = get_sub_field('order_by');
	$order = get_sub_field('order');
	$posts_per_page = get_sub_field('posts_per_page');
	$post__in = '';

	if(get_sub_field('enable_custom') == 1) {
		$orderby = 'post__in';
		$posts_per_page = -1;
		$post__in = get_sub_field('custom_items');
	}

	$args = [
        'post_type'         => 'project',
        'posts_per_page'    => $posts_per_page,
        'order'             => $order,
        'orderby'           => $orderby,
        'post__in'          => $post__in,
        
    ];

    $query = new WP_Query( $args );
?>

<section id="<?php echo $block_id; ?>" class="block listing">
	<div class="component intro">
		<div class="wrapper">
			<div class="row">
				<div class="content">
					<?php include( locate_template('./blocks/components/title.php') ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="items">
			<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
				<div class="item">
					<div class="row">
						<div class="col">
							<div class="content">
								<h2 class="title"><?php the_title(); ?></h2>
								<?php $subtitle = get_field('subtitle'); ?>
								<?php if($subtitle) : ?>
									<h3 class="subtitle"><?php echo $subtitle; ?></h3>
								<?php endif; ?>
								<?php the_field('description'); ?>
								<?php $link = get_field('link'); ?>
								<?php if($link) : ?>
									<div class="buttons">
										<a class="btn" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?> <i aria-hidden="true" class="fas fa-external-link-alt"></i></a>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="col">
							<figure class="image">
								<?php
									$alt = get_post_meta ( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
								?>
								<img
									src="<?php echo get_the_post_thumbnail_url(); ?>"
									alt="<?php echo esc_html ( $alt ); ?>"
								/>
							</figure>
						</div>
					</div>
				</div>
			<?php endwhile; endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
