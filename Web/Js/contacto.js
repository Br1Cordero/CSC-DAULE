$(document).ready(function () {
    
    console.log('Loading...');

    $(document).on("click", '#form', function(){
        alert('Loading...');
        $('#form').trigger('reset');

      })
});

/*
 $('#form').submit(function(e){
        e.preventDefault();
        const data = {
            name: $('#name').val(),
            surname: $('#surname').val(),
            cell: $('#cell').val(),
            email: $('#email').val(),
            mensaje: $('#mensaje').val()
        };

        $.post('../backend/mensaje.php', data, function(response){
            alert (response);
            $('#form').trigger('reset');
        });
        console.log('Submit...');});

*/