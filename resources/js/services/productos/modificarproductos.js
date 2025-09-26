 import {  put} from '../apiclient/apiclient.js';
 import { mostrarProductosEnTabla } from './mostrarproductos.js';
 import { eliminarProductosid } from './eliminarproductos.js';


const getCsrfCookie = async () => {
    await fetch('/sanctum/csrf-cookie', {
        credentials: 'include'
    });
};


const modificarProductosid = async (productoId,producto) => {
    const token = localStorage.getItem('authToken');
        if (!token) {
            throw new Error('No estás autenticado. Inicia sesión primero.');
        }
    await getCsrfCookie();
        
    try {
        // 🔍 DEBUG: Ver qué se está enviando
      
     
        const response = await put(`api/productos/${productoId}`,producto);
         const { productos, message } = response.data;

        console.log('Productos obtenidos:', productos);
        console.log('Mensaje:', message);
     
        return { productos, message };

    } catch (error) {
         console.error('Error al modificar productos:', error.message);
       
    }
};

document.addEventListener('DOMContentLoaded', () => {
   


   const tbody = document.getElementById('table-list');

    tbody.addEventListener('click', async (event) => {
        const editarBtn = event.target.closest('.btn-editar');
        const guardarBtn = event.target.closest('.btn-guardar');
        const eliminarBtn = event.target.closest('.btn-eliminar');

        if (editarBtn) {
            const fila = editarBtn.closest('tr');
            toggleEditable(fila, true);
        }

        if (guardarBtn) {
            const fila = guardarBtn.closest('tr');
            const productoId = guardarBtn.getAttribute('data-id');

            // Obtener valores
             const codigo_producto = fila.querySelector('.input-codigo_producto')?.value.trim();
            const nombre = fila.querySelector('.input-nombre')?.value.trim();
            const descripcion = fila.querySelector('.input-descripcion')?.value.trim();
            const precio = parseFloat(fila.querySelector('.input-precio')?.value);
            const marca = fila.querySelector('.input-marca')?.value.trim();
             const categoria_id = fila.querySelector('.input-categoria_id')?.value.trim();

           
            const productoModificado = {codigo_producto, nombre, descripcion, precio, marca ,categoria_id };

            // Aquí debes tener definida la función modificarProducto (PUT)
            const {productos}= await modificarProductosid(productoId, productoModificado);

            if (productos?.producto_id) {
                toggleEditable(fila, false);
                 mostrarProductosEnTabla();
               
            } else {
                alert(' error  edit ');
            }
        }else if(eliminarBtn) {
           
            const productoId = eliminarBtn.getAttribute('data-id');
             const message= await eliminarProductosid(productoId);
              if (message) {
                    alert('Producto eliminado exitosamente');
                 mostrarProductosEnTabla();
               
            } else {
                alert(' error  edit ');
            }
            
        }
    });
});
const toggleEditable = (fila, editable = true) => {
    const celdas = fila.querySelectorAll('td');
    celdas.forEach(celda => {
        const input = celda.querySelector('input');
        const span = celda.querySelector('span');
 
        if (editable) {
            // Mostrar los inputs y ocultar el texto
            if (input) input.classList.remove('hidden');
            if (span) span.classList.add('hidden');
        } else {
            // Mostrar el texto y ocultar los inputs
            if (input) input.classList.add('hidden');
            if (span) span.classList.remove('hidden');
        }
    });

    // Mostrar u ocultar los botones de "Editar" y "Guardar"
    fila.querySelector('.btn-editar').classList.toggle('hidden', editable);
    fila.querySelector('.btn-guardar').classList.toggle('hidden', !editable);
};