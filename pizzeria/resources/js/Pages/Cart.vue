<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Upload" />

    <AuthenticatedLayout>
        <div class="py-12 class-bg">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg items-bg">
                    <div class="row">
                        <div class="col-12">
                            <CartViever/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>


</template>


<script>
import CartViever from '@/Components/CartViever.vue';

export default{
    components:{
        CartViever,
    }
}
</script>
<style>
.class-bg{
    background-image: url("storage/pizzas/p.jpg"); 
    min-height: 70vh;
}
.items-bg{
    background-image: url("storage/pizzas/i.webp"); 
}
</style>