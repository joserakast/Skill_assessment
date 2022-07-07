<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="m-4">
                        <h1 class="font-bold">Project created with:</h1>
                        <ul>
                            <li>PHP - Laravel</li>
                            <li>Mysql</li>
                            <li>Jetstream</li>
                            <li>Vue.js</li>
                            <li>Javascript</li>
                            <li>Tailwind</li>
                            <li>Inertia</li>
                        </ul>
                        <br>
                        <hr>
                        <p><span class="font-bold"> Developer: </span>Jose Castillo</p>
                        <p><span class="font-bold"> Email: </span>joserakast@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
