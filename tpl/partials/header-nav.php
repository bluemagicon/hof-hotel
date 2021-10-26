<?php if($page_header['show_nav']) { ?>
    <div class="header-item header-item--nav nav uk-visible@m">
        <?php $homeActive = is_front_page() ? 'nav-home current_page_item' : 'nav-home'; ?>
        <div class="<?= $homeActive ?>">
            <a aria-label="zur Startseite" alt="zur Startseite" href="<?= home_url() ?>">
                <svg class="w-svg" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path></svg>
            </a>
        </div>
        <nav class="nav-list" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => '')); ?>
        </nav>
    </div>
<?php } ?>
