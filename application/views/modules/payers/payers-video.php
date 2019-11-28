<?php if(isset($payers_video)): ?>
    <section class="payers-video">
        <div class="container">
            <h3 class="row-title"><?php echo $local_payers_video_title; ?></h3>
            <div class="row">
                <?php foreach($payers_video as $payer_video): ?>
                    <div class="payer-video col-lg-6 col-md-6 col-sm-12">
                        <div>
                            <iframe src="<?php echo $payer_video['url']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
