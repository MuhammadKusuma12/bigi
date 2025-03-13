<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head,Link } from '@inertiajs/vue3';
    defineProps({
        illustrations : Array
    });
</script>

<template>
    <Head>
        <title>Illustrations</title>
    </Head>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Look at these badass illustrations:
                        <li v-for="illustration in illustrations">
                            <p class="text-4xl">
                                {{ illustration.title }}
                            </p>
                            <p>
                                <img src="https://picsum.photos/400" alt="image missing">
                                Caption: {{ illustration.caption }}
                            </p>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>