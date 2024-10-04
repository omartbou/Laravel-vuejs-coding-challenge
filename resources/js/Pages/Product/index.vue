<template>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-9">

                <div class="card">
                    <div class="card-body">

                                <div v-for="product in products.data" :key="product.id">
                                    <img :src="`/storage/${product.image}`" alt="Product Image" class="img-fluid" />
                                    <p>{{ product.name }}</p>
                                    <p>{{ product.price }}</p>

                                </div>

                        <ul class="pagination">
                                <li :class="`page-item ${link.active ? 'active' : ''}`" v-for="(link,index) in products.links" :key="index">
                                    <Link
                                        v-if="link.url !==null"
                                        class="page-link" :href="link.url" v-dompurify-html="link.label">{{ link.label }}</Link>
                                    <div v-else
                                         class="page-link"
                                         v-dompurify-html="link.label">{{ link.label }}</div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <Category :categories="categories"/>
                <Sort :order="order"/>

            </div>
        </div>
    </div>

</template>
<script setup>
import { Link } from '@inertiajs/vue3'
import Category from '@/Components/Category.vue'
import Sort from '@/Components/Sort.vue'

const props = defineProps({
    products:{
        type: Object,
        required : true
    },
    categories: {
        type: Array,
        required : true,
    }
});

</script>
<style>
.product-item {
    margin-bottom: 20px;
}
.product-item img {
    max-width: 100%;
    height: auto;
}
</style>
