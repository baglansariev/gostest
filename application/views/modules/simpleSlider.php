<section class="simple-slider">
    <div class="slider-viewport">
        <?php foreach($slider_data as $slider): ?>
            <div class="slider-image" style="background-image: url('<?php echo $slider['img_url'] ?>')" data-text="<?php echo $slider['text'] ?>"></div>
        <?php endforeach ?>
    </div>
    <div class="slider-control">
        <div class="slider-buttons">
            <button type="button" id="slide-left">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button type="button" id="slide-right">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div class="slider-text">
            <h1 class="slider-title"></h1>
        </div>
    </div>
</section>