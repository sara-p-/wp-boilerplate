<?php if(get_sub_field('enable_buttons') == 1) : ?>
    <?php if ( have_rows( 'buttons' ) ) : ?>
        <div class="buttons">    
            <?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
                <?php $link = get_sub_field( 'link' ); ?>
                <?php if ( $link ) : ?>
                    <a class="btn" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>