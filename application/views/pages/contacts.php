<?php echo $header; ?>
    <main>
        <?php echo $page_title; ?>
        <section class="contact-us">
            <div class="container">
                <h3 class="row-title title-center"><?php echo $local_city_shymkent; ?></h3>
                <p class="row-subtitle subtitle-to-top"><?php echo $local_city_shymkent_adress; ?></p>
                <div class="row">
                    <div class="employee col-lg-4 col-md-6 col-xs-12">
                        <div class="employee-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="employee-content">
                            <p class="employee-name">Айтмамбетов Еркин Мирамханович</p>
                            <p class="employee-status"><?php echo $local_director; ?></p>
                            <div class="employee-phone">
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>8 778 238 6161</span>
                                </p>
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>8 705 285 0505</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="employee col-lg-4 col-md-6 col-xs-12">
                        <div class="employee-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="employee-content">
                            <p class="employee-name">Төкенова Фарида Қалдыбайқызы</p>
                            <p class="employee-status"><?php echo $local_manager; ?></p>
                            <div class="employee-phone">
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>+7 702 937 56 55</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="employee col-lg-4 col-md-6 col-xs-12">
                        <div class="employee-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="employee-content">
                            <p class="employee-name">Бертай Асия Бақытқызы</p>
                            <p class="employee-status"><?php echo $local_manager; ?></p>
                            <div class="employee-phone">
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>8-775-764-58-88</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h3 class="row-title title-center"><?php echo $local_city_uralsk; ?></h3>
                <p class="row-subtitle subtitle-to-top"><?php echo $local_city_uralsk_adress; ?></p>
                <div class="row">
                    <div class="employee col-lg-4 col-md-6 col-xs-12">
                        <div class="employee-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="employee-content">
                            <p class="employee-name">Калиев Оралбек Кайырбекович</p>
                            <p class="employee-status"><?php echo $local_regional_manager; ?></p>
                            <div class="employee-phone">
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>8-702-616-64-90</span>
                                </p>
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>8-776-616-6490</span>
                                </p>
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>8-700-616-64-90</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="employee col-lg-4 col-md-6 col-xs-12">
                        <div class="employee-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="employee-content">
                            <p class="employee-name">Бексегуров Атапкел Жанболатович</p>
                            <p class="employee-status"><?php echo $local_manager; ?></p>
                            <div class="employee-phone">
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>8-777-565-31-57</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h3 class="row-title title-center"><?php echo $local_city_atyrau; ?></h3>
                <p class="row-subtitle subtitle-to-top"><?php echo $local_city_atyrau_adress; ?></p>
                <div class="row">
                    <div class="employee col-lg-4 col-md-6 col-xs-12">
                        <div class="employee-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="employee-content">
                            <p class="employee-name">Кабиев Шынарбек Мугалимович</p>
                            <p class="employee-status"><?php echo $local_regional_manager; ?></p>
                            <div class="employee-phone">
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>8-701-514-87-31</span>
                                </p>
                                <p class="phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>8-707-514-87-31</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-us">
            <div class="container">
                <div class="row">
                    <div class="feedback contact-us-feedback col-lg-6 col-md-12">
                        <h3 class="row-title"><?php echo $local_feedback_title; ?></h3>
                        <form method="post" class="contact-form">
                            <div class="client-data">
                                <input type="text" name="client_name" placeholder="<?php echo $local_feedback_name; ?>" required>
                                <input type="text" name="client_number" placeholder="Телефон" class="phone_mask" required>
                            </div>
                            <div class="client-data">
                                <input type="text" name="client_email" placeholder="E-mail" required>
                                <input type="text" name="client_captcha" placeholder="3 x 3 = ?" required>
                            </div>
                            <div class="client-data">
                                <textarea name="client_text" placeholder="<?php echo $local_feedback_message; ?>"></textarea>
                            </div>
                            <input id="contact_send" type="submit" value="<?php echo $local_feedback_button; ?>">
                        </form>
                    </div>
                    <div class="adress-map col-lg-6 col-md-12">
                        <h3 class="row-title"><?php echo $local_map_title; ?></h3>
                        <iframe src="https://yandex.ua/map-widget/v1/?um=constructor%3A9b3157cb562c61c92cacc7ba84539e46928514e2e9036a240526bc3439515d0a&amp;source=constructor" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php echo $footer; ?>