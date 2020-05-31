
var message
var otpravka = function(){

    message = {text: document.getElementsByClassName('text_of_mesage')[0].value,
     time: new Date,
     type_data:'work',
     id_dialog: document.getElementsByClassName('id_dialog')[0].value,
    }

console.log(message)
}
