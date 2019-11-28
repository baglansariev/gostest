<section class="owl-gallery">
    <div class="owl-carousel">
        <?php if(isset($images)): ?>
            <?php foreach($images as $image): ?>
                <div class="gallery-image" style="background-image: url('<?php echo $image['src'] ?>')" data-bg="<?php echo $image['src'] ?>"></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="gallery-image-cover">
        <div class="gallery-full-image">
            <span class="img-close">
                <i class="fas fa-times"></i>
            </span>
        </div>
    </div>
</section>