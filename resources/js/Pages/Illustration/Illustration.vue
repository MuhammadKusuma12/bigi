<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head,Link } from '@inertiajs/vue3';
    const props = defineProps({
        illustrations : Array
    });
    console.log(props.illustrations);
</script>

<template>
    <Head>
        <title>Illustrations</title>
    </Head>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="lg:px-8 max-w-7xl mx-auto sm:px-6">
                <div
                    class="bg-white shadow-sm dark:bg-gray-800 overflow-hidden sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Look at these badass illustrations:
                        <li v-for="illustration in illustrations">
                            <p class="text-4xl">
                                {{ illustration.title }}
                            </p>
                            <p>
                                <!-- Relationship has to be eager loaded, its more efficient -->
                                <li v-for="art in illustration.arts">
                                    <img :src="'/storage/'+art.image" alt="image missing"> 
                                </li>
                                Caption: {{ illustration.caption }}
                            </p>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>