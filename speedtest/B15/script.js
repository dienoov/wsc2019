const startButton = document.querySelector('#tools .start');
const stopButton = document.querySelector('#tools .stop');
const resetButton = document.querySelector('#tools .reset');

let startTime, intervalTime;

const digitClasses = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

const digit1 = document.querySelector('#timer .digit-1');
const digit2 = document.querySelector('#timer .digit-2');
const digit3 = document.querySelector('#timer .digit-3');
const digit4 = document.querySelector('#timer .digit-4');
const digit5 = document.querySelector('#timer .digit-5');

startButton.addEventListener('click', (ev) => {
    startTime = new Date().getTime();
    intervalTime = setInterval(() => {
        const diff = Math.floor((new Date().getTime() - startTime) / 1000);
        const second = (diff % 60).toString().padStart(2, '0');
        const minute = Math.floor(diff / 60).toString().padStart(3, '0');

        digit1.classList.remove(...digitClasses);
        digit1.classList.add(digitClasses[second.substr(1, 1)]);

        digit2.classList.remove(...digitClasses);
        digit2.classList.add(digitClasses[second.substr(0, 1)]);

        digit3.classList.remove(...digitClasses);
        digit3.classList.add(digitClasses[minute.substr(2, 1)]);

        digit4.classList.remove(...digitClasses);
        digit4.classList.add(digitClasses[minute.substr(1, 1)]);

        digit5.classList.remove(...digitClasses);
        digit5.classList.add(digitClasses[minute.substr(0, 1)]);
    }, 1000);
});

stopButton.addEventListener('click', (ev) => {
    clearInterval(intervalTime);
});

resetButton.addEventListener('click', (ev) => {
    digit1.classList.remove(...digitClasses);
    digit1.classList.add(digitClasses[0]);
    digit2.classList.remove(...digitClasses);
    digit2.classList.add(digitClasses[0]);
    digit3.classList.remove(...digitClasses);
    digit3.classList.add(digitClasses[0]);
    digit4.classList.remove(...digitClasses);
    digit4.classList.add(digitClasses[0]);
    digit5.classList.remove(...digitClasses);
    digit5.classList.add(digitClasses[0]);
});