function Form() {
    const form = document.getElementById('form');
    const DBData = document.getElementById('DBData');
    form.addEventListener('submit', formSend);

    async function formSend(e) {
        e.preventDefault();

        let error = formValidate(form);
        let formData = new FormData(form);

        if (error === 0) {
            let response = await fetch('formSend.php', {
                method: 'POST',
                body: formData,
            });
            if (response.ok) {
                let result = await response.json();

                alert(result.messageResult);
                form.reset();
                form.style.display = 'none';

                DBData.append(
                    (document.createElement(
                        'p'
                    ).textContent = `Имя: ${result.name}`),
                    document.createElement('br')
                );
                DBData.append(
                    (document.createElement(
                        'p'
                    ).textContent = `Email: ${result.email}`),
                    document.createElement('br')
                );
                DBData.append(
                    (document.createElement(
                        'p'
                    ).textContent = `Телефон: ${result.phone}`),
                    document.createElement('br')
                );
                DBData.append(
                    (document.createElement(
                        'p'
                    ).textContent = `Тема: ${result.theme}`),
                    document.createElement('br')
                );
                DBData.append(
                    (document.createElement(
                        'p'
                    ).textContent = `Сообщение: ${result.message}`)
                );

                DBData.style.display = 'block';
            } else {
                alert(
                    'Произошла ошибка при отправке заявки! Попробуйте снова!'
                );
            }
        } else {
            alert('Проверьте введённые поля!');
        }
    }

    function formValidate(form) {
        let error = 0;
        let formRequired = document.querySelectorAll('._required');
        for (let index = 0; index < formRequired.length; index++) {
            const input = formRequired[index];
            formRemoveError(input);
            if (input.value === '') {
                formAddError(input);
                error++;
            } else if (input.classList.contains('_phone')) {
                if (phoneTest(input)) {
                    formAddError(input);
                    error++;
                }
            } else if (input.classList.contains('_email')) {
                if (emailTest(input)) {
                    formAddError(input);
                    error++;
                }
            }
        }
        return error;
    }

    function formAddError(input) {
        input.parentElement.classList.add('_error');
        input.classList.add('_error');
    }

    function formRemoveError(input) {
        input.parentElement.classList.remove('_error');
        input.classList.remove('_error');
    }

    function phoneTest(input) {
        return !/^((8|\+7)[\- ]?)?(\(?\d{3,4}\)?[\- ]?)?[\d\- ]{5,10}$/.test(
            input.value
        );
    }

    function emailTest(input) {
        return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(
            input.value
        );
    }
}

function recaptchaCallback() {
    document.getElementById('submit_button').removeAttribute('disabled');
}
