<section class="question-form">
    <div class="container">
        <h3 class="row-title title-center"><?php echo $local_questions_form_title; ?></h3>
        <div class="row">
            <form method="post">
                <?php if(isset($success_msg)): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_msg; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if(isset($error_msg)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_msg; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName"><?php echo $local_questions_form_name; ?></label>
                        <input name="quest_name" type="text" class="form-control" id="inputName" placeholder="<?php echo $local_questions_form_name; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail">E-mail</label>
                        <input name="quest_email" type="email" class="form-control" id="inputEmail" placeholder="E-mail" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPhone">Телефон</label>
                        <input name="quest_phone" type="text" class="form-control question-phone" id="inputPhone" placeholder="Телефон" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCaptcha"><?php echo $local_questions_form_captcha; ?></label>
                        <input name="quest_captcha" type="number" class="form-control" id="inputCaptcha" placeholder="3 х 3 = ?" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputQuestion"><?php echo $local_questions_form_text; ?></label>
                    <textarea name="quest_text" class="form-control" id="inputQuestion" placeholder="<?php echo $local_questions_form_text; ?>" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><?php echo $local_questions_form_button; ?></button>
            </form>
        </div>
    </div>
</section>