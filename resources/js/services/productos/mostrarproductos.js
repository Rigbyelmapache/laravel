 import { get, post } from '../apiclient/apiclient.js';


 // Listar productos
 const getCsrfCookie = async () => {
    await fetch('/sanctum/csrf-cookie', {
        credentials: 'include'
    });
};

const obtenerProductos = async () => {
    const token = localStorage.getItem('authToken');
        if (!token) {
            throw new Error('No estás autenticado. Inicia sesión primero.');
        }
    await getCsrfCookie();
        
    try {
        const response = await get('api/products');
        console.log("response",response);
        const { productos, message } = response.data;

        console.log('Productos obtenidos:', productos);
        console.log('Mensaje:', message);
     
         // Asegúrate de que data sea un array
       
     
   
          return { exito: true, productos: productos, message: message };
    } catch (error) {
         const mensajeError = error.message || 'Error desconocido';
         console.error('Error al obtener productos:', mensajeError);
        return { exito: false, productos: [], message: `Error No se pudieron obtener los productos.` };
    }
};
 const mostrarProductosEnTabla = async () => {
    const {exito , productos , message} = await obtenerProductos();
    const tbody = document.getElementById('table-list');
    const mensaje = document.getElementById('span-mensaje');
  
    console.log('Mensaje para mostrar:', message);

    // Limpiar tabla y mensaje
    tbody.innerHTML = '';
    mensaje.textContent = '';

     mensaje.classList.remove('bg-green-200', 'bg-red-200');

   
    mensaje.classList.remove('hidden'); // Asegurarse de que el mensaje esté visible

    // Iterar y agregar filas a la tabla
     mensaje.textContent = message;
     if (exito) {
        mensaje.classList.add('bg-green-200', 'text-green-800', 'p-2', 'rounded'); // Estilo para éxito
        
      if (productos && productos.length > 0) {
        productos.forEach(producto => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            <span class="producto-nombre">${producto.producto_id}</span>
            <input class="input-id w-10 hidden" type="text" value="${producto.producto_id}" />
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
   
             <span class="producto-codigo_producto">  ${producto.codigo_producto}</span>
            <input class="input-codigo_producto hidden" type="text" value="${producto.codigo_producto}" />
        
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
   
             <span class="producto-nombre">  ${producto.nombre}</span>
            <input class="input-nombre hidden" type="text" value="${producto.nombre}" />
        
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
        
          <span class="producto-descripcion">    ${producto.descripcion}</span>
            <input class="input-descripcion hidden" type="text" value="  ${producto.descripcion}" />
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
        
            <span class="producto-precio">     ${parseFloat(producto.precio).toFixed(2)}</span>
            <input class="input-precio hidden w-10 " type="text" value="  ${producto.precio}" />
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
   
         <span class="producto-marca">     ${producto.marca}</span>
            <input class="input-marca hidden" type="text" value="   ${producto.marca}" />
        </td>
        <td class="px-6  py-4 whitespace-nowrap text-sm text-gray-900">
   
         <span class="producto-categoria_id">     ${producto.categoria_id}</span>
            <input class="input-categoria_id hidden" type="text" value="   ${producto.categoria_id}" />
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                <button 
                    data-id="${producto.producto_id}" 
                    class="btn-editar bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                >
                    Editar
                </button>
                <button 
                    data-id="${producto.producto_id}" 
                    class="btn-eliminar bg-red-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                >
                    eliminar
                </button>
                 <button 
                    data-id="${producto.producto_id}" 
                    class="btn-guardar bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded hidden focus:outline-none focus:shadow-outline"
                >
                    Guardar
                </button>
            </td>
        `;

        tbody.appendChild(fila);
    });
      }
      } else {
        // Estilo para error
        mensaje.classList.add('bg-red-400', 'text-red-800', 'p-2', 'rounded');
    }

    setTimeout(() => {
        mensaje.classList.add('hidden') 
        
    }, 5000);  // 5000 ms = 5 segundos

};

document.addEventListener('DOMContentLoaded', () => {
   
    mostrarProductosEnTabla();

  
});

export { mostrarProductosEnTabla };