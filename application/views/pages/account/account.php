<main class="account-page">
    <aside class="account-desktop-menu">
        <div class="user-info">
            <p class="user-name"><?php echo $user_name; ?></p>
            <p class="user-status"><?php echo $user_status; ?></p>
            <p class="user-money"><?php echo $user_balance; ?> т</p>
            <button type="button" class="main-btn gen-btn">Пополнить счет</button>
        </div>
        <?php if(isset($menu_list)): ?>
            <ul>
                <?php foreach($menu_list as $menu): ?>
                    <li>
                        <a <?php echo $menu['class']; ?> href="<?php echo $menu['link']; ?>"><?php echo $menu['text']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </aside>
    <div class="account-content">
        <div class="container">
            <?php echo $module; ?>
        </div>
    </div>
</main>