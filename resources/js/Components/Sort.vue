<template>
    <div class="card my-3">
        <div class="card-body d-flex justify-content-center">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle"   data-bs-toggle="dropdown" >
                    Order By
                </button>
                <ul class="dropdown-menu" >
                    <li >
                        <Link class="dropdown-item" href="/order/id/asc/tasks"> ID <i class="fas fa-arrow-up"></i></Link>
                    </li>
                    <li >
                        <Link class="dropdown-item" href="/order/id/desc/tasks"> ID <i class="fas fa-arrow-down"></i></Link>
                    </li>
                    <li >
                        <Link class="dropdown-item"  href="/order/title/asc/tasks"> Title A-Z</Link>
                    </li>
                    <li >
                        <Link class="dropdown-item"  href="/order/title/desc/tasks"> Title Z-A</Link>
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
