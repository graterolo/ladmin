<template>
    <Head title="Producto" />

    <AuthenticatedLayout>
        <template #header>
            Producto
        </template>
        <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-row space-x-2 mb-2 justify-end">
                <DangerButton @click="$event => deleteProducto(producto.id, producto.name)">
                    Eliminar
                </DangerButton>           

                <Link :href="route('productos.edit', producto.id)" 
                    class="inline-flex items-right px-4 py-2 gap-0.5 bg-amber-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >Editar</Link
                >

                <Link :href="route('productos.index')" 
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
                        <textarea name="name" id="name" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.name }}</textarea>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <div class="mt-2">
                        <InputLabel for="serial" value="Serial" />
                        <textarea name="serial" id="serial" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.serial }}</textarea>
                    </div>
                </div>    
                <div class="sm:col-span-3">
                    <div class="mt-2">
                        <InputLabel for="categoria_id" value="Categoria" />
                        <textarea name="categoria_id" id="categoria_id" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ categoria.name }}</textarea>
                    </div>
                </div>    
                <div class="sm:col-span-3">    
                    <div class="mt-2">
                        <InputLabel for="unidad_id" value="Unidad" />
                        <textarea name="unidad_id" id="unidad_id" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ unidad.name }}</textarea>
                    </div>
                </div>    
                <div class="sm:col-span-3">
                    <div class="mt-2">
                        <InputLabel for="marca_id" value="Marca" />
                        <textarea name="marca_id" id="marca_id" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ marca.name }}</textarea>
                    </div>
                </div>    
                <div class="sm:col-span-3">
                    <div class="mt-2">
                        <InputLabel for="activo" value="Activo?" />
                        <textarea name="activo" id="activo" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-if=" producto.activo==1">Si</textarea>
                        <textarea name="activo" id="activo" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-else>No</textarea>
                    </div>
                </div> 
                <div class="sm:col-span-2 sm:col-start-1">   
                    <div class="mt-2">
                        <InputLabel for="costo" value="Costo" />
                        <textarea name="costo" id="costo" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.costo }}</textarea>
                    </div>
                </div> 
                <div class="sm:col-span-2"> 
                    <div class="mt-2">
                        <InputLabel for="utilidad1" value="Utilidad 1" />
                        <textarea name="utilidad1" id="utilidad1" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.utilidad1 }}</textarea>
                    </div>
                </div>      
                <div class="sm:col-span-2">    
                    <div class="mt-2">
                        <InputLabel for="utilidad2" value="Utilidad 2" />
                        <textarea name="utilidad2" id="utilidad2" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.utilidad2 }}</textarea>
                    </div>
                </div>
                <div class="sm:col-span-2 sm:col-start-1">
                    <div class="mt-2">
                        <InputLabel for="utilidad3" value="Utilidad 3" />
                        <textarea name="utilidad3" id="utilidad3" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.utilidad3 }}</textarea>
                    </div>
                </div>
                <div class="sm:col-span-2">    
                    <div class="mt-2">
                        <InputLabel for="utilidad4" value="Utilidad 4" />
                        <textarea name="utilidad4" id="utilidad4" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.utilidad4 }}</textarea>
                    </div>
                </div>
                <div class="sm:col-span-2">   
                    <div class="mt-2">
                        <InputLabel for="precio1" value="Precio 1" />
                        <textarea name="precio1" id="precio1" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.precio1 }}</textarea>
                    </div>
                </div>
                <div class="sm:col-span-2 sm:col-start-1">
                    <div class="mt-2">
                        <InputLabel for="precio2" value="Precio 2" />
                        <textarea name="precio2" id="precio2" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.precio2 }}</textarea>
                    </div>
                </div>    
                <div class="sm:col-span-2">    
                    <div class="mt-2">
                        <InputLabel for="precio3" value="Precio 3" />
                        <textarea name="precio3" id="precio3" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.precio3 }}</textarea>
                    </div>
                </div>    
                <div class="sm:col-span-2">  
                    <div class="mt-2">
                        <InputLabel for="precio4" value="Precio 4" />
                        <textarea name="precio4" id="precio4" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.precio4 }}</textarea>
                    </div>
                </div>   
                <div class="sm:col-span-3"> 
                    <div class="mt-2">
                        <InputLabel for="exento" value="Exento?" />
                        <textarea name="exento" id="exento" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-if=" producto.exento==1">Si</textarea>
                        <textarea name="exento" id="exento" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-else>No</textarea>
                    </div>
                </div>
                <div class="sm:col-span-3">     
                    <div class="mt-2">
                        <InputLabel for="url_img" value="Imágen" />
                        <img class="h-13 w-13 flex-none bg-gray-50" :src="producto.url_img" alt=""/>
                    </div>
                </div>
                <div class="sm:col-span-3"> 
                    <div class="mt-3">
                        <InputLabel for="descripcion" value="Descripción" />
                        <textarea name="descripcion" id="descripcion" rows="2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ producto.descripcion }}</textarea>
                    </div>
                </div>
                <div class="sm:col-span-3"> 
                    <div class="mt-3">
                        <InputLabel for="Empresa" value="Empresa" />
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
import InputLabel from '@/Components/InputLabel.vue';
import { Head, Link } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';


const props = defineProps({
    producto: {type:Object},
    empresa: {type:Object},
    categoria: {type:Object},
    unidad: {type:Object},
    marca: {type:Object},
});
const deleteProducto = (id, name) => {
    // ahora no hare esto, necesito instalar sweetalert2
    alert("me quieren eliminar a mi " + name);
}
</script>