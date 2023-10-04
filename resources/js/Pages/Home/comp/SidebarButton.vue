<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <li>
        <!-- bg-base text-secondary fill-secondary -->
        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-md bg-primary text-white fill-white hover:bg-light" 
            href="javascript:;">
            <slot></slot>
        </a>
    </li>
</template>