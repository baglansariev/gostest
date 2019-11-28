<section class="login">
    <div class="container">
        <h3 class="row-title title-center">Вход в личный кабинет</h3>
        <div class="login-form row">
            <div class="login-form-container col-lg-5">
                <form method="post">
                    <?php if(isset($error_msg)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_msg; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input name="user_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input name="user_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" required>
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="gen-btn main-btn">Войти</button>
                        <a href="/register">Регистрация</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>