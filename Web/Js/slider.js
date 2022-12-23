const slider = document.querySelector("#slider");
let sliderSection = document.querySelectorAll(".slider__section");
let sliderSectionLast = sliderSection[sliderSection.length -1];

const btnLeft = document.querySelector('#btn-left');
const btnRigth = document.querySelector('#btn-rigth');


slider.insertAdjacentElement('afterbegin', sliderSectionLast);

function Next (){
    let sliderSectionFrist = document.querySelectorAll(".slider__section")[0];
    slider.style.marginLeft = "-200%";
    slider.style.transition = "all .5s";
    setTimeout(function(){
        slider.style.transition = "none";
        slider.insertAdjacentElement('beforeend',sliderSectionFrist);
        slider.style.marginLeft = "-100%";
    }, 500);
    console.log("SLIDER");
}

function Prev (){
    let sliderSection = document.querySelectorAll(".slider__section");
    let sliderSectionLast = sliderSection[sliderSection.length -1];
    slider.style.marginLeft = "0";
    slider.style.transition = "all .5s";
    setTimeout(function(){
        slider.style.transition = "none";
        slider.insertAdjacentElement('afterbegin',sliderSectionLast);
        slider.style.marginLeft = "-100%";
    }, 500);
}

btnRigth.addEventListener('click', function(){
    Next();
})
btnLeft.addEventListener('click', function(){
    Prev();
})

setInterval(function(){
    Next();
}, 10000);

