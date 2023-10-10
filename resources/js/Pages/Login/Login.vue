<script setup>
import { ref, computed, Transition } from 'vue';
import AccountLogin from './comp/AccountLogin.vue';
import Register from './comp/Register.vue';

const props = defineProps(['errors']);

const accessedFrom = ref('');

const toggleCard = ref(true);
const toggleTitle = computed(() => {
    return toggleCard.value ? 'Login' : 'Register';
})

const showErrors = computed(() => {
    return {
        tab: accessedFrom.value,
        ...props.errors
    }
});
</script>

<template class="bg-slate-700">
    <Head>
        <title>{{ toggleTitle }}</title>
    </Head>
    <div class="w-screen h-screen flex flex-col gap-y-8 justify-center items-center bg-pattern">
        <div class="flex flex-col justify-center items-center gap-y-2">
            <h1 class="mt-2 text-4xl font-bold text-white">
                nawt!
            </h1>
            <p class="text-white leading-none">
             Your thoughts? secured. nawt! exposed.
            </p>
        </div>
        <Transition mode="out-in">
            <AccountLogin :toggle="() => toggleCard = false" :error="showErrors" @accessed-from="(value) => accessedFrom = value" v-if="toggleCard" />
            <Register :toggle="() => toggleCard = true" :error="showErrors" @accessed-from="(value) => accessedFrom = value" v-else />
        </Transition>
    </div>
</template>

<style lang="postcss">
.bg-pattern {
    background:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='100%25' width='100%25'%3E%3Cdefs%3E%3Cpattern id='doodad' width='23.09' height='40' viewBox='0 0 34.64101615137755 60' patternUnits='userSpaceOnUse' patternTransform='rotate(135)'%3E%3Crect width='100%25' height='100%25' fill='rgba(45, 55, 72,1)'/%3E%3Cpath d='M36.37 39L36.37 41L32.91 39L34.64 38L34.64 42L32.91 41L34.64 40z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M19.05 49L19.05 51L15.59 49L17.32 48L17.32 52L15.59 51L17.32 50z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M1.73 39L1.73 41L-1.73 39L0 38L0 42L-1.73 41L0 40z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M1.73 19L1.73 21L-1.73 19L0 18L0 22L-1.73 21L0 20z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M19.05 9L19.05 11L15.59 9L17.32 8L17.32 12L15.59 11L17.32 10z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M36.37 19L36.37 21L32.91 19L34.64 18L34.64 22L32.91 21L34.64 20z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M34.64 41L35.51 40.5L33.77 39.5L33.77 40.5L35.51 39.5L34.64 39L34.64 40z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M17.32 51L18.19 50.5L16.45 49.5L16.45 50.5L18.19 49.5L17.32 49L17.32 50z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M0 41L0.87 40.5L-0.87 39.5L-0.87 40.5L0.87 39.5L0 39L0 40z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M0 21L0.87 20.5L-0.87 19.5L-0.87 20.5L0.87 19.5L0 19L0 20z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M17.32 11L18.19 10.5L16.45 9.5L16.45 10.5L18.19 9.5L17.32 9L17.32 10z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M34.64 21L35.51 20.5L33.77 19.5L33.77 20.5L35.51 19.5L34.64 19L34.64 20z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M17.32 30L17.32 30L17.32 30L17.32 30L17.32 30L17.32 30L17.32 30z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23doodad)' height='200%25' width='200%25'/%3E%3C/svg%3E ")
}

.v-enter-active,
.v-leave-active {
    @apply transition-all opacity-100 scale-100 translate-x-0 duration-300;
}


.v-enter-from {
    @apply opacity-0 translate-x-48 scale-110 ease-out;
}

.v-leave-to {
    @apply opacity-0 -translate-x-48 scale-90 ease-in duration-[400ms];
}
</style>