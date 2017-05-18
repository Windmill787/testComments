function show() {
    var x = document.getElementById('create');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

function ajaxSubmit () {
    $.ajax({
        type: 'POST',
        url: '/index',
        data: 'content=' + $('#exampleTextarea').val(),
        success: function(data){
            $('#data').html(data);
        }
    });
}