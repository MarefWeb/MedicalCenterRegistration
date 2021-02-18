window.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#form');
    const errorMessage = document.querySelector('#error');
    const name = form.querySelector('#name');
    const surname = form.querySelector('#surname');
    const thirdName = form.querySelector('#thirdName');
    const gender = form.querySelector('#gender');
    const doctor = form.querySelector('#doctor');
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

    form.addEventListener('submit', (e) => {
        if (
            isEmpty(surname) ||
            isEmpty(name) ||
            isEmpty(thirdName) ||
            isGenderEmpty(gender) ||
            isDateEmpty(dateField) ||
            isPhoneEmpty(phoneField) ||
            isDoctorEmpty(doctor)
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

    function isDoctorEmpty(field) {
        if (field.value === 'Оберіть лікаря') {
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
        if (field.value.length < 17) {
            field.classList.add('empty');
            return true;
        } else {
            field.classList.remove('empty');
            return false;
        }
    }

    const swiper = new Swiper('.swiper-container', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
