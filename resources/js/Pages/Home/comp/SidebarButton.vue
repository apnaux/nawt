<script setup>
import { Link } from '@inertiajs/vue3';
defineProps(['link', 'method']);
</script>

<template>
    <li>
        <!-- bg-base text-secondary fill-secondary -->
        <Link as="a" :href="link" :method="method" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-md bg-primary text-white fill-white cursor-pointer hover:bg-light">
            <slot></slot>
        </Link>
    </li>
</template>