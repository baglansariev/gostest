<nav class="mobile-menu-cover">
    <ul class="mobile-menu">
        <?php if(isset($menu_list)): ?>
            <?php foreach($menu_list as $menu): ?>
                <li <?php echo $menu['class'] ?> >
                    <a href="<?php echo $menu['link'] ?>"><?php echo $menu['text'] ?></a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
        <span class="menu-close">
            <i class="fas fa-times"></i>
        </span>
    </ul>
</nav>