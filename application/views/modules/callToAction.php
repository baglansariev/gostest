<?php if(isset($action_data)): ?>
    <section class="call-to-action">
        <div class="container">
            <?php foreach($action_data as $action_info): ?>
                <h1 class="action-title"><?php echo $action_info['title'] ?></h1>
                <p class="action-subtitle">
                    <?php echo $action_info['subtitle'] ?>
                </p>
                <button class="action-button" type="button"><?php echo $action_info['button_text'] ?></button>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>