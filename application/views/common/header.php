<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="header-contacts">
                <a href="tel:+77782386161">
                    <i class="fas fa-mobile-alt"></i>
                    <span>+7 778 238 6161</span>
                </a>
                <a href="tel:+77029375655">
                    <i class="fas fa-mobile-alt"></i>
                    <span>+7 702 937 5655</span>
                </a>
            </div>
            <div class="header-actions">
                <?php if(isset($languages)): ?>
                    <a href="#" class="language">
                        <i class="fas fa-globe-americas"></i>
                        <span>Русский</span>
                    </a>
                    <nav class="language-list">
                        <?php foreach($languages as $language): ?>
                            <a href="<?php echo $language['link']; ?>" class="lang <?php echo $language['class']; ?>"><?php echo $language['name']; ?></a>
                        <?php endforeach;?>
                    </nav>
                <?php endif; ?>
                <a href="/login" class="account">
                    <i class="fas fa-user-alt"></i>
                    <span><?php echo $local_sign_in; ?></span>
                </a>
            </div>
        </div>
    </div>
    <div class="header-mid">
        <div class="container">
            <a href="/" class="main-logo">
                <img src="/public/images/logo.png" alt="">
            </a>
            <a id="feedback" href="">
                <?php echo $local_feedback; ?>
            </a>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <?php echo $desktop_menu; ?>
            <a href="" class="mobile-menu-toggler">
                <i class="fas fa-bars"></i>
            </a>
            <?php echo $mobile_menu; ?>
        </div>
    </div>
    <?php echo $popup_form; ?>
</header>