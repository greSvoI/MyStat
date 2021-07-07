window.onload = function () {

    const a = document.getElementById('sidebar');

    a.onmouseout = function(e) {

        document.getElementById('sidebar').className = 'col-md-1 sidebar';
    }

    a.onmouseover = function(e) {

       document.getElementById('sidebar').className = 'col-md-3 sidebar';
    }

}
