<template>
    <Head title="Editar Producto" />

    <AuthenticatedLayout>
        <template #header>
            Editar Producto
        </template>
        <div  class="mt-1 mb-1 grid justify-items-end p-1 border-b border-gray-200 ">
            <Link :href="route('productos.index')" 
                class="px-1 py-1 bg-indigo-500 text-white border rounded-md "
                >Listado</Link
            >            
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                
                <form @submit.prevent="submitForm">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <InputLabel for="name" value="Nombre" />
                        <div class="mt-2">
                            <TextInput id="name" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.name" required autofocus autocomplete="nombre" />
                            <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
                            <div v-if="errors.name" class="text-sm text-red-600">{{ errors.name }}</div>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <InputLabel for="serial" value="Serial" />
                        <div class="mt-2">
                            <TextInput id="serial" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.serial" required  autocomplete="serial" />
                            <InputError class="mt-2" :message="form.errors.serial" />
                        </div>
                    </div>
                  
                   <!-- <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">  -->
                    <div class="sm:col-span-3">
                        <InputLabel for="categoria_id" value="Categoria" />
                        <div class="mt-2">
                            <SelectInput id="categoria_id" :options="categorias" type="text" v-model="form.categoria_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                            </SelectInput>
                            <InputError class="mt-2" :message="form.errors.categoria_id" />
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <InputLabel for="unidad_id" value="Unidad" />
                        <div class="mt-2">
                            <SelectInput id="unidad_id" :options="unidads" type="text" v-model="form.unidad_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                            </SelectInput>
                            <InputError class="mt-2" :message="form.errors.unidad_id" />
                        </div>
                    </div>
                   <!-- </div> -->
                   <!-- <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">  -->
                    <div class="sm:col-span-3">
                        <InputLabel for="marca_id" value="Marca" />
                        <div class="mt-2">
                            <SelectInput id="marca_id" :options="marcas" type="text" v-model="form.marca_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                            </SelectInput>
                            <InputError class="mt-2" :message="form.errors.marca_id" />
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
                    <!-- </div> -->

                    <div class="sm:col-span-2 sm:col-start-1">
                        <InputLabel for="costo" value="Costo" />
                        <div class="mt-2">
                            <TextInput id="costo" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.costo" required  autocomplete="costo" />
                            <InputError class="mt-2" :message="form.errors.costo" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <InputLabel for="utilidad1" value="Utilidad 1" />
                        <div class="mt-2">
                            <TextInput id="utilidad1" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.utilidad1" required  autocomplete="utilidad1" />
                            <InputError class="mt-2" :message="form.errors.utilidad1" />
                        </div>    
                    </div>
                    <div class="sm:col-span-2">
                        <InputLabel for="utilidad2" value="Utilidad 2" />
                        <div class="mt-2">
                            <TextInput id="utilidad2" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.utilidad2" required  autocomplete="utilidad2" />
                            <InputError class="mt-2" :message="form.errors.utilidad2" />
                        </div>
                    </div>
                
                    <div class="sm:col-span-2 sm:col-start-1">
                        <InputLabel for="utilidad3" value="Utilidad 3" />
                        <div class="mt-2">
                            <TextInput id="utilidad3" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.utilidad3" required  autocomplete="utilidad3" />
                            <InputError class="mt-2" :message="form.errors.utilidad3" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <InputLabel for="utilidad4" value="Utilidad 4" />
                        <div class="mt-2">
                            <TextInput id="utilidad4" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.utilidad4" required  autocomplete="utilidad4" />
                            <InputError class="mt-2" :message="form.errors.utilidad4" />
                        </div>    
                    </div>
                    <div class="sm:col-span-2">
                        <InputLabel for="precio1" value="Precio 1" />
                        <div class="mt-2">
                            <TextInput id="precio1" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.precio1" required  autocomplete="precio1" />
                            <InputError class="mt-2" :message="form.errors.precio1" />
                        </div>    
                    </div>
                    <div class="sm:col-span-2 sm:col-start-1">
                        <InputLabel for="precio2" value="Precio 2" />
                        <div class="mt-2">
                            <TextInput id="precio2" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.precio2" required  autocomplete="precio2" />
                            <InputError class="mt-2" :message="form.errors.precio" />
                        </div>    
                    </div>
                    <div class="sm:col-span-2">
                        <InputLabel for="precio3" value="Precio 3" />
                        <div class="mt-2">
                            <TextInput id="precio3" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.precio3" required  autocomplete="precio3" />
                            <InputError class="mt-2" :message="form.errors.precio" />
                        </div>    
                    </div>
                    <div class="sm:col-span-2">
                        <InputLabel for="precio4" value="Precio 4" />
                        <div class="mt-2">
                            <TextInput id="precio4" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" v-model="form.precio4" required  autocomplete="precio4" />
                            <InputError class="mt-2" :message="form.errors.precio" />
                        </div>    
                    </div>
                    <div class="sm:col-span-3">
                        <InputLabel for="exento" value="Exento?" />
                        <div class="mt-2">
                            <select id="exento" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" v-model="form.exento" required>
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.exento" />
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
                            <SelectInput id="empresa_id" :options="empresas" type="text" v-model="form.empresa_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                            </SelectInput>
                            <InputError class="mt-2" :message="form.errors.empresa_id" />
                        </div>    
                    </div>
                    <!-- id="url_img" -->
                    <div class="sm:col-span-3">
                        <div class="mt-2">
                            <img class="h-13 w-13 flex-none bg-gray-50" :src="form.url_img" alt=""/>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                         <InputLabel for="imagen" value="Imágen" />
                         <div class="mt-2">
                            <input type="file" @input="form.imagen = $event.target.files[0]"  class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100
                            "/>
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>
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
import { router } from '@inertiajs/vue3';



const form = useForm({
    name: props.producto.name,
    serial: props.producto.serial,
    categoria_id: props.producto.categoria_id,
    unidad_id: props.producto.unidad_id,
    marca_id: props.producto.marca_id,
    activo: props.producto.activo,
    costo: props.producto.costo,
    utilidad1: props.producto.utilidad1,
    utilidad2: props.producto.utilidad2,
    utilidad3: props.producto.utilidad3,
    utilidad4: props.producto.utilidad4,
    precio1: props.producto.precio1,
    precio2: props.producto.precio2,
    precio3: props.producto.precio3,
    precio4: props.producto.precio4,
    exento: props.producto.exento,
    descripcion: props.producto.descripcion,
    empresa_id:props.producto.empresa_id,
    url_img: props.producto.url_img,
    imagen: null
});
const props = defineProps({
    errors: { type: Object },
    producto: {type:Object},
    empresas: {type:Object},
    categorias: {type:Object},
    unidads: {type:Object},
    marcas: {type:Object},
    image: String

});
function submitForm() {
    router.post(`/productos/${props.producto.id}`, {
        _method: 'put',
        name: form.name,
        serial: form.serial,
        categoria_id: form.categoria_id,
        unidad_id: form.unidad_id,
        marca_id: form.marca_id,
        activo: form.activo,
        costo: form.costo,
        utilidad1: form.utilidad1,
        utilidad2: form.utilidad2,
        utilidad3: form.utilidad3,
        utilidad4: form.utilidad4,
        precio1: form.precio1,
        precio2: form.precio2,
        precio3: form.precio3,
        precio4: form.precio4,
        exento: form.exento,
        descripcion: form.descripcion,
        empresa_id:form.empresa_id,
        url_img:form.url_img,
        imagen:form.imagen

    });
}
</script>