<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Upload" />

    <AuthenticatedLayout>
        <div class="py-14 class-bg">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row">
                        <div class="col-12">
                            <OrderFinal/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>


</template>


<script>
import OrderFinal from '@/Components/OrderFinal.vue';

export default{
    components:{
        OrderFinal,
    }
}
</script>

<style>
.class-bg{
    background-image: url("storage/pizzas/p.jpg"); 
    min-height: 70vh;
}
</style>