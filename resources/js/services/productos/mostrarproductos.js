 import { get, post } from '../apiclient/apiclient.js';

 // Listar productos
 const getCsrfCookie = async () => {
    await fetch('/sanctum/csrf-cookie', {
        credentials: 'include'
    });
};

const obtenerProductos = async () => {
    await getCsrfCookie();
    try {
        const { data, message } = await get('productos');
        console.log('Productos obtenidos:', data);
    } catch (error) {
        console.error('Error al obtener productos:', error.message);
    }
};
 const mostrarProductosEnTabla = async () => {
    const productos = await obtenerProductos();
    const tbody = document.getElementById('table-list');
    const mensaje = document.getElementById('span-mensaje');

    // Limpiar tabla y mensaje
    tbody.innerHTML = '';
    mensaje.textContent = '';

    if (productos.length === 0) {
        mensaje.textContent = 'No hay productos disponibles.';
        return;
    }

    // Iterar y agregar filas a la tabla
    productos.forEach(producto => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${producto.nombre}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${producto.descripcion}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$${parseFloat(producto.precio).toFixed(2)}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${producto.marca}</td>
        `;

        tbody.appendChild(fila);
    });
};
document.addEventListener('DOMContentLoaded', () => {
    mostrarProductosEnTabla();
});