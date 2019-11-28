<section class="main-slide">
    <?php if(isset($slide_data)): ?>
        <?php foreach($slide_data as $slide): ?>
            <div class="slide-image" style="background-image: url('<?php echo $slide['img'] ?>')">
                <div class="slide-text">
                    <h1 class="slide-title"><?php echo $slide['title'] ?></h1>
                    <p class="slide-subtitle">
                        <?php echo $slide['subtitle'] ?>
                    </p>
                    <div class="slide-buttons">
                        <?php if(isset($slide['links'])): ?>
                            <?php foreach($slide['links'] as $slide_link): ?>
                                <a href="<?php echo $slide_link['href'] ?>" class="gen-btn main-btn"><?php echo $slide_link['text'] ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>