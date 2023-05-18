<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>TEST_TASK</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <form action="#" id="form" autocomplete="off">
            <div class="form_item">
                <label for="name_input" class="form_label">Ваше имя:</label>
                <input
                    type="text"
                    name="name"
                    class="form_input _required"
                    id="name_input"
                    autocomplete="off"
                />
            </div>
            <div class="form_item">
                <label for="email_input" class="form_label">Ваш Email:</label>
                <input
                    type="text"
                    name="email"
                    class="form_input _required _email"
                    id="email_input"
                    autocomplete="off"
                />
            </div>
            <div class="form_item">
                <label for="phone_input" class="form_label">Ваш телефон:</label>
                <input
                    type="number"
                    name="phone"
                    class="form_input _required _phone"
                    id="phone_input"
                    autocomplete="off"
                />
            </div>
            <div class="form_item">
                <label for="theme_input" class="form_label">Тема:</label>
                <select
                    name="theme"
                    class="form_input _required"
                    id="theme_input"
                    placeholder="Выберите тему"
                >
                    <option value="Техподдержка" selected="selected">
                        Техподдержка
                    </option>
                    <option value="Продажи">Продажи</option>
                    <option value="Другое">Другое</option>
                </select>
            </div>
            <div class="form_item">
                <label for="message_input" class="form_label"
                    >Ваше сообщение:</label
                >
                <textarea
                    name="message"
                    class="form_input _required"
                    id="message_input"
                    cols="30"
                    rows="5"
                ></textarea>
            </div>
            <div class="form_item">
                <label class="form_label"></label>
                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                <div class="text-danger" id="recaptchaError"></div>
            </div>
            <div class="form_item">
                <label class="form_label"></label>
                <button id="submit_button" class="form_button" type="submit" onclick="Form()" disabled>
                    Отправить письмо!
                </button>
            </div>
        </form>
        <div id="DBData">
        </div>
        <script src="form.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </body>
</html>
