<template>
    <Head title="Empresas" />

    <AuthenticatedLayout>
        <template #header>
            Empresas
        </template>
        <!-- v-if="hasPermission('empresas.create')"   v-if="$user->hasRole('empresas.create')"-->
                <div  class="mt-1 mb-1 grid justify-items-end p-1 border-b border-gray-200 ">
                    <Link :href="route('empresas.create')" 
                        class="px-1 py-1 bg-indigo-500 text-white border rounded-md "
                        >Nueva</Link
                    >            
                </div> 
            <div class="bg-white grid v-screen overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">#</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Empresa</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Acronimo</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">RIF</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="emp in empresas.data" :key="emp.id" class="text-gray-700">
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ emp.id }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ emp.name }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ emp.acronimo }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ emp.rif }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <Link :href="route('empresas.show', emp.id)" 
                                    class="px-4 py-2 bg-amber-400 text-white border rounded-md"
                                    >Mostrar</Link
                                >
                            </td>                       
                        </tr>
                    </tbody>
                </table>
            </div>
              <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                <pagination :links="empresas.links" />
            </div>  

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import Pagination from '@/Components/Pagination.vue'
//import { usePermission } from '@/Composable/Permission'

const props = defineProps({
    empresas: {type:Object}
});
const form = useForm({
    id:''
});
//const { hasPermission } = usePermission();
const deleteEmpresa = (id, name) => {
    // ahora no hare esto, necesito instalar sweetalert2
    alert("me quieren eliminar a mi " + name);
}
</script>