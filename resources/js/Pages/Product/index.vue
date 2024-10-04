<template>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-4">Product List</h2>
                    </div>

                    <div v-for="product in products.data" :key="product.id" class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img :src="`${product.image}`" alt="Product Image" class="card-img-top img-fluid" />
                            <div class="card-body">
                                <h5 class="card-title">{{ product.name }}</h5>
                                <p class="card-text">Price: {{ product.price }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="pagination mt-4">
                    <li v-for="(link, index) in products.links" :key="index" :class="`page-item ${link.active ? 'active' : ''}`">
                        <Link
                            v-if="link.url !== null"
                            class="page-link"
                            :href="link.url"
                            v-dompurify-html="link.label"
                        >
                            {{ link.label }}
                        </Link>
                        <div v-else class="page-link" v-dompurify-html="link.label">
                            {{ link.label }}
                        </div>
                    </li>
                </ul>
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
    products: {
        type: Object,
        required: true
    },
    categories: {
        type: Array,
        required: true,
    },

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
