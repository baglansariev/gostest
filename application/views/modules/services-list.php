<?php if(isset($services)): ?>
    <section class="outer-section">
        <div class="container">
            <div class="row">
                <?php foreach($services as $service): ?>
                    <div class="col-md-4">
                        <div class="service">
                            <a href="<?php echo $service['link']; ?>" class="service-link" style="background-image: url('<?php echo $service['img']; ?>')">
                                <span><?php echo $service['title']; ?></span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>