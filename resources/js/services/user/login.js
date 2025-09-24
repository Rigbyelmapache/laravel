import { post ,getAuthHeaders} from '../apiclient/apiclient.js';

const getCsrfCookie = async () => {
    await fetch('/sanctum/csrf-cookie', {
        credentials: 'include'
    });
};

export const loginUser = async (credentials) => {
    try {
        await getCsrfCookie();

        const response = await post('api/auth/login', credentials, {
            'Accept': 'application/json',
        });

        console.log(response);
        return response.data;
    } catch (error) {
        throw error;
    }
};
document.querySelector('#login-form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;

    try {
        const result = await loginUser({ email, password });
        console.log('Login exitoso:', result);
        // Redirigir, guardar token, etc.
          if (result.redirect) {
            // Esta línea debe hacer la redirección en el navegador
            window.location.href = result.redirect;
        } else {
            console.error('No se encontró la URL de redirección');
        }
    } catch (error) {
        console.error('Error al iniciar sesión:', error.message);
    }
});

