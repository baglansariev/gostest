<section class="inner-section">
    <div class="container">
        <?php if(isset($featureboxes)): ?>
            <h3 class="row-title title-center"><?php echo $local_featurebox_row_title; ?></h3>
            <div class="row">
                <?php foreach($featureboxes as $featurebox): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="feature-box">
                            <div class="box-image">
                                <?php if($featurebox['icon']): ?>
                                    <span class="feature-box-icon">
                                        <i class="<?php echo $featurebox['icon']; ?>"></i>
                                    </span>
                                <?php else: ?>
                                    <img src="<?php echo $featurebox['image']; ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="box-content">
                                <div class="box-title">
                                    <?php echo $featurebox['title']; ?>
                                </div>
                                <div class="box-text">
                                    <?php echo $featurebox['text']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
