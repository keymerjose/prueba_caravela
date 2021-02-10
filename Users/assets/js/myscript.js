const urlControllerUsers = '../Users/assets/controller/controllerUser.php';

const buscar_email = (valor) => {
    console.log(valor);
    $.ajax({
        url: urlControllerUsers,
        type: 'post',
        data: {
            valor,
            type: 'consultar'
        },
        dataType: "html",
        beforeSend: function(){
            
        },
        success: function (e) {
            console.log(e);
            if(e == "1"){
                $('small').removeClass('d-none');
                $('#btnCreateUser').attr('disabled', 'disabled');
            }else{
                $('small').addClass('d-none');
                $('#btnCreateUser').removeAttr('disabled');
            }
        }
    });
}