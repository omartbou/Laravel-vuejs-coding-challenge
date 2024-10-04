<template>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
        <h1>Create Product</h1>
        <form @submit.prevent="submit">
            <div class="mb-3">

            <input type="text" v-model="name" placeholder="Product Name" required class="form-control"/>
            </div>
            <div class="mb-3">

            <textarea v-model="description" placeholder="Description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">

            <input type="number" v-model="price" placeholder="Price"class="form-control" required />
            </div>
            <div class="mb-3">

            <input type="file" @change="onFileChange"class="form-control" required />
            </div>
            <div class="mb-3">

            <select v-model="selectedCategories" class="form-select">
                <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.name }}
                </option>
            </select>
            </div>

            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
    </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        categories: Array,
    },
    setup(props) {
        const name = ref('');
        const description = ref('');
        const price = ref(0);
        const selectedCategories = ref([]);
        const image = ref(null);

        const onFileChange = (e) => {
            image.value = e.target.files[0];
        };

        const submit = () => {
            const formData = new FormData();
            formData.append('name', name.value);
            formData.append('description', description.value);
            formData.append('price', price.value);
            formData.append('image', image.value);
            formData.append('categories', selectedCategories.value);

            Inertia.post('/products', formData);
        };

        return { name, description, price, selectedCategories, onFileChange, submit };
    },
};
</script>
