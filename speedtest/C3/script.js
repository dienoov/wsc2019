const canvas = document.querySelector('#pad canvas');
const ctx = canvas.getContext('2d');

canvas.width = 750;
canvas.height = 500;

let pressed = false;
let color = 'red';

canvas.addEventListener('mousedown', (ev) => {
    pressed = true;
});

canvas.addEventListener('mouseup', (ev) => {
    pressed = false;
});

canvas.addEventListener('mousemove', (ev) => {
    if (!pressed)
        return;

    const x = ev.clientX - canvas.getBoundingClientRect().left;
    const y = ev.clientY - canvas.getBoundingClientRect().top;

    ctx.beginPath();
    ctx.fillStyle = color;
    ctx.rect(x, y, 2, 2);
    ctx.fill();
    ctx.closePath();
});

document.querySelector('.colors').childNodes.forEach((el) => {
    el.addEventListener('click', (ev) => {
        color = ev.currentTarget.className;
    });
});