const urlControllerLogin = '../Login/assets/controller/loginController.php';
const login = () => {
    let login       = document.getElementById('email').value;
    let password    = document.getElementById('password').value;
    if(login == ''){
        mostrar_alerta('El login está vacío', 'Login');
        return;
    }
    if(password == ''){
        mostrar_alerta('La contraseña está vacía', 'Login');
        return;
    }

    $.ajax({
        url: urlControllerLogin,
        type: 'post',
        data: {
            login,
            password,
            type: 'login'
        },
        dataType: "html",
        beforeSend: function(){
            
        },
        success: function (e) {
            if(e == "1"){
                window.location.href = '../Dashboard';
            }else{
                mostrar_alerta('Usuario y/o Contraseña Incorrectos', 'Login')
            }
        }
    });
}