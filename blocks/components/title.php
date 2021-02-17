<?php 
    $title_class = get_sub_field('title_class');
    $enable_title_animation = get_sub_field('enable_title_animation');
    $classes = '';
    if($title_class) {
        $classes .= ' ' . $title_class;
    }
    if($enable_title_animation) {
        $classes .= ' animate-title';
    }
?>

<?php if(have_rows('title')) : ?>
    <h1 class="title<?php echo $classes; ?>">
        <?php while(have_rows('title')) : the_row(); ?>
            <span class="line line-<?php echo get_row_index(); ?>"><?php the_sub_field('line'); ?></span>
        <?php endwhile; ?>
    </h1>
<?php endif;?>