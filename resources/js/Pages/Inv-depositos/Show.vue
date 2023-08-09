<template>
    <Head title="Depósito" />

    <AuthenticatedLayout>
        <template #header>
            Depósito
        </template>
        <!-- v-if="hasPermission('empresas.create')"   v-if="$user->hasRole('empresas.create')"-->
        <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-row space-x-2 mb-2 justify-end">
                <DangerButton @click="$event => deleteDeposito(dep.id, dep.name)">
                    Eliminar
                </DangerButton>           

                <Link :href="route('inv-depositos.edit', invdeposito.id)" 
                    class="inline-flex items-right px-4 py-2 gap-0.5 bg-amber-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Editar</Link
                >

                <Link :href="route('inv-depositos.index')" 
                    class="inline-flex items-right px-4 py-2 gap-0.5 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Listado</Link
                >            
        </div>
                
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                  <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                      <InputLabel for="name" value="Nombre" />
                      <div class="mt-2">
                        <textarea name="name" id="name" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ invdeposito.name }}</textarea>   
                      </div>
                    </div>  
                    <div class="sm:col-span-3">
                      <InputLabel for="acronimo" value="Acrónimo" />
                      <div class="mt-2">
                        <textarea name="name" id="name" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ invdeposito.acronimo }}</textarea>
                      </div>
                    </div>  
                    <div class="sm:col-span-3">
                      <InputLabel for="tipo" value="Tipo" />
                      <div class="mt-2">
                        <textarea name="name" id="name" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-if=" invdeposito.tipo==1">Ventas</textarea>
                        <textarea name="name" id="name" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-else>Depósito</textarea>
                      </div>
                    </div>  
                    <div class="sm:col-span-3">
                      <InputLabel for="condicion" value="Condición" />
                      <div class="mt-2">
                        <textarea name="condicion" id="condicion" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-if=" invdeposito.condicion==1">Externo</textarea>
                        <textarea name="condicion" id="condicion" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-else>Interno</textarea>
                      </div>
                    </div>  
                    <div class="sm:col-span-3">
                      <InputLabel for="descripcion" value="Descripción" />
                      <div class="mt-2">
                        <textarea name="name" id="name" rows="2" class="mt-1 block w-full sm:rounded-lg">{{ invdeposito.descripcion }}</textarea>
                      </div>
                    </div>  
                    <div class="sm:col-span-3">
                      <InputLabel for="empresa" value="Empresa" />
                      <div class="mt-2">
                        <textarea name="empresa" id="empresa" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.name }}</textarea>
                      </div>
                    </div>  
                </div>
               </div> 
            </div>
             

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import DangerButton from '@/Components/DangerButton.vue';

const props = defineProps({
    invdeposito: {type:Object},
    empresa: {type:Object}
});
const form = useForm({
    id:''
});
const deleteDeposito = (id, name) => {
    // ahora no hare esto, necesito instalar sweetalert2
    alert("me quieren eliminar a mi " + name);
}

</script>