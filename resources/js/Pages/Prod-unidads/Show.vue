<template>
    <Head title="Unidad" />

    <AuthenticatedLayout>
        <template #header>
            Unidad
        </template>
        <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-row space-x-2 mb-2 justify-end">
                <DangerButton @click="$event => deleteUnidad(produnidad.id, produnidad.name)">
                    Eliminar
                </DangerButton>           

                <Link :href="route('prod-unidads.edit', produnidad.id)" 
                    class="inline-flex items-right px-4 py-2 gap-0.5 bg-amber-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Editar</Link
                >

                <Link :href="route('prod-unidads.index')" 
                    class="inline-flex items-right px-4 py-2 gap-0.5 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Listado</Link
                >            
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="sm:col-span-3">
                  <InputLabel for="name" value="Nombre" />
                  <div class="mt-2">
                    <textarea name="name" id="name" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ produnidad.name }}</textarea>  
                  </div>
                </div>    
                <div class="sm:col-span-3">
                  <InputLabel for="descripcion" value="Descripción" />
                  <div class="mt-2">
                    <textarea name="descripcion" id="descripcion" rows="2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ produnidad.descripcion }}</textarea>  
                  </div>
                </div>    
                <div class="sm:col-span-3">
                  <InputLabel for="Empresa" value="Empresa" />
                  <div class="mt-2">
                    <textarea name="empresa" id="empresa" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.name }}</textarea>
                  </div>
                </div>    

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputLabel from '@/Components/InputLabel.vue';
import { Head, Link } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';

const props = defineProps({ 
    produnidad: {type:Object},
    empresa: {type:Object}
});
const deleteUnidad = (id, name) => {
    // ahora no hare esto, necesito instalar sweetalert2
    alert("me quieren eliminar a mi " + name);
}
</script>