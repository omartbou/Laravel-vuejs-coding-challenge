<template>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h1>Create Product</h1>
                        <form @submit.prevent="createProduct">
                            <div class="mb-3">
                                <input
                                    type="text"
                                    v-model="form.name"
                                    placeholder="Product Name"
                                    required
                                    class="form-control"
                                />
                            </div>
                            <div class="mb-3">
                                <textarea
                                    v-model="form.description"
                                    placeholder="Description"
                                    class="form-control"
                                    required
                                ></textarea>
                            </div>
                            <div class="mb-3">
                                <input
                                    type="number"
                                    v-model="form.price"
                                    placeholder="Price"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <input
                                    type="file"
                                    @change="onFileChange"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <select
                                    v-model="form.selectedCategories"
                                    class="form-select"
                                    multiple
                                >
                                    <option
                                        v-for="category in categories"
                                        :key="category.id"
                                        :value="category.id"
                                    >
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

<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';

// Define props for the component
const props = defineProps({
    categories: {
        type: Array,
        required: true,
    },
});

// Initialize the form using Inertia's useForm
const form = useForm({
    name: '',
    description: '',
    price: '',
    selectedCategories: [],
    image: null,
});

// Function to handle file input change
const onFileChange = (event) => {
    form.image = event.target.files[0]; // Get the first file
};

// Function to submit the form
const createProduct = () => {
    const formData = new FormData();
    formData.append('name', form.name);
    formData.append('description', form.description);
    formData.append('price', form.price);
    formData.append('image', form.image);
    form.selectedCategories.forEach(id => formData.append('categories[]', id)); // Add categories

    form.post('/products/store', { data: formData });
};
</script>

<style>
/* Add any necessary styles here */
</style>
