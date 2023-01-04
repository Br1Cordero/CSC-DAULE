$(document).ready(function () {

    console.log('jQuery is Working');
    let edit = false;
    fetchUser();

    $(document).on("click", "#add-photo", function(){
     $("#photo").click();
      });

      $(document).on("click", '#add-resume', function(){
        $('#resume').click();
      })

      $(document).on("click", '#btn', function(){
        console.log('Clicked');
      })
    $('#search').keyup(function (e) {
        if ($('#search').val()) {

            let search = $('#search').val().trim();


            $.ajax({
                url: '../backend/user-search.php',
                type: 'POST',
                data: { search: search },
                success: function (response) {
                    let users = JSON.parse(response);
                    let template = '';
                    users.forEach(user => {
                        template += `<li>
                            ${user.nombres}
                                     </li>`
                    });
                    
                    $('#cardContainer').html(template);
                }
            })
        } 
    });

    $('#form').submit(function(e){
        e.preventDefault();
        const postData = {
        id: $('#ruc-id').val(),  
        ruc:  $('#ruc').val(),    
        name: $('#name').val(),
        surname :  $('#surname').val(),
        edad: $('#edad').val(),
        email: $('#email').val(),
        direccion: $('#direccion').val(),
        telefono: $('#telefono').val(),
        estado: $('#estado').val(), 
        sexo: $('#sexo').val(),
        nivel: $('#nivel').val(),
        cargo: $('#cargo').val(),
        sueldo: $('#sueldo').val(),
        ciudad: $('#ciudad').val(),
        foto: $('#photo').val(),
        curriculum: $('#resume').val()
        };
        
        let url = edit === false  ? '../backend/user-add.php' : '../backend/user-edit.php'; 
        $.post( url , postData, function(response) {

            alert(response);
            fetchUser ();
            $('#form').trigger('reset');
            edit = false;
        })
        
    })

    function fetchUser (){
    
        $.ajax({
          url :'../backend/user-list.php',
          type: 'GET',
          success: function(response){
            let template = '';
            let user = JSON.parse(response);
            user.forEach(users =>{
    
              template += `
              <tr usersId =${users.id}>
                <td> ${users.id} </td>
                <td> <a href="#" class="userItem">${users.name}</a> </td>
                <td> ${users.cargo} </td>
                <td>
                <button class="user-delete" >
                 X
                </button>
                </td>
              </tr>
              `
            })
            $('#Users').html(template);
            edit == true;
          }
        })
      }
    
    $(document).on('click','.user-delete', function(){

      if(confirm('Esta seguro que desea eliminar este Usuario ?')){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('usersId');
    
        
      $.post('../backend/user-delete.php', {id} , function(response){
        fetchUser();
        $('#form').trigger('reset');
         edit = false;
      });
      }
      
    })

    $(document).on('click', '.userItem', function(){
      let element = $(this)[0].parentElement.parentElement;
      let id =$(element).attr('usersId');
      $.post('../backend/user-single.php', {id: id} , function(response){
        let user = JSON.parse(response);
        
        $('#ruc-id').val(user.id),
        $('#ruc').val(user.id),    
        $('#name').val(user.name),
        $('#surname').val(user.surname),
        $('#edad').val(user.edad),
        $('#email').val(user.email),
        $('#direccion').val(user.dir),
        $('#telefono').val(user.cell),      
        $('#estado').val(user.civil), 
        $('#sexo').val(user.sex),
        $('#nivel').val(user.nivel),
        $('#cargo').val(user.cargo),
        $('#sueldo').val(user.sueldo),
        $('#ciudad').val(user.ciudad)
        edit = true;
      })
    })
    
 })

