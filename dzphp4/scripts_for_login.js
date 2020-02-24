

function login(){
    document.querySelector(".okno_vvoda").style = 'display:none'
    document.querySelector("#loginka").style = 'display:block'
    
}
document.getElementById('buttonx').addEventListener("click",
        login

)

function back(){
    document.querySelector(".okno_vvoda").style = 'display:block'
    document.querySelector("#loginka").style = 'display:none'
    
}
document.getElementById('buttony').addEventListener("click",
        back

)