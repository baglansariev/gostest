<?php if(isset($questions)): ?>
    <section class="questionnaire">
        <div class="container">
            <h3 class="row-title"><?php echo $local_questions_list_title; ?></h3>
            <div class="row">
                <div class="accordion">
                    <?php foreach($questions as $question): ?>
                        <div class="acc">
                            <div class="accordion-head">
                                <span class="acc-plus">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="acc-minus">
                                    <i class="fas fa-minus"></i>
                                </span>
                                <div class="accordion-head-text">
                                    <?php if(isset($question['question_date'])): ?>
                                        <div class="accordion-client-info">
                                            <span class="accordion-name"><?php echo $question['client_name']; ?></span>
                                            <span class="accordion-date"><?php echo $question['question_date']; ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <p class="accordion-title"><?php echo $question['client_text']; ?></p>
                                </div>
                            </div>
                            <div class="accordion-body">
                                <p class="accordion-text">
                                    <?php echo $question['answer']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if(isset($pages_viewport)): ?>
                <div class="pagination">
                    <ul class="pagination-list">
                        <?php echo $pages_viewport; ?>
                    </ul>
                </div>
            <?php endif ?>
        </div>
    </section>
<?php endif; ?>