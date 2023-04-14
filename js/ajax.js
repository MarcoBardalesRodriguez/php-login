document.addEventListener('DOMContentLoaded', () => {

    const myForm = document.forms.form;
    const btnForm = document.getElementById('btn-form');
    const btnLogin = document.getElementById('btn-login');
    const btnRegister = document.getElementById('btn-register');

    var fileFetch = '';

    // Manejar el evento click en el boton login
    btnLogin.addEventListener('click', () => {
        fileFetch = 'controladores/login.php';
        btnForm.innerHTML = 'Ingresar';
    });

    // Manejar el evento click en el boton register
    btnRegister.addEventListener('click', () => {
        fileFetch = 'controladores/register.php';
        btnForm.innerHTML = 'Registrarse';
    });

    // Crear evento submit con boton form
    btnForm.addEventListener('click', function() {
        // Ejecutar el evento submit modificado del formulario
        myForm.dispatchEvent(new Event('submit'));
    });

    // Manejar el evento de envío del formulario
    myForm.addEventListener('submit', event => {
        // Detener el envío del formulario
        event.preventDefault();
        console.log('aqui estamos bien');

        // Obtener los datos del formulario
        const elements = myForm.elements;
        let username = elements.username.value;
        let password = elements.password.value;

        // Evaluar el tipo de formulario Login o Register
        let file = fileFetch;

        // Configurar los datos a enviar en la petición
        let data = new FormData(); //petición multipart/form-data
        data.append('username', username);
        data.append('password', password);

        // Configurar las opciones de la petición Fetch
        let requestOptions = {
            method: 'POST',
            body: data
        };

        // console.log(file, username, password, data, requestOptions);

        // Realizar la petición Fetch
        fetch(file , requestOptions)
            .then(function (response) {
                console.log(response);
                if (!response.ok) {
                    throw new Error('Error en la petición Fetch');
                }
                return response.json();
            })
            .then(function (data) {
                    // console.log(data);
                if (data.success) {
                    // Redirigir a la página de inicio del usuario usando JavaScript
                    console.log('redireccionando');
                    window.location.href = "inicio.php";
                } else {
                    // Mostrar un mensaje de error en el cliente
                    console.log(data.message);
                    let div = document.getElementById('errors');
                    div.innerHTML = '';
                    var messageDiv = document.createElement('div');
                    messageDiv.classList.add('alert');
                    messageDiv.classList.add('alert-warning');
                    messageDiv.innerHTML = data.message;
                    div.appendChild(messageDiv);
                }
            })
            .catch(function (error) {
                // Mostrar un mensaje de error
                console.error(error);
            });
    });
});