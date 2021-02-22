<?php 
    include( locate_template('./blocks/settings/global.php') ); 
    $style = get_sub_field('style');
?>

<section id="<?php echo $the_block_id; ?>" class="block hero<?php echo ' ' . $style; ?>">
	<div class="wrapper">
		<div class="row">
            <?php include( locate_template('./blocks/components/title.php') ); ?>
			<div class="content">
                <?php the_sub_field('content'); ?>
                <?php if($style == 'style-1'): ?>
				<div class="buttons">
					<a href="#work" class="down"
					><span class="visually-hidden">Scroll Down</span
					><i class="fas fa-chevron-down" aria-hidden="true"></i
				></a>
                </div>
                <?php endif; ?>
			</div>
		</div>
	</div>
</section>