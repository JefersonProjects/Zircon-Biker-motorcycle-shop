//Animar al cargar
const animar = document.querySelector("#motoprin-1");
const animar2 = document.querySelector(".contenido_1 p");
let animacion = anime({
    targets: [animar, animar2],
    duration: 800,
    delay: 200,
    direction: 'alternate',
    loop: 1,
    easing: 'easeInOutSine',
    translateX: 100,
    scale: '1.1',
})
//animar al pasar mouse
let a = false;
const b = document.querySelector(".contenido_2");
b.addEventListener("mouseover", () => {
    if(!a){
    const animarf = document.querySelectorAll(".contenido_2 img");
    animacion = anime({
        targets: [animarf],
        duration: 800,
        delay: 200,
        direction: 'alternate',
        loop: 1,
        easing: 'easeInOutSine',
        translateX: 100,
        scale: '1.1',
    })
    a=true;}
})