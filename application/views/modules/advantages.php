<?php if(isset($advantages)): ?>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <?php foreach($advantages as $advantage): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="advantage">
                            <p class="advantage-count"><?php echo $advantage['text']; ?></p>
                            <p class="advantage-title"><?php echo $advantage['title']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
