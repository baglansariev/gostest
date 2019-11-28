<section class="article-view">
    <div class="container">
        <div class="row">
            <?php if(isset($article)): ?>
                <?php foreach($article as $item): ?>
                    <div class="article-view-container col-lg-12">
                        <div class="article-view-image">
                            <img src="<?php echo $item['main_img'] ?>" alt="">
                        </div>
                        <div class="article-view-content">
                            <p class="article-view-title">
                                <?php echo $item['title'] ?>
                            </p>
                            <p class="article-view-date">
                                <?php echo $item['date_insert'] ?>
                            </p>
                            <p class="article-view-text">
                                <?php echo $item['full_desc'] ?>
                            </p>
                            <?php if(isset($item['news_images'])): ?>
                                <?php echo $item['news_images'] ?>
                            <?php endif; ?>
                            <?php if(isset($item['news_videos'])): ?>
                                <?php foreach($item['news_videos'] as $video): ?>
                                    <div class="article-video">
                                        <iframe src="<?php echo $video['url'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>