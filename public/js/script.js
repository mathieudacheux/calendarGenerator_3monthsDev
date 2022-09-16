/************************ ************************/
/******************* VARIABLES *******************/
/************************ ************************/

const form = document.querySelector('form');
const selectMonth = document.querySelector('#month');
const selectOptionsArray = document.querySelectorAll('#month option');
let allTD = document.querySelector('td');
const birthdayCase = document.querySelectorAll('.birthday');


const selectYear = document.querySelector('#year');
const buttonAfter = document.querySelector('.after');
const buttonBefore = document.querySelector('.before');

let newMonth;

/************************ ************************/
/******************* FONCTIONS *******************/
/************************ ************************/

const nextMonth = (selectMonth) => {
    if (selectMonth.value == 'Décembre') {
        selectMonth.value = 'Janvier';
        selectYear.value++;
    } else {
        selectOptionsArray.forEach((element,index) => {
            if (selectMonth.value == element.textContent) {
                newMonth = selectOptionsArray[index + 1].textContent;
            }
        });
        selectMonth.value = newMonth;
    }
    form.submit();
}

const previousMonth = (selectMonth) => {
    if (selectMonth.value == 'Janvier') {
        selectMonth.value = 'Décembre';
        selectYear.value--;
    } else {
        selectOptionsArray.forEach((element,index) => {
            if (selectMonth.value == element.textContent) {
                newMonth = selectOptionsArray[index - 1].textContent;
            }
        });
        selectMonth.value = newMonth;
    }
    form.submit();
}

/************************ ************************/
/********************** WORK *********************/
/************************ ************************/

selectMonth.addEventListener('change', () => {
    form.submit();
})

selectYear.addEventListener('change', () => {
    form.submit();
})

buttonBefore.addEventListener('click', () => {
    previousMonth(selectMonth);
})

buttonAfter.addEventListener('click', () => {
    nextMonth(selectMonth)
})

fetch ('public/js/birthday.json')
.then(function(response) {
    return response.json();
})
.then(function(data) {
    data.birthday.forEach(data => {
        if (data.month == selectMonth.value) {
            document.querySelectorAll('.calendar').forEach(element => {
                if (element.textContent == data.day) {
                    element.style = `background-image: url('${data.img}')`;
                    element.classList.add('birthday');
                    if (element.classList.contains('birthday')) {
                        console.log('tata');
                    }
                }
            });
        }
    });
})