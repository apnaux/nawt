<script setup>
import { useForm } from '@inertiajs/vue3';
defineProps(['toggle', 'error']);

const emit = defineEmits('accessedFrom');

const form = useForm({
    username: '',
    password: ''
});

const submit = () => {
    emit('accessedFrom', 'login')
    form.post('/login',  {preserveState: true});
}
</script>

<template>
    <div class="flex shrink flex-col border shadow-sm rounded-xl bg-primary border-primary shadow-primary">
        <form class="p-4 md:p-5 flex flex-col gap-y-5">
            <h3 class="mt-2 text-lg font-bold text-white leading-3">
                Log in to nawt!
            </h3>
            <p class="text-white leading-none">
                Your nawt! account is waiting for you!
            </p>

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
                        <input type="text" v-model="form.username" placeholder="Username" name="username"
                            class="py-2 px-3 pr-11 block w-full shadow-sm rounded-r-md text-sm focus:z-10 focus:border-secondary focus:ring-secondary bg-accent border-accent text-white">
                    </div>
                    <div class="inline-flex items-center gap-2 text-sm font-medium text-error" v-if="error.tab === 'login' && error.username">
                        {{ error.username }}
                    </div>
                </div>

                <div>
                    <div class="flex rounded-md shadow-sm">
                        <span
                            class="px-4 inline-flex items-center min-w-fit rounded-l-md border border-r-0 text-sm bg-base border-base text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-white w-4">
                                <g data-name="Layer 2">
                                    <g data-name="lock">
                                        <rect width="24" height="24" opacity="0" />
                                        <path
                                            d="M17 8h-1V6.11a4 4 0 1 0-8 0V8H7a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-8a3 3 0 0 0-3-3zm-7-1.89A2.06 2.06 0 0 1 12 4a2.06 2.06 0 0 1 2 2.11V8h-4zM18 19a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-8a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1z" />
                                        <path d="M12 12a3 3 0 1 0 3 3 3 3 0 0 0-3-3zm0 4a1 1 0 1 1 1-1 1 1 0 0 1-1 1z" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <input type="password" v-model="form.password" placeholder="Password" name="password"
                            class="py-2 px-3 pr-11 block w-full shadow-sm rounded-r-md text-sm focus:z-10 focus:border-secondary focus:ring-secondary bg-accent border-accent text-white">
                    </div>
                    <div class="inline-flex items-center gap-2 text-sm font-medium text-error" v-if="error.tab == 'login' && error.password">
                        {{ error.password }}
                    </div>
                </div>
            </div>

            <a class="inline-flex items-center gap-2 text-sm font-medium text-secondary cursor-pointer hover:contrast-50" @click="submit()">
                Log-in to your account!
                <svg class="w-2.5 h-auto" width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </a>
        </form>
        <div class="bg-primary border-light border-t rounded-b-xl py-3 px-4 md:py-4 md:px-5">
            <a class="inline-flex items-center gap-2 text-sm font-medium text-secondary hover:contrast-50 cursor-pointer"
                @click="toggle">
                You don't have a nawt! account?
            </a>
        </div>
    </div>
</template>