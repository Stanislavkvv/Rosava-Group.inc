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