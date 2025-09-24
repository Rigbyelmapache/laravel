import { get, post } from '../apiclient/apiclient.js';


const getCsrfCookie = async () => {
    await fetch('/sanctum/csrf-cookie', {
        credentials: 'include'
    });
};



// Agregar producto
const agregarProducto = async (producto) => {
    await getCsrfCookie();
    try {
        const { data, message } = await post('api/productos', producto);
        console.log('Producto agregado:', data);
    } catch (error) {
        console.error('Error al agregar producto:', error.message);
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('producto-form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        // Extraer datos del formulario
        const producto = {
            nombre: form.nombre.value.trim(),
            codigo_producto: form.codigo_producto.value.trim(),
            descripcion: form.descripcion.value.trim(),
            precio: parseFloat(form.precio.value),
            marca: form.marca.value.trim(),
            categoria_id: parseInt(form.categoria_id.value),
        };

        // Llamar a la función que hace la petición al backend
        try {
            await agregarProducto(producto);
            alert('Producto agregado exitosamente');
            form.reset(); // Limpiar el formulario
        } catch (error) {
            alert('Error al agregar producto: ' + error.message);
        }
    });
});
