
$(document).ready(function() {

    var allId = ['addStudent','addTeacher','addGroup','addLanguage'];

    $('.addition').click(function() {
        var val = $(this).data('value');
        allId.forEach(element=> {
            if(element == val)
            {
                document.getElementById(element).style.display = 'block'
            }
            else document.getElementById(element).style.display = 'none'
        });
    });


    $("input[name='student']").on('input', function(e){
        var selected = $(this).val();

        $.ajax({
            type:'POST',
            url: 'main.php?page=9',
            data : { 'fl_name':selected },
            success: function () {
                alert()
            }
        });

    });





});

function Addition() {
    document.getElementById("addition").classList.toggle("show");
}

function Edit()
{
    document.getElementById("edit").classList.toggle("show");
}
function Deleting()
{
    document.getElementById("del").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }

    }
}

