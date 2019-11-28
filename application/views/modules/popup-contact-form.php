<div class="contact-form-cover">
    <form method="post">
        <div class="client-data">
            <input type="text" name="client_name" placeholder="Ф.И.О." required>
            <input type="text" name="client_number" placeholder="Телефон" class="phone_mask" required>
        </div>
        <div class="client-data">
            <input type="text" name="client_email" placeholder="E-mail" required>
            <input type="text" name="client_modal_captcha" placeholder="3 x 3 = ?" required>
        </div>
        <div class="client-data">
            <textarea name="client_text" placeholder="Сообщение"></textarea>
        </div>
        <input id="popup_send" type="submit" value="Отправить">
        <span class="form-close">
            <i class="fas fa-times"></i>
        </span>
    </form>
</div>