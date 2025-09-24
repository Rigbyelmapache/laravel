// apiClient.js

const API_URL = 'http://localhost:8000'; // Cambia esta URL a la de tu backend

// Función para manejar respuestas de la API
const handleResponse = async (response) => {
    if (!response.ok) {
        const errorData = await response.json();
        console.error('Error en la solicitud:', errorData);
        throw new Error(errorData.message || 'Error en la solicitud');
    }
   const responseData = await response.json();
    console.log('Respuesta de la API:', responseData);
    // Si la respuesta contiene un mensaje, lo devolvemos también
    if (responseData.message) {
        return {
            data: responseData,
            message: responseData.message
        };
    }
    console.log('Mensaje de la API:', responseData.message);
    
    return {
        data: responseData
    };
};


// Función para obtener el token de autenticación (si lo necesitas para la autenticación por token)
const getAuthToken = () => {
    // Puede ser desde LocalStorage, Cookie, etc.
    return localStorage.getItem('authToken');
};

// Función para agregar el token de autenticación a los headers
const getAuthHeaders = () => {
    const token = getAuthToken();
    return token ? { Authorization: `Bearer ${token}` } : {};
};
// Función para hacer una petición GET
const get = async (endpoint, headers = {}) => {
    try {
        const response = await fetch(`${API_URL}/${endpoint}`, {
            method: 'GET',
            headers: {
                ...headers,
                'Content-Type': 'application/json',
            },
        });
        return await handleResponse(response);
    } catch (error) {
        console.error('Error en GET:', error.message);
        throw error;
    }
};

// Función para hacer una petición POST
const post = async (endpoint, data, headers = {}) => {
    try {
        const response = await fetch(`${API_URL}/${endpoint}`, {
            method: 'POST',
            headers: {
                ...headers,
                'Content-Type': 'application/json',
                 // <---- Agrega esto
            },
            body: JSON.stringify(data),
             credentials: 'include'
        });
        return await handleResponse(response);
    } catch (error) {
        console.error('Error en POST:', error.message);
        throw error;
    }
};

// Función para hacer una petición PUT
const put = async (endpoint, data, headers = {}) => {
    try {
        const response = await fetch(`${API_URL}/${endpoint}`, {
            method: 'PUT',
            headers: {
                ...headers,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });
        return await handleResponse(response);
    } catch (error) {
        console.error('Error en PUT:', error.message);
        throw error;
    }
};

// Función para hacer una petición DELETE
const del = async (endpoint, headers = {}) => {
    try {
        const response = await fetch(`${API_URL}/${endpoint}`, {
            method: 'DELETE',
            headers: {
                ...headers,
                'Content-Type': 'application/json',
            },
        });
        return await handleResponse(response);
    } catch (error) {
        console.error('Error en DELETE:', error.message);
        throw error;
    }
};


// Exportar funciones
export { get, post, put, del, getAuthHeaders };
