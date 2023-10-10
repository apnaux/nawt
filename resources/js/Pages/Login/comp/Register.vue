<script setup>
import { ref, watch, Transition } from 'vue';
import { useForm } from '@inertiajs/vue3';
defineProps(['toggle', 'error']);

const emit = defineEmits('accessedFrom');
const showPassword = ref(false);

const form = useForm({
    username: '',
    password: ''
});

const submit = () => {
    form.post('/register', {
        preserveState: true,
    });
}
</script>

<template>
    <div class="flex shrink flex-col border shadow-sm rounded-xl bg-primary border-primary shadow-primary">
        <form @submit.prevent="submit()" class="p-4 md:p-5 flex flex-col gap-y-5">
            <h3 class="mt-2 text-lg font-bold text-white leading-3">
                Register to nawt!
            </h3>
            <p class="text-white leading-none">
                Your username and password is all we need.
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
                    <div class="inline-flex items-center gap-2 text-sm font-medium text-error"
                        v-if="form.errors.username">
                        {{ form.errors.username }}
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
                        <input :type="showPassword ? 'text' : 'password'" v-model="form.password" placeholder="Password"
                            name="password"
                            class="py-2 px-3 pr-11 block w-full shadow-sm text-sm focus:z-10 focus:border-secondary focus:ring-secondary bg-accent border-accent text-white">
                        <button type="button" @mousedown="() => showPassword = true" @mouseup="() => showPassword = false"
                            class="-ml-px py-3 px-4 inline-flex justify-center items-center gap-2 border-l-2 border-primary fill-white font-medium bg-accent rounded-r-md shadow-sm align-middle hover:fill-secondary active:scale-90 focus:outline-none focus:ring-2 focus:ring-secondary transition-all text-sm">
                            <Transition name="show-password" mode="out-in">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4" v-if="showPassword">
                                    <g data-name="Layer 2">
                                        <g data-name="eye-off">
                                            <rect width="24" height="24" opacity="0" />
                                            <path
                                                d="M4.71 3.29a1 1 0 0 0-1.42 1.42l5.63 5.63a3.5 3.5 0 0 0 4.74 4.74l5.63 5.63a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM12 13.5a1.5 1.5 0 0 1-1.5-1.5v-.07l1.56 1.56z" />
                                            <path
                                                d="M12.22 17c-4.3.1-7.12-3.59-8-5a13.7 13.7 0 0 1 2.24-2.72L5 7.87a15.89 15.89 0 0 0-2.87 3.63 1 1 0 0 0 0 1c.63 1.09 4 6.5 9.89 6.5h.25a9.48 9.48 0 0 0 3.23-.67l-1.58-1.58a7.74 7.74 0 0 1-1.7.25z" />
                                            <path
                                                d="M21.87 11.5c-.64-1.11-4.17-6.68-10.14-6.5a9.48 9.48 0 0 0-3.23.67l1.58 1.58a7.74 7.74 0 0 1 1.7-.25c4.29-.11 7.11 3.59 8 5a13.7 13.7 0 0 1-2.29 2.72L19 16.13a15.89 15.89 0 0 0 2.91-3.63 1 1 0 0 0-.04-1z" />
                                        </g>
                                    </g>
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4" v-else>
                                    <g data-name="Layer 2">
                                        <g data-name="eye">
                                            <rect width="24" height="24" opacity="0" />
                                            <path
                                                d="M21.87 11.5c-.64-1.11-4.16-6.68-10.14-6.5-5.53.14-8.73 5-9.6 6.5a1 1 0 0 0 0 1c.63 1.09 4 6.5 9.89 6.5h.25c5.53-.14 8.74-5 9.6-6.5a1 1 0 0 0 0-1zM12.22 17c-4.31.1-7.12-3.59-8-5 1-1.61 3.61-4.9 7.61-5 4.29-.11 7.11 3.59 8 5-1.03 1.61-3.61 4.9-7.61 5z" />
                                            <path
                                                d="M12 8.5a3.5 3.5 0 1 0 3.5 3.5A3.5 3.5 0 0 0 12 8.5zm0 5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5z" />
                                        </g>
                                    </g>
                                </svg>
                            </Transition>
                        </button>
                    </div>
                    <div class="inline-flex items-center gap-2 text-sm font-medium text-error"
                        v-if="form.errors.password">
                        {{ form.errors.password }}
                    </div>
                </div>
            </div>

            <button type="submit"
                class="inline-flex items-center gap-2 text-sm font-medium text-secondary cursor-pointer hover:contrast-50">
                Register now!
                <svg class="w-2.5 h-auto" width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
        </form>
        <div class="bg-primary border-light border-t rounded-b-xl py-3 px-4 md:py-4 md:px-5">
            <a class="inline-flex items-center gap-2 text-sm font-medium text-secondary hover:contrast-50 cursor-pointer"
                @click="toggle">
                Already have a nawt! account?
            </a>
        </div>
    </div>
</template>

<style lang="postcss">
.show-password-enter-active,
.show-password-leave-active {
    @apply transition-all opacity-100 scale-100 translate-x-0 duration-100;
}


.show-password-enter-from {
    @apply scale-110 ease-out;
}

.show-password-leave-to {
    @apply scale-90 ease-in;
}
</style>