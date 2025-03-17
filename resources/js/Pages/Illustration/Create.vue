<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import { Head, useForm } from '@inertiajs/vue3';

    const illpost = useForm({
        title: null,
        caption: null,
        image: null,    
    });

    const upload = () => {
        alert(illpost.image);
        illpost.post(route('illustration.store'), {preserveState:true,});
    };
</script>

<template>
    <Head>
        <title>New illustration</title>
    </Head>
    <GuestLayout>
        <form @submit.prevent="upload">
            <div class="grid grid-cols-1 gap-5 justify-items-center">
                <h1 class="text-white text-4xl">New illustration post</h1>
                <div>
                    <label for="title" class="text-white mr-5">Title</label>
                    <input v-model="illpost.title" type="text" name="title" id="title" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <small>{{ illpost.errors.title }}</small>
                </div>
                <div>
                    <label for="image" class="text-white mr-5">Illustration</label>
                    <input v-on:change="illpost.image" type="file" @input="illpost.image = $event.target.files[0]" name="image" id="image" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="caption" class="text-white mr-5">Caption</label>
                    <textarea v-model="illpost.caption" name="caption" id="caption"></textarea>
                    <small>{{ illpost.errors.caption }}</small>
                </div>
                <button :disabled="illpost.processing" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Post dat shit!
                </button>
            </div>
        </form>
    </GuestLayout>
</template>