"use strict"

function formSignInSubmit(event){
    if(new Date(localStorage.getItem('signInEndTime'))>new Date()){
        event.preventDefault();
        document.querySelector("#wait").classList.add("active")
        document.querySelector("#invalid").classList.remove("active")
    } else {
        localStorage.removeItem('signInError')
        localStorage.removeItem('signInEndTime')
    }
}

function formApplicationSubmit(event){
    if(new Date(localStorage.getItem('applicationEndTime'))>new Date()){
        event.preventDefault();
        document.querySelector("#wait").classList.add("active")
    } else {
        localStorage.removeItem('applicationEndTime')
    }
}

//header menu animations
const headerToggleBtn = document.querySelector("header.head .container button.toggle")
headerToggleBtn.addEventListener("click",function(){
    document.querySelector(".mobileMenu").classList.add("active")
    document.body.classList.add("noScroll")
})
const mobileMenuCloseBtn = document.querySelector(".mobileMenu .container .close")
mobileMenuCloseBtn.addEventListener("click",function(){
    this.parentElement.parentElement.classList.remove("active")
    document.body.classList.remove("noScroll")
})

const infoBlock = document.querySelector("section.info")
if(infoBlock){
    checkMainMap()
}
function checkMainMap(){
    const infoHeight = infoBlock.querySelector("section.info .container .info").offsetHeight
    infoBlock.querySelector("section.info .container .map .map_block").style.height = `${infoHeight}px`
}