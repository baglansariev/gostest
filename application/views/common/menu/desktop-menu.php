<nav class="desktop-menu">
    <ul class="main-menu">
        <?php if(isset($menu_list)): ?>
            <?php foreach($menu_list as $menu): ?>
                <li>
                    <a href="<?php echo $menu['link'] ?>" <?php echo $menu['class'] ?> ><?php echo $menu['text'] ?></a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</nav>