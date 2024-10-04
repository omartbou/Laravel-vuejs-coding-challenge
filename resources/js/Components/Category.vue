<template>
    <div class="card">
        <div class="card-body d-flex justify-content-center">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle"   data-bs-toggle="dropdown" >
                    Filter By Category
                </button>
                <ul class="dropdown-menu" >
                    <li><a class="dropdown-item" href="#">All</a></li>
                    <li v-for="category in categories" :key="category.id">
                        <Link class="dropdown-item" :href="`/category/${category.id}/product`"> {{ category.name }}</Link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({

    categories: {
        type: Array,
        required : true,
    }
});
</script>
<style>
</style>
