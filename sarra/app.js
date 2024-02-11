const sing_in_btn=document.querySelector("#sing-in-btn");
const sing_up_btn=document.querySelector("#sing-up-btn");
const container=document.querySelector(".container");
const logo = document.querySelector(".logo");


sing_up_btn.addEventListener('click',()=>{
    container.classList.add("sing-up-mode");
    logo.classList.add("move-left");
});
sing_in_btn.addEventListener('click',()=>{
    container.classList.remove("sing-up-mode");
    logo.classList.remove("move-left");
    
});
 
  