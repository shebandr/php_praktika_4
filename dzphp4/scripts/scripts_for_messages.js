var i = 0
var add_tag = function(){
    i += 1
    var tag_input = '<p><input id=\'tag' + i + '\', name = \'tag' + i + '\'></p>'
    tags.insertAdjacentHTML('beforebegin', tag_input)
}
document.getElementById('buttonz').addEventListener('click', add_tag)

var otpravka = function(){

}

