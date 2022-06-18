"use strict"

const allAdminBtns = document.querySelectorAll("main#admin .buttn")
const allAdminPages = document.querySelectorAll("main#admin section.content .content__block")

allAdminBtns.forEach(item=>{
    item.addEventListener("click",function(){
        if(this.getAttribute("action")){
            allAdminPages.forEach(adminPage=>{
                adminPage.classList.remove("active")
                if(adminPage.id==this.getAttribute("action")){
                    adminPage.classList.add("active")
                }
            })
        }
    })
})

const adminCheckApplicationBtns = document.querySelectorAll("main#admin section.content form.applicationCheckedForm button");
adminCheckApplicationBtns.forEach(item=>{
    item.addEventListener("click",function(event){
        if (window.confirm("Do you really want to do this?")) {
            this.parentElement.querySelector("input[name='isCheck']").setAttribute("value","true")
        } else {
            this.parentElement.querySelector("input[name='isCheck']").setAttribute("value","false")
        }
    })
})

const paginationBtns = document.querySelectorAll("main#admin section.content .paginationBtns button");
paginationBtns.forEach(item=>{
    item.addEventListener("click",function(){
        if (!item.classList.contains("noactive")) {
            window.location.href = item.getAttribute("link")
        }
    })
})

if(document.querySelector("main#admin.admin")){
    const adminPasswordRecoveryShowBtn = document.querySelector("main#admin section.content form#personalSettings a.passwordRecoveryOpen");
    const adminPasswordRecoveryBlock = document.querySelector("main#admin section.content .content__block__child.passwordRecovery .passwordRecovery");
    const adminPasswordRecoveryHead = document.querySelector("main#admin section.content .content__block__child.passwordRecovery .head");
    const adminPasswordRecoveryInputs = document.querySelectorAll("main#admin section.content .content__block__child.passwordRecovery .passwordRecovery input");
    const adminPersonalSettingsBtn = document.querySelector("main#admin section.content form#personalSettings button");
    adminPasswordRecoveryShowBtn.addEventListener("click",adminPasswordRecoveryShowBtnEvent)
    window.addEventListener("resize",adminPasswordRecoveryShowBtnEvent)
    function adminPasswordRecoveryShowBtnEvent(){
        if(adminPasswordRecoveryBlock.classList.contains("active")){
            adminPasswordRecoveryBlock.style.bottom = "0";
            adminPasswordRecoveryHead.classList.remove("active")
            adminPersonalSettingsBtn.style.marginTop = "24px"
            adminPasswordRecoveryBlock.classList.remove("active")
            adminPasswordRecoveryBlock.style.top = "unset";
            adminPasswordRecoveryInputs.forEach(item=>{
                item.removeAttribute("required")
            })
        } else {
            adminPasswordRecoveryHead.classList.add("active")
            adminPasswordRecoveryBlock.classList.add("active")
            adminPersonalSettingsBtn.style.marginTop = adminPasswordRecoveryBlock.offsetHeight+24+"px"
            adminPasswordRecoveryBlock.style.top = document.querySelector("main#admin section.content .content__block__child.passwordRecovery").offsetHeight+"px";
            adminPasswordRecoveryBlock.style.bottom = "unset";
            adminPasswordRecoveryInputs.forEach(item=>{
                item.setAttribute("required","required")
            })
        }
    }
    document.addEventListener("DOMContentLoaded",function(){
        if(adminPasswordRecoveryBlock.classList.contains("active")){
            adminPasswordRecoveryHead.classList.add("active")
            adminPasswordRecoveryBlock.classList.add("active")
            adminPersonalSettingsBtn.style.marginTop = adminPasswordRecoveryBlock.offsetHeight+24+"px"
            adminPasswordRecoveryBlock.style.top = document.querySelector("main#admin section.content .content__block__child.passwordRecovery").offsetHeight+"px";
            adminPasswordRecoveryBlock.style.bottom = "unset";
        }
    })


    const adminPasswordRecoveryPasswordBtns = document.querySelectorAll("main#admin section.content .content__block__child.passwordRecovery .passwordRecovery .inputBlock .input .passwordImg");
    adminPasswordRecoveryPasswordBtns.forEach(item=>{
        item.addEventListener("click",function(event){
            if(event.target.tagName=="I"){
                item.classList.remove("active")
                item.parentElement.querySelector("img").classList.add("active")
                item.parentElement.querySelector("input").setAttribute("type","password")
            } else if(event.target.tagName=="IMG"){
                item.classList.remove("active")
                item.parentElement.querySelector("i").classList.add("active")
                item.parentElement.querySelector("input").setAttribute("type","text")
            }
        })
    })
}