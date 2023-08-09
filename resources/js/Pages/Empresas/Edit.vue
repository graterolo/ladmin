<template>
    <Head title="Editar Empresa" />

    <AuthenticatedLayout>
        <template #header>
            Editar Empresa
        </template>
        <div  class="mt-1 mb-1 grid justify-items-end p-1 border-b border-gray-200 ">
            <Link :href="route('empresas.index')" 
                class="px-1 py-1 bg-indigo-500 text-white border rounded-md "
                >Listado</Link
            >            
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="$event => form.patch(route('empresas.update', empresa))" >
                  <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">       
                      <InputLabel for="name" value="Nombre" />
                      <div class="mt-2">
                        <TextInput id="name" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.name" required autofocus autocomplete="name" />
                        <div v-if="errors.name" class="text-sm text-red-600">{{ errors.name }}</div>
                        <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
                      </div>
                   </div>
                   <div class="sm:col-span-3">                    
                    <InputLabel for="acronimo" value="Acrónimo" />
                    <div class="mt-2">    
                        <TextInput id="acronimo" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.acronimo" required  autocomplete="acronimo" />
                        <InputError class="mt-2" :message="form.errors.acronimo" />
                    </div>
                  </div>
                  <div class="sm:col-span-3">  
                    <InputLabel for="rif" value="RIF" />
                    <div class="mt-2">
                        <TextInput id="rif" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.rif" required  autocomplete="rif" />
                        <InputError class="mt-2" :message="form.errors.rif" />
                    </div>
                  </div>  
                  <div class="sm:col-span-3">
                    <InputLabel for="telef" value="Teléfono" />
                    <div class="mt-2">
                        <TextInput id="telef" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.telef" required  autocomplete="telef" />
                        <InputError class="mt-2" :message="form.errors.telef" />
                    </div>
                  </div>
                  <div class="sm:col-span-3">  
                    <InputLabel for="direccion" value="Dirección" />
                    <div class="mt-2">
                        <TextInput id="direccion" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.direccion" required  autocomplete="direccion" />
                        <InputError class="mt-2" :message="form.errors.direccion" />
                    </div>
                  </div>
                  <div class="sm:col-span-3">  
                    <InputLabel for="email" value="Email" />
                    <div class="mt-2">
                        <TextInput id="email" type="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.email" required autocomplete="username" />
                        <div v-if="errors.email" class="text-sm text-red-600">{{ errors.email }}</div>
                        <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
                    </div>
                  </div>
                  <div class="sm:col-span-3">  
                    <InputLabel for="tipo" value="Tipo Empresa" />
                    <div class="mt-2">
                        <select id="tipo" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.tipo" required>
                            <option value="0">Distribuidora</option>
                            <option value="1">Casa Madre</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.tipo" />
                    </div>
                  </div>
                  <div class="sm:col-span-3">
                        <InputLabel for="supempresa_id" value="Empresa Sup." />
                        <div class="mt-2">
                          <SelectInput id="supempresa_id" :options="empresas" type="text" v-model="form.supempresa_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                          </SelectInput>
                          <InputError class="mt-2" :message="form.errors.supempresa_id" />
                        </div>  
                  </div>
                  <div class="sm:col-span-6">  
                    <InputLabel for="descripcion" value="Descripción" />
                    <div class="mt-2">
                        <TextInput id="descripcion" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.descripcion" required autocomplete="descripcion" />
                        <InputError class="mt-2" :message="form.errors.descripcion" />
                    </div>
                  </div>  
                </div> 

                    <div class="mt-4 flex flex-col items-end">
                        <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Guardar
                        </PrimaryButton>
                    </div>                
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const props = defineProps({ 
  errors: { type: Object },
  empresa: {type:Object}, 
  empresas: {type:Object}});

const form = useForm({
    name: props.empresa.name,
    acronimo: props.empresa.acronimo,
    rif: props.empresa.rif,
    telef: props.empresa.telef,
    direccion: props.empresa.direccion,
    email: props.empresa.email,
    tipo: props.empresa.tipo,
    descripcion: props.empresa.descripcion,
    supempresa_id: props.empresa.supempresa_id
});
</script>