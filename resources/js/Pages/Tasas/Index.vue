<template>
    <Head title="Tasa de Cambio" />

    <AuthenticatedLayout>
        <template #header>
            Tasa de Cambio
        </template>
        <div  class=" grid justify-items-end  border-b border-gray-200 ">
                    <Link :href="route('tasas.create')" 
                        class="px-1 py-1 bg-indigo-500 text-white border rounded-md "
                        >Nueva</Link
                    >            
        </div>  

        <!-- <div class="py-12">
            <div class=" bg-white max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ul role="list" class="divide-y divide-gray-200">
  <li class="flex justify-between gap-x-6 py-5">
    <div class="flex gap-x-4">
      <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      <div class="min-w-0 flex-auto">
        <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
        <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
      </div>
    </div>
    <div class="hidden sm:flex sm:flex-col sm:items-end">
      <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
      <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
    </div>
  </li>
  <li class="flex justify-between gap-x-6 py-5">
    <div class="flex gap-x-4">
      <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      <div class="min-w-0 flex-auto">
        <p class="text-sm font-semibold leading-6 text-gray-900">Michael Foster</p>
        <p class="mt-1 truncate text-xs leading-5 text-gray-500">michael.foster@example.com</p>
      </div>
    </div>
    <div class="hidden sm:flex sm:flex-col sm:items-end">
      <p class="text-sm leading-6 text-gray-900">Co-Founder / CTO</p>
      <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
    </div>
  </li>
  <li class="flex justify-between gap-x-6 py-5">
    <div class="flex gap-x-4">
      <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      <div class="min-w-0 flex-auto">
        <p class="text-sm font-semibold leading-6 text-gray-900">Dries Vincent</p>
        <p class="mt-1 truncate text-xs leading-5 text-gray-500">dries.vincent@example.com</p>
      </div>
    </div>
    <div class="hidden sm:flex sm:flex-col sm:items-end">
      <p class="text-sm leading-6 text-gray-900">Business Relations</p>
      <div class="mt-1 flex items-center gap-x-1.5">
        <div class="flex-none rounded-full bg-emerald-500/20 p-1">
          <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
        </div>
        <p class="text-xs leading-5 text-gray-500">Online</p>
      </div>
    </div>
  </li>
  <li class="flex justify-between gap-x-6 py-5">
    <div class="flex gap-x-4">
      <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      <div class="min-w-0 flex-auto">
        <p class="text-sm font-semibold leading-6 text-gray-900">Lindsay Walton</p>
        <p class="mt-1 truncate text-xs leading-5 text-gray-500">lindsay.walton@example.com</p>
      </div>
    </div>
    <div class="hidden sm:flex sm:flex-col sm:items-end">
      <p class="text-sm leading-6 text-gray-900">Front-end Developer</p>
      <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
    </div>
  </li>
</ul>

            </div>

        </div> -->

        <!-- v-if="hasPermission('empresas.create')"   v-if="$user->hasRole('empresas.create')"-->
                 
                
            <div class="bg-white grid v-screen overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">#</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Tasa</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Valor</th>                            
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Empresa</th>
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Fecha Creación</th>                            
                            <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="(tas, index) in tasas.data" :key="tas.id" class="text-gray-700">
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ index + 1 }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ tas.name }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ tas.valor }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ tas.empresa }}</td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm"><LabelFecha>{{ uni.created_at }}</LabelFecha></td>
                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ tas.usuario }}</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
              <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                <pagination :links="tasas.links" />
            </div>  

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue'
import LabelFecha from '@/Components/LabelFecha.vue';
//import { usePermission } from '@/Composable/Permission'

const props = defineProps({
    tasas: {type:Object}
    
});
const form = useForm({
    id:''
});
//const { hasPermission } = usePermission();
const deleteTasa = (id, name) => {
    // ahora no hare esto, necesito instalar sweetalert2
    alert("me quieren eliminar a mi " + name);
}
</script>