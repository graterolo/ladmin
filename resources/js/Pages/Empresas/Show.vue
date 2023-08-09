<template>
    <Head title="Empresa" />

    <AuthenticatedLayout>
        <template #header>
            Empresa
        </template>
        <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-row space-x-2 mb-2 justify-end">
                <DangerButton @click="$event => deleteEmpresa(empresa.id, empresa.name)">
                    Eliminar
                </DangerButton>           

                <Link :href="route('empresas.edit', empresa.id)" 
                    class="inline-flex items-right px-4 py-2 gap-0.5 bg-amber-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Editar</Link
                >

                <Link :href="route('empresas.index')" 
                    class="inline-flex items-right px-4 py-2 gap-0.5 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Listado</Link
                >            
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-3"> 
                    <div class="mt-2">
                        <InputLabel for="name" value="Nombre" />
                        <textarea name="name" id="name" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.name }}</textarea>
                    </div>
                  </div>  
                  <div class="sm:col-span-3"> 
                    <div class="mt-2">
                        <InputLabel for="acronimo" value="Acrónimo" />
                        <textarea name="acronimo" id="acronimo" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.acronimo }}</textarea>
                    </div>
                  </div>  
                  <div class="sm:col-span-3"> 
                    <div class="mt-2">
                        <InputLabel for="rif" value="RIF" />
                        <textarea name="rif" id="rif" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.rif }}</textarea>
                    </div>
                  </div>  
                  <div class="sm:col-span-3"> 
                    <div class="mt-2">
                        <InputLabel for="telef" value="Teléfono" />
                        <textarea name="telef" id="telef" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.telef }}</textarea>
                    </div>
                  </div>  
                  <div class="sm:col-span-3"> 
                    <div class="mt-2">
                        <InputLabel for="direccion" value="Dirección" />
                        <textarea name="direccion" id="direccion" rows="2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.direccion }}</textarea>
                    </div>
                  </div>  
                  <div class="sm:col-span-3"> 
                    <div class="mt-2">
                        <InputLabel for="email" value="Email" />
                        <textarea name="email" id="email" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.email }}</textarea>
                    </div>
                  </div>  
                  <div class="sm:col-span-3"> 
                    <div class="mt-2">
                        <InputLabel for="tipo" value="Tipo Empresa" />
                      <textarea name="tipo" id="tipo" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-if=" empresa.tipo==1">Casa Madre</textarea>
                      <textarea name="tipo" id="tipo" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-else>Distribuidora</textarea>  
                    </div>
                  </div> 
                  <div class="sm:col-span-3"> 
                    <div class="mt-2">
                      <InputLabel for="supempresa" value="Empresa Sup." />
                      <textarea name="supempresa" id="supempresa" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-if=" empresa.supempresa_id">{{ supempresa.name }}</textarea>
                      <textarea name="supempresa" id="supempresa" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-else>No Tiene</textarea>  
                    </div>
                  </div> 
                  <div class="sm:col-span-3"> 
                    <div class="mt-2">
                        <InputLabel for="descripcion" value="Descripción" />
                        <textarea name="descripcion" id="descripcion" rows="2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.descripcion }}</textarea>
                    </div>      
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

const props = defineProps({ empresa: {type:Object}, supempresa: {type:Object}});

const deleteEmpresa = (id, name) => {
    // ahora no hare esto, necesito instalar sweetalert2
    alert("me quieren eliminar a mi " + name);
}

</script>