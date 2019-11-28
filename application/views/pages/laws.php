<?php echo $header; ?>
<section class="outer-section">
    <div class="container">
        <h3 class="row-title">
            <?php echo $laws_title; ?>
        </h3>
        <div class="row">
            <div class="col-lg-12">
                <?php if(isset($laws)): ?>
                    <ul class="laws-list">
                        <?php foreach ($laws as $law): ?>
                            <li>
                                <a href="/laws/<?php echo $law['href']; ?>"><?php echo $law['text']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php echo $footer; ?>
