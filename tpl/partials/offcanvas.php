<nav role="navigation" class="offcanvas" aria-hidden="false">
    <div class="offcanvas-item offcanvas-item--primary">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => '', 'container' => '')); ?>
    </div>

    <?php if(has_nav_menu('footer')) { ?>
        <div class="offcanvas-item offcanvas-item--legal">
            <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'fallback_cb' => false)); ?>
        </div>
    <?php } ?>
</nav>
