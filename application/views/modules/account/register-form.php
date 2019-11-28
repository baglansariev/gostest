<section class="register">
    <div class="container">
        <h3 class="row-title title-center">Регистрация нового пользователя</h3>
        <div class="register-form row">
            <div class="register-form-container col-lg-5">
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
                    <div class="form-group">
                        <label for="nameInput">Ф.И.О</label>
                        <input name="user_name" type="text" class="form-control" id="nameInput" placeholder="Ф.И.О" value="<?php if(isset($user_name)) echo $user_name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">E-mail</label>
                        <input name="user_email" type="email" class="form-control" id="emailInput" placeholder="E-mail" value="<?php if(isset($user_email)) echo $user_email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">Пароль</label>
                        <input name="user_password" type="password" class="form-control" id="passwordInput" placeholder="Пароль" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmInput">Подтверждение пароля</label>
                        <input name="user_confirm" type="password" class="form-control" id="confirmInput" placeholder="Подтверждение пароля" required>
                    </div>
                    <button type="submit" class="gen-btn main-btn">Регистрация</button>
                </form>
            </div>
        </div>
    </div>
</section>