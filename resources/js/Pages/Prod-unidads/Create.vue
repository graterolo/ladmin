<template>
    <Head title="Nueva Unidad" />

    <AuthenticatedLayout>
        <template #header>
            Crear Unidad
        </template>
        <div  class="mt-1 mb-1 grid justify-items-end p-1 border-b border-gray-200 ">
            <Link :href="route('prod-unidads.index')" 
                class="px-1 py-1 bg-indigo-500 text-white border rounded-md "
                >Listado</Link
            >            
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="$event => form.post(route('prod-unidads.store'))" >
                  <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <InputLabel for="name" value="Nombre" />
                        <div class="mt-2">
                            <TextInput id="name" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.name" required autofocus autocomplete="name" />
                            <div v-if="errors.name" class="text-sm text-red-600">{{ errors.name }}</div>
                            <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
                        </div>
                    </div>    
                    <div class="sm:col-span-3">
                        <InputLabel for="descripcion" value="Descripción" />
                        <div class="mt-2">
                            <TextInput id="descripcion" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.descripcion" required autocomplete="descripcion" />
                            <InputError class="mt-2" :message="form.errors.descripcion" />
                        </div>
                    </div>    
                    <div class="sm:col-span-3">
                        <InputLabel for="Empresa" value="Empresa" />
                        <div class="mt-2">    
                            <SelectInput id="empresa_id" :options="empresas" type="text" v-model="form.empresa_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                            </SelectInput>
                            <InputError class="mt-2" :message="form.errors.empresa_id" />
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
    name: '',
    descripcion: '',
    empresa_id: ''
});
const props = defineProps({
    errors: { type: Object },
    empresas: {type:Object}
})
</script>