<template>
    <Head title=" Inventario" />

    <AuthenticatedLayout>
        <template #header>
             Inventario
        </template>
        <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-row space-x-2 mb-2 justify-end">
                <DangerButton @click="$event => deleteInventario(inv.id, producto.name)">
                    Eliminar
                </DangerButton>           

                <Link :href="route('inventarios.edit', inventario.id)" 
                    class="inline-flex items-right px-4 py-2 gap-0.5 bg-amber-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Editar</Link
                >

                <Link :href="route('inventarios.index')" 
                    class="inline-flex items-right px-4 py-2 gap-0.5 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Listado</Link
                >            
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                  <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                     <div class="sm:col-span-3">
                        <InputLabel for="empresa" value="Empresa" />
                        <div class="mt-2">
                            <textarea name="empresa" id="empresa" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ empresa.name }}</textarea>
                        </div>
                    </div>    
                   <div class="sm:col-span-3">
                        <InputLabel for="deposito" value="Depósito" />
                        <div class="mt-2">
                            <textarea name="deposito" id="deposito" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ deposito.name }}</textarea>
                        </div>
                    </div>   
                    <div class="sm:col-span-3">
                        <InputLabel for="producto" value="Producto" />
                        <div class="mt-2">
                            <textarea name="producto" id="producto" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.name }}</textarea>
                        </div>
                    </div>    
                    <div class="sm:col-span-3">
                        <InputLabel for="cantidad" value="Cantidad" />
                        <div class="mt-2">
                            <textarea name="cantidad" id="cantidad" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ inventario.cantidad }}</textarea>
                        </div>
                    </div>    
                    <div class="sm:col-span-3">
                        <InputLabel for="activo" value="Activo?" />
                        <div class="mt-2">
                            <textarea name="activo" id="activo" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-if=" inventario.activo==1">Si</textarea>
                        <textarea name="activo" id="activo" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-else>No</textarea>
                        </div>
                    </div>   
                        <div class="sm:col-span-3">
                        <InputLabel for="limite_stock" value="Limite Stock" />
                        <div class="mt-2">
                            <textarea name="limite_stock" id="limite_stock" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ inventario.limite_stock }}</textarea>
                        </div>
                    </div>    
                  </div>
                                    
            </div>
        </div>
        <div v-if="dets">
        <div class="m-2 p-2 text-lg font-semibold">Detalles de Inventario</div>
        <div class="bg-white my-2 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">#</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Fecha Venc.</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Lote</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="(det, index) in dets.data" :key="det.id" class="text-gray-700">
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ index + 1 }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ det.fvence }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ det.lote }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ det.cantidad }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                <pagination :links="dets.links" />
            </div>
            </div>
        </div>  
    </div>     
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputLabel from '@/Components/InputLabel.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

const props = defineProps({
    inventario: {type:Object},
    empresa: {type:Object},
    deposito: {type:Object},
    producto: {type:Object},
    dets: {type:Object}
});
const form = useForm({
    id:''
});
const deleteInventario = (id, name) => {
    // ahora no hare esto, necesito instalar sweetalert2
    alert("me quieren eliminar a mi " + name);
}
</script>