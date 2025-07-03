<template>
  <Head title="Yes No" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <h1>Hola esto es Yes No</h1>
    
    <div class="">
    <button type="button" 
    v-on:click="HacerPeticionApiYesNo()"
    class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Lime</button>
    
    <p>{{ yesno.answer }}</p>
    
    <img class="h-auto max-w-xl rounded-lg shadow-xl dark:shadow-gray-800" 
    :src="yesno.image" 
    alt="image description">

    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
import {ref} from 'vue';

const yesno = ref({});

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Aplicaciones',
    href: '/aplicaciones',
  },
  {
    title: 'Yes No',
    href: '/aplicaciones/yesno',
  },
];

async function HacerPeticionApiYesNo(){

   const respuesta = await fetch('https://yesno.wtf/api')
   const data = await respuesta.json();
   yesno.value = data;
   console.log(data)
}
   </script>

<style scoped>
</style>
