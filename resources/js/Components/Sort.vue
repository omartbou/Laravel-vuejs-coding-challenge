<template>
    <div class="card my-3">
        <div class="card-body d-flex justify-content-center">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle"   data-bs-toggle="dropdown" >
                    Sort By
                </button>
                <ul class="dropdown-menu" >

                    <li>
                        <Link class="dropdown-item" :href="`/price/asc/`">Price Ascending</Link>
                    </li>
                    <li>
                        <Link class="dropdown-item" :href="`/price/desc/`">Price Descending</Link>
                    </li>
                    <li>
                        <Link class="dropdown-item" :href="`/name/asc/`">Name Ascending</Link>
                    </li>
                    <li>
                        <Link class="dropdown-item" :href="`/name/desc/`">Name Descending</Link>
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
