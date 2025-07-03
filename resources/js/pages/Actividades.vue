<template>
  <Head title="Actividades" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <h1>Hola esto es actividades</h1>

    <section>
      <h1>Lista de Actividades personas🐱‍👤</h1>
    </section>

    <section>
      <label for="actividad">Actividad:</label>
      <input type="text" 
      placeholder="aqui ingresa un texto" 
      id="actividad"
      v-model="nuevaActividad" 
      >
      <button type="button"
      v-on:click="agregarActividad()"
      >Agregar</button>
    </section>

    <section>

    <!-- Listas desordenadas -->
<ul v-for="item in Actividades" :key="item.nombre">
<li>
  <span class="mr-2">
    <input 
     type="checkbox" 
     v-model="item.realizado"
     @change="handleCheckboxChange(item)"
    >

  </span>
  <span class="mr-2">{{item.nombre }}</span>
  <span class="mr-2">{{item.hora }}</span>
</li>
</ul>
    </section>
  </AppLayout>

</template>

<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { type BreadcrumbItem } from '@/types';
    import {ref} from 'vue';
    import Swal from 'sweetalert2'

    const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Aplicaciones',
        href: '/aplicaciones',
    },
    {
        title: 'Actividades',
        href: '/aplicaciones/actividades',
        
    },

    
];
const nuevaActividad = ref('');
const Actividades = ref( [
  {
    nombre : "Cosinar Desayunar",
    realizado: true,
    hora:""
  },
  {
    nombre : "Cosinar Almuerzo",
    realizado: true,
    hora:"" 
  },
  {
    nombre : "Lavar Platos",
    realizado: false,
    hora:""  
  } 
]);

function agregarActividad(){
  console.log("ingreso aqui")
  Swal.fire({
  title: "Actividad Registrada",
  text: "BIEN HECHO!",
  icon: "success"
});
  if(nuevaActividad.value == ""){
  Swal.fire({
  title: "Actividad no registrada",
  text: "ERROR",
  icon: "error"
});
return;
}

  Actividades.value.push(
    {
      nombre: nuevaActividad.value ,
      realizado:false,
      hora: new Date().toLocaleTimeString()
    }
  )

  console.log(Actividades);
}

function handleCheckboxChange(item: { nombre: string, realizado: boolean }) {
Swal.fire({
  title: "Buen Trabajo!",
  text: "Haz click en el boton!",
  icon: "success"
});
}

</script>

<style scoped>

</style>