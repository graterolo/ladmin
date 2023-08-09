<template>
    <Head title="Productos Unidad" />

    <AuthenticatedLayout>
        <template #header>
            Unidades
        </template>
        <!-- v-if="hasPermission('empresas.create')"   v-if="$user->hasRole('empresas.create')"-->
                 <div  class="mt-1 mb-1 grid justify-items-end p-1 border-b border-gray-200 ">
                    <Link :href="route('prod-unidads.create')" 
                        class="px-1 py-1 bg-indigo-500 text-white border rounded-md "
                        >Nueva</Link
                    >            
                </div>  
                
            <div class="bg-white grid v-screen overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">#</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Nombre</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Empresa</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Fecha Creación</th>                            
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="(uni, index) in produnidads.data" :key="uni.id" class="text-gray-700">
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ index + 1 }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ uni.name }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ uni.empresa }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm"><LabelFecha>{{ uni.created_at }}</LabelFecha></td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                 <Link :href="route('prod-unidads.show', uni.id)" 
                                    class="px-4 py-2 bg-amber-400 text-white border rounded-md"
                                    >Mostrar</Link
                                > 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
              <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                <pagination :links="produnidads.links" />
            </div>  

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue'
import LabelFecha from '@/Components/LabelFecha.vue';
//import { usePermission } from '@/Composable/Permission'

const props = defineProps({
    produnidads: {type:Object}
});

//const { hasPermission } = usePermission();

</script>