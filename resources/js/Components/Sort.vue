<template>
    <div class="card my-3">
        <div class="card-body d-flex justify-content-center">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle"   data-bs-toggle="dropdown" >
                    Sort By
                </button>
                <ul class="dropdown-menu" >

                    <li>
                        <Link class="dropdown-item" :href="route('products.index', { column: 'price', direction: 'asc' })">
                            Price Ascending <i class="fas fa-arrow-up"></i>
                        </Link>
                    </li>
                    <li>
                        <Link class="dropdown-item" :href="route('products.index', { column: 'price', direction: 'desc' })">
                            Price Descending <i class="fas fa-arrow-down"></i>
                        </Link>
                    </li>
                    <li>
                        <Link class="dropdown-item" :href="route('products.index', { column: 'name', direction: 'asc' })">
                            Name Ascending <i class="fas fa-arrow-up"></i>
                        </Link>
                    </li>
                    <li>
                        <Link class="dropdown-item" :href="route('products.index', { column: 'name', direction: 'desc' })">
                            Name Descending <i class="fas fa-arrow-down"></i>
                        </Link>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'

</script>
<style>
</style>
