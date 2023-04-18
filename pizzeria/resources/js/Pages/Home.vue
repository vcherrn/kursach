<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Главная" />
    <AuthenticatedLayout>
        <div class="py-12 class-bg">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <div class="p-6 text-gray-900">
                        <MenuViever/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<script>
 import MenuViever from '@/Components/MenuViever.vue'

export default {
components: {
     MenuViever
}
}
</script>

<style>
.class-bg{
    background-image: url("storage/pizzas/p.jpg"); 
}
</style>