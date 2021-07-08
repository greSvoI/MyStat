

let div_position = false;
function homeworkUp() {

    //div_position==false?document.getElementById('divUpload').style.display = 'block':document.getElementById('divUpload').style.display = 'none';

    div_position==false?document.getElementById('btnUpload').innerHTML='Close':document.getElementById('btnUpload').innerHTML='Upload Home work';

    div_position==false?document.getElementById('divUpload').className = 'homeworkUpload2':document.getElementById('divUpload').className = 'homeworkUpload';

    div_position==false?div_position=true:div_position=false;

}


