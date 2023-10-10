<script setup>
import { useForm } from '@inertiajs/vue3';
defineProps(['error']);

const form = useForm({
    'display_name': ''
});

const submit = () => {
    form.post('/firstrun', { preserveState: true });
}
</script>

<template>
    <Head>
        <title>{{ toggleTitle }}</title>
    </Head>
    <div class="w-screen h-screen flex flex-col gap-y-8 justify-center items-center bg-pattern">
        <div class="flex flex-col justify-center items-center gap-y-2">
            <h1 class="mt-2 text-2xl font-medium text-white">
                Oops.. we forgot something..
            </h1>
            <p class="text-white leading-none">
                We need your display name too! 😊
            </p>
        </div>
        <div class="flex shrink flex-col border shadow-sm rounded-xl bg-primary border-primary shadow-primary">
            <form class="p-4 md:p-5 flex flex-col gap-y-5">
                <div class="flex flex-col gap-y-2">
                    <div>
                        <div class="flex rounded-md shadow-sm">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-l-md border border-r-0 text-sm bg-base border-base text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-white w-4">
                                    <g data-name="Layer 2">
                                        <g data-name="at">
                                            <rect width="24" height="24" opacity="0" />
                                            <path
                                                d="M13 2a10 10 0 0 0-5 19.1 10.15 10.15 0 0 0 4 .9 10 10 0 0 0 6.08-2.06 1 1 0 0 0 .19-1.4 1 1 0 0 0-1.41-.19A8 8 0 1 1 12.77 4 8.17 8.17 0 0 1 20 12.22v.68a1.71 1.71 0 0 1-1.78 1.7 1.82 1.82 0 0 1-1.62-1.88V8.4a1 1 0 0 0-1-1 1 1 0 0 0-1 .87 5 5 0 0 0-3.44-1.36A5.09 5.09 0 1 0 15.31 15a3.6 3.6 0 0 0 5.55.61A3.67 3.67 0 0 0 22 12.9v-.68A10.2 10.2 0 0 0 13 2zm-1.82 13.09A3.09 3.09 0 1 1 14.27 12a3.1 3.1 0 0 1-3.09 3.09z" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <input type="text" v-model="form['display_name']" placeholder="Write your display name here"
                                name="name"
                                class="py-2 px-3 pr-11 block w-full shadow-sm rounded-r-md text-sm focus:z-10 focus:border-secondary focus:ring-secondary bg-accent border-accent text-white">
                        </div>
                        <div class="inline-flex items-center gap-2 text-sm font-medium text-error" v-if="error">
                            {{ error["display_name"] }}
                        </div>
                    </div>
                </div>

                <a class="inline-flex items-center gap-2 text-sm font-medium text-secondary cursor-pointer hover:contrast-50"
                    @click="submit()">
                    Let's get started!
                    <svg class="w-2.5 h-auto" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </a>
            </form>
        </div>
    </div>
</template>

<style lang="postcss">
.bg-pattern {
    background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='100%25' width='100%25'%3E%3Cdefs%3E%3Cpattern id='doodad' width='23.09' height='40' viewBox='0 0 34.64101615137755 60' patternUnits='userSpaceOnUse' patternTransform='rotate(135)'%3E%3Crect width='100%25' height='100%25' fill='rgba(45, 55, 72,1)'/%3E%3Cpath d='M36.37 39L36.37 41L32.91 39L34.64 38L34.64 42L32.91 41L34.64 40z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M19.05 49L19.05 51L15.59 49L17.32 48L17.32 52L15.59 51L17.32 50z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M1.73 39L1.73 41L-1.73 39L0 38L0 42L-1.73 41L0 40z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M1.73 19L1.73 21L-1.73 19L0 18L0 22L-1.73 21L0 20z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M19.05 9L19.05 11L15.59 9L17.32 8L17.32 12L15.59 11L17.32 10z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M36.37 19L36.37 21L32.91 19L34.64 18L34.64 22L32.91 21L34.64 20z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3Cpath d='M34.64 41L35.51 40.5L33.77 39.5L33.77 40.5L35.51 39.5L34.64 39L34.64 40z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M17.32 51L18.19 50.5L16.45 49.5L16.45 50.5L18.19 49.5L17.32 49L17.32 50z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M0 41L0.87 40.5L-0.87 39.5L-0.87 40.5L0.87 39.5L0 39L0 40z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M0 21L0.87 20.5L-0.87 19.5L-0.87 20.5L0.87 19.5L0 19L0 20z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M17.32 11L18.19 10.5L16.45 9.5L16.45 10.5L18.19 9.5L17.32 9L17.32 10z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M34.64 21L35.51 20.5L33.77 19.5L33.77 20.5L35.51 19.5L34.64 19L34.64 20z' stroke-linejoin='miter' fill='rgba(102, 126, 234,1)'/%3E%3Cpath d='M17.32 30L17.32 30L17.32 30L17.32 30L17.32 30L17.32 30L17.32 30z' stroke-linejoin='miter' fill='rgba(236, 201, 75,1)'/%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23doodad)' height='200%25' width='200%25'/%3E%3C/svg%3E ")
}
</style>