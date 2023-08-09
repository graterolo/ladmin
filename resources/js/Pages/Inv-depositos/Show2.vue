<template>
    <Head title="Depósito" />

    <AuthenticatedLayout>
        <template #header>
            Depósito
        </template>
        <div  class="mt-2 mb-2 grid justify-items-end p-2 border-b border-gray-200 ">
                    <Link :href="route('inv-depositos.index')" 
                        class="px-2 py-2 bg-indigo-500 text-white border rounded-md "
                        >Add</Link
                    >            
        </div>    

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <!-- <form  > -->
                    <div>
                        <InputLabel for="name" value="Nombre" />
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required readonly  />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div>
                        <InputLabel for="acronimo" value="Acrónimo" />
                        <TextInput id="acronimo" type="text" class="mt-1 block w-full" v-model="form.acronimo" readonly   />
                        <InputError class="mt-2" :message="form.errors.acronimo" />
                    </div>
                    <div>
                        <InputLabel for="tipo" value="Tipo" />
                        <select id="tipo" class="mt-1 block w-full" v-model="form.tipo" readonly>
                            <option value="0">Depósito</option>
                            <option value="1">Ventas</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.tipo" />
                    </div>
                    <div>
                        <InputLabel for="condicion" value="Condición" />
                        <select id="condicion" class="mt-1 block w-full" v-model="form.condicion" readonly>
                            <option value="0">Interno</option>
                            <option value="1">Externo</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.condicion" />
                    </div>
                    <div>
                        <InputLabel for="descripcion" value="Descripción" />
                        <TextInput id="descripcion" type="text" class="mt-1 block w-full" v-model="form.descripcion" readonly  />
                        <InputError class="mt-2" :message="form.errors.descripcion" />
                    </div>
                    <div >
                        <InputLabel for="Empresa" value="Empresa" />
                        <SelectInput id="empresa_id" :options="empresas" type="text" v-model="form.empresa_id" class="mt-1 block w-full" readonly>
                        </SelectInput> 
                        <InputError class="mt-2" :message="form.errors.empresa" />
                    </div>

                                   
                <!-- </form> -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SelectInput from '@/Components/SelectInput.vue';
//import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';


const props = defineProps({ 
    invdeposito: {type:Object},
    empresas: {type:Object}
});
const form = useForm({
    name: props.invdeposito.name,
    acronimo: props.invdeposito.acronimo,
    tipo: props.invdeposito.tipo,
    condicion: props.invdeposito.condicion,
    descripcion: props.invdeposito.descripcion,
    empresa_id:props.invdeposito.empresa_id
});
// const listado = () => {
//     // ahora no hare esto, necesito instalar sweetalert2
//     href="route('inv-depositos.index')";
// }
</script>