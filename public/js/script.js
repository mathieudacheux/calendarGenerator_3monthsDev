/************************ ************************/
/******************* VARIABLES *******************/
/************************ ************************/

const form = document.querySelector('form');
const selectMonth = document.querySelector('#month');
const selectOptionsArray = document.querySelectorAll('#month option');

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
