<template>
    <Head title="Gestion de llaves" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <section class="
       
         mx-5 md:mx-10"
        >
            <h1 class="text-center text-xl md:text-2xl font-bold">Bienvenido a la gestion de llaves</h1>
            <div class="flex justify-between">
                <p class="font-bold">{{ estudiante?.nombre }}</p>
                <p class="font-bold text-blue-700">{{ estudiante?.institucion }}</p>
            </div>
            <!--<p>{{ llaves }}</p>-->
            <!--<p>{{ datos_academicos }}</p>-->

            <!-- formularios -->
             <form action="" class="mt-5">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo llave</label>
    <input     
    type="text" 
    id="default-input"
    v-model="form.codigo"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <span v-if="form.errors.codigo" class="text-red-500 text-xs mt-1">{{ form.errors.codigo }}</span>
</div>

<div>
    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disponible</label>
    <input 
    type="number" 
    id="default-input" 
    v-model="form.disponible"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <span v-if="form.errors.disponible" class="text-red-500 text-xs mt-1">{{ form.errors.disponible }}</span>
</div>

<div>
    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
    <select id="estado" v-model="form.estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="1">Activo</option>
    <option value="0">Inactivo</option>
    </select>
</div>


<div>
    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orden</label>
    <input 
    type="number" 
    id="default-input"
    v-model="form.orden" 
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <span v-if="form.errors.orden" class="text-red-500 text-xs mt-1">{{ form.errors.orden }}</span>
</div>

<!-- agregando usuarios -->
 <div class="mb-2">
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
  <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Seleccione un usuario</option>
    <option v-for="usuario in usuarios" :key="usuario.id" :value="usuario.id">{{ usuario.name }}
</option>

  </select>
 </div> <br>

<div class="flex justify-start">
                <button 
                type="button" 
                v-on:click="guardarDatos()"
                class="text-white bg-rose-600 hover:bg-rose-800 font-bold rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                >{{esEditar ? 'EDITAR' : 'GUARDAR'}}</button>
            </div>
                </div>

             </form>

            <div class="flex justify-end">
                <button type="button" class="text-white bg-rose-600 hover:bg-rose-800 font-bold rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                v-on:click="mostrarPDF()"
                >Exportar PDF</button>
            </div>

            
            <!-- Tabla de llaves -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Codigo                  
                </th>
                <th scope="col" class="px-6 py-3">
                    Disponible
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    Orden
                </th>

                <th scope="col" class="px-6 py-3">
                    Usuario Registra
                </th>
                <th scope="col" class="px-6 py-3">
                    Correo Registra
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha Registra
                </th>

                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
                

                              
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
            v-for="llave in llaves" :key="llave.id_llave">
                
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ llave.codigo }}
                </td>
                    
                <td class="px-6 py-4">
                    {{ llave.disponible }}   
                </td>
                <td class="px-6 py-4">
                    
                    <i v-if="llave.estado"><i class="bi bi-check2-square text-green-500"></i></i>
                    <i v-else><i class="bi bi-x-square text-red-500"></i></i>
                </td>
                <td class="px-6 py-4">
                    {{ llave.orden }}
                </td>
                <td class="px-6 py-4">
                    {{ llave.name }}
                </td>
                <td class="px-6 py-4">
                    {{ llave.email }}
                </td>
                <td class="px-6 py-4">
                    {{ llave.fecha_registra }}
                </td>
                               
                <td class="px-6 py-4 text-start">
                    <button type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    v-on:click="editarLlave(llave)">Editar</button>
                
                <button type="button" class="text-white bg-rose-600 hover:bg-rose-800 font-bold rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                v-on:click="eliminarLlave(llave.id_llave)">Eliminar</button>
                </td>
            </tr>

        </tbody>
    </table>
</div>

        </section>
    </AppLayout>
  </template>
  
  <script setup lang="ts">
  import AppLayout from '@/layouts/AppLayout.vue';
  import { Head, useForm } from '@inertiajs/vue3';
  import { type BreadcrumbItem } from '@/types';
  import { defineProps, watch, ref } from 'vue';
  import Swal from 'sweetalert2';
  import axios from 'axios';
  import { onBeforeMount, onMounted } from 'vue';

  const esEditar = ref(false);
  const usuarios = ref<Usuarios[]>([]);

  const breadcrumbs: BreadcrumbItem[] = [
    {
      title: 'configuración',
      href: '/configuracion',
    },
    {
      title: 'Llaves',
      href: '/configuracion/llaves',
    },
  ];
  const form = useForm({
    id_llave: null as number | null,
    codigo: '',
    disponible: '',
    estado: '',
    orden: '',
  });


  function guardarDatos() {
    console.log(form);

    const commonSubmitOptions = {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();            
        },
    }
    if (esEditar.value) {
        form.put(route('configuracion.UpdateLlave', form.id_llave), commonSubmitOptions);
        
        
    }else

    form.post(route('configuracion.CrearLlave'), commonSubmitOptions);
}


function eliminarLlave(id_llave: number){
    console.log(id_llave);
    form.delete(route('configuracion.EliminarLlave', id_llave));
}

function editarLlave(llave: Llaves){
    console.log('editar llave');
    console.log(llave);

    esEditar.value = true;

    form.id_llave = llave.id_llave;
    form.codigo = llave.codigo.toString();
    form.disponible = llave.disponible.toString();
    form.estado = llave.estado.toString();
    form.orden = llave.orden.toString();
    
}

function mostrarPDF(){
    window.open(route('configuracion.llaves-pdf'));
}

onBeforeMount(() => {
    console.log('aqui se ejecuta el onBeforeMount');
});
onMounted(() => {
    cargarUsuarios();
});

async function cargarUsuarios(){
    try {
        const respuesta = await axios.get(route('configuracion.usuarios-listas'));
        if(respuesta.data && Array.isArray(respuesta.data)){
            console.log(respuesta.data);
            usuarios.value = respuesta.data;
        }
    }catch (error) {
        console.log(error);
    }
}


  const props = defineProps({
    estudiante: Object as () =>{
        nombre: string;
        institucion: string;
    },
    llaves: Array,
    datos_academicos: Object as () => {
        nombre: string;
        institucion: string;
    },
    llaves: Array as () => Llaves[],
    flash: Object as () => {
        success?: string;
        error?: string;
    },
  });


// Watcher para flash messages
watch(
  () => props.flash,
  async (NewFlash: any) => {
    console.log(NewFlash);

    if (NewFlash?.success) {

      Swal.fire({
        icon: 'success',
        title : 'Exito',
        text: NewFlash.success
      });
    }

    if (NewFlash?.error) {
      Swal.fire({
        icon: 'error',
        title : 'Error',
        text: NewFlash.error
      });
    }
  },
  { deep: true }
);


  interface Llaves {
    id_llave: number;
    codigo: string;
    disponible: number;
    estado: number;
    orden: number;
    };

    interface Usuarios {
        id: number;
        name: string;
        email: string;
    }

     </script>
  
  <style scoped>
  </style>
  