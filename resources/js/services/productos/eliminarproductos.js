 import {  del } from '../apiclient/apiclient.js';
 import { mostrarProductosEnTabla } from './mostrarproductos.js';


const getCsrfCookie = async () => {
    await fetch('/sanctum/csrf-cookie', {
        credentials: 'include'
    });
};


const eliminarProductosid = async (productoId) => {
    const token = localStorage.getItem('authToken');
        if (!token) {
            throw new Error('No estás autenticado. Inicia sesión primero.');
        }
    await getCsrfCookie();
        
    try {
        
     
        const response = await del(`api/productos/${productoId}`);
         const {  message } = response.data;


        console.log('Mensaje:', message);
     
        return { message };

    } catch (error) {
         console.error('Error al eliminar productos:', error.message);
       
    }
};
export { eliminarProductosid };