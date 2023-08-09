<template>
    <Head title="Nuevo Inventario" />

    <AuthenticatedLayout>
        <template #header>
            Crear Inventario
        </template>
        <div  class="mt-1 mb-1 grid justify-items-end p-1 border-b border-gray-200 ">
            <Link :href="route('inventarios.index')" 
                class="px-1 py-1 bg-indigo-500 text-white border rounded-md "
                >Listado</Link
            >            
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="$event => form.post(route('inventarios.store'))" >
                  <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <!-- <div class="sm:col-span-3">
                        <InputLabel for="name" value="Nombre" />
                        <div class="mt-2">
                            <TextInput id="name" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.name" required autofocus autocomplete="name" />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                    </div> -->
                     <div class="sm:col-span-3">
                        <InputLabel for="empresa_id" value="Empresa" />
                        <div class="mt-2">
                            <SelectInput id="empresa_id" :options="empresas" type="text" v-model="form.empresa_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                            </SelectInput>
                            <InputError class="mt-2" :message="form.errors.empresa_id" />
                        </div>
                    </div>    
                   <div class="sm:col-span-3">
                        <InputLabel for="deposito_id" value="Depósito" />
                        <div class="mt-2">
                            <SelectInput id="deposito_id" :options="depositos" type="text" v-model="form.deposito_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                            </SelectInput>
                            <InputError class="mt-2" :message="form.errors.deposito_id" />
                        </div>
                    </div>   
                    <div class="sm:col-span-3">
                        <InputLabel for="producto_id" value="Producto" />
                        <div class="mt-2">
                            <SelectInput id="producto_id" :options="productos" type="text" v-model="form.producto_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                            </SelectInput>
                            <div v-if="errors.producto_id" class="text-sm text-red-600">{{ errors.producto_id }}</div>
                            <!-- <InputError class="mt-2" :message="form.errors.producto_id" /> -->
                        </div>
                    </div>    
                    <div class="sm:col-span-3">
                        <InputLabel for="cantidad" value="Cantidad" />
                        <div class="mt-2">
                            <TextInput id="cantidad" type="text" class="bg-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.cantidad" readonly  autocomplete="cantidad" />
                            <InputError class="mt-2" :message="form.errors.cantidad" />
                        </div>
                    </div>    
                    <div class="sm:col-span-3">
                            <InputLabel for="activo" value="Activo?" />
                            <div class="mt-2">
                                <select id="activo" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" v-model="form.activo" required>
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.activo" />
                            </div>
                        </div>   
                        <div class="sm:col-span-3">
                        <InputLabel for="limite_stock" value="Limite Stock" />
                        <div class="mt-2">
                            <TextInput id="limite_stock" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.limite_stock" required  autocomplete="limite stock" />
                            <InputError class="mt-2" :message="form.errors.limite_stock" />
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
import SelectInput from '@/Components/SelectInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    //name: '',
    empresa_id: '',
    deposito_id: '',
    producto_id: '',
    cantidad: '',
    activo: '',
    limite_stock: ''
});
const props = defineProps({
    errors: { type: Object },
    empresas: {type:Object},
    depositos: {type:Object},
    productos: {type:Object}
})
</script>