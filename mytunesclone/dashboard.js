document.addEventListener("DOMContentLoaded",function(){
    const menubtn = document.querySelector(".menu-btn");
    const sidebar = document.querySelector(".sidebar");

    menubtn.addEventListener("click",function(){
        sidebar.classList.add("active");
        menubtn.style.visibility= "hidden";
    });

    const closebtn = document.querySelector(".close-btn");
    closebtn.addEventListener("click",function(){
        sidebar.classList.remove("active");
        menubtn.style.visibility= "visible";
    });
})
