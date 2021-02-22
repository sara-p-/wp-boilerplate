<?php 
    include( locate_template('./blocks/settings/global.php') ); 
?>
<section id="<?php echo $the_block_id; ?>" class="block basic-content">
	<div class="wrapper">
		<div class="row">
			<div class="content">
                <?php include( locate_template('./blocks/components/title.php') ); ?>
				<!-- <h2 class="subtitle">I've done several things</h2> -->
				<?php the_sub_field('content'); ?>
			</div>
		</div>
	</div>
</section>