window.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#form');
    const errorMessage = document.querySelector('#error');
    const name = form.querySelector('#name');
    const surname = form.querySelector('#surname');
    const thirdName = form.querySelector('#thirdName');
    const gender = form.querySelector('#gender');
    const dateField = document.querySelector('#dateField');
    const phoneField = document.querySelector('#phoneField');
    const phoneMask = IMask(phoneField, {
        mask: '+{38}(000)000-00-00',
    });

    dateField.addEventListener('focus', () => {
        const dateMask = IMask(dateField, {
            mask: Date,
            lazy: false,
        });
    });

    function scrollTo(id) {
        const target = document.querySelector(`#${id}`);

        window.scroll({
            left: 0,
            top: target.offsetTop,
            behavior: 'smooth',
        });
    }

    const idField = document.querySelector('#id');
    const nameField = document.querySelector('#name');
    const surnameField = document.querySelector('#surname');
    const thirdNameField = document.querySelector('#thirdName');
    const genderField = document.querySelector('#gender');

    document.addEventListener('click', (e) => {
        const target = e.target;

        if (target.classList.contains('editBtn')) {
            const tr = target.parentNode.parentNode;
            const idData = tr.querySelector('.id').innerText;
            const nameData = tr.querySelector('.name').innerText;
            const surnameData = tr.querySelector('.surname').innerText;
            const thirdNameData = tr.querySelector('.thirdName').innerText;
            const genderData = tr.querySelector('.gender').innerText;
            const bornData = tr.querySelector('.born').innerText;
            const phoneData = tr.querySelector('.phone').innerText;

            idField.value = idData;
            nameField.value = nameData;
            surnameField.value = surnameData;
            thirdNameField.value = thirdNameData;
            genderField.value = genderData;
            dateField.value = bornData;
            phoneField.value = phoneData;

            form.classList.add('active');
            scrollTo(target.dataset.target);
        }
    });

    form.addEventListener('submit', (e) => {
        if (
            isEmpty(surname) ||
            isEmpty(name) ||
            isEmpty(thirdName) ||
            isGenderEmpty(gender) ||
            isDateEmpty(dateField) ||
            isPhoneEmpty(phoneField)
        ) {
            e.preventDefault();
            errorMessage.classList.add('active');
        }
    });

    function isEmpty(field) {
        if (field.value === '') {
            field.classList.add('empty');
            return true;
        } else {
            field.classList.remove('empty');
            return false;
        }
    }

    function isGenderEmpty(field) {
        if (field.value === 'Ваша стать') {
            field.classList.add('empty');
            return true;
        } else {
            field.classList.remove('empty');
            return false;
        }
    }

    function isDateEmpty(field) {
        const dateParts = field.value.split('.');
        let isCorrect = true;

        dateParts.forEach((el) => {
            if (!el.match(/^\d+$/)) isCorrect = false;
        });

        if (!isCorrect || field.value === '') {
            field.classList.add('empty');
            return true;
        } else {
            field.classList.remove('empty');
            return false;
        }
    }

    function isPhoneEmpty(field) {
        console.log(field.value.length);
        if (field.value.length < 17) {
            field.classList.add('empty');
            return true;
        } else {
            field.classList.remove('empty');
            return false;
        }
    }
});
