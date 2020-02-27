

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
document.getElementById('buttony').addEventListener("click",back)

var vis_password = function(){
    if(document.querySelector("#inp_pas1").type == 'password'){
    document.querySelector("#inp_pas1").type = 'text'} else {
    document.querySelector("#inp_pas1").type = 'password'}
    if(document.querySelector("#inp_pas2").type == 'password'){
        document.querySelector("#inp_pas2").type = 'text'} else {
        document.querySelector("#inp_pas2").type = 'password'}
}

document.querySelector('#display_password').addEventListener("click",vis_password)
document.querySelector('#display_password1').addEventListener("click",vis_password)