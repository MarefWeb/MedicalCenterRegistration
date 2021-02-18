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
    const doctorField = document.querySelector('#doctor');

    document.addEventListener('click', (e) => {
        const target = e.target;

        if (target.classList.contains('editBtn')) {
            const tr = target.parentNode.parentNode;
            const idData = tr.querySelector('.id').innerText;
            const nameData = tr.querySelector('.name').innerText;
            const surnameData = tr.querySelector('.surname').innerText;
            const thirdNameData = tr.querySelector('.thirdName').innerText;
            const genderData = tr.querySelector('.gender').innerText;
            const bornDate = new Date(tr.querySelector('.born').innerText);
            const bornData = `${addZero(bornDate.getDate())}.${addZero(bornDate.getMonth())}.${bornDate.getFullYear()}`;
            const phoneData = tr.querySelector('.phone').innerText;
            const doctorData = tr.querySelector('.doctor').dataset.id;

            idField.value = idData;
            nameField.value = nameData;
            surnameField.value = surnameData;
            thirdNameField.value = thirdNameData;
            genderField.value = genderData;
            dateField.value = bornData;
            phoneField.value = phoneData;
            doctorField.value = doctorData;

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
            isPhoneEmpty(phoneField) ||
            isDoctorEmpty(doctorField)
        ) {
            e.preventDefault();
            errorMessage.classList.add('active');
        }
    });

    const doctorForm = document.querySelector('#doctor-form');
    const doctorSurname = document.querySelector('#doctor-surname');
    const doctorName = document.querySelector('#doctor-name');
    const doctorThirdName = document.querySelector('#doctor-thirdName');
    const doctorGender = document.querySelector('#doctor-gender');
    const doctorSpecialization = document.querySelector('#doctor-specialization');

    doctorForm.addEventListener('submit', (e) => {
        if (
            isEmpty(doctorSurname) ||
            isEmpty(doctorName) ||
            isEmpty(doctorThirdName) ||
            isGenderEmpty(doctorGender) ||
            isEmpty(doctorSpecialization)
        ) {
            e.preventDefault();
            errorMessage.classList.add('active');
        }
    });

    const sortForm = document.querySelector('#sort-form');
    const sortDoctor = document.querySelector('#sort-doctor');

    sortForm.addEventListener('submit', (e) => {
        if (sortDoctor.value === 'Оберіть лікаря') {
            e.preventDefault();
            sortDoctor.classList.add('empty');
        }
    });

    function addZero(el) {
        let str = el.toString();
        return str.length < 2 ? `0${str}` : str;
    }

    function isEmpty(field) {
        if (field.value === '') {
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
        if (field.value.length < 17) {
            field.classList.add('empty');
            return true;
        } else {
            field.classList.remove('empty');
            return false;
        }
    }
});
