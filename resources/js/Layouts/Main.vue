<script setup>
import { switchTheme } from '../theme';
import NavLink from '../Components/NavLink.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
// import NavLink from '../Components/navLink.vue';

const page = usePage()
const user = computed(() => page.props.auth.user)

const show = ref(false)

</script>

<template>
    <header class="bg-slate-800 text-white">
        <nav class="p-6 flex justify-between items-center mx-auto max-w-screen-lg">
        
            <NavLink
            componentsName="Home"
             routeName="home"
             >Home</NavLink>
            <div class="flex items-center space-x-6">
                <div v-if="user" class="relative flex items-center gap-4">
                    <div
                        @click="show = !show"
                        class="flex items-center gap-2 px-3 py-1 rounded-lg hover:bg-slate-700 cursor-pointer"
                        :class="{ 'bg-slate-700': show }"
                    >
                        <p>{{ user.name }}</p>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                        <Link
                        v-if="user.role === 'admin'"
                     :href="route('admin.index')"
                    class="hover:bg-slate-700 w-6 h-6 grid-place-items-center rounded-full
                    hover:outline outline-1 outline-white
                    ">
                        <i class="fa-solid fa-lock"></i>
                    </Link>
                    <div
                        v-show="show"
                        @click="show = false"
                        class="absolute z-50 top-16 right-0 bg-slate-800 text-white rounded-lg border-slate-300 border overflow-hidden w-40"
                    >

                    <!-- <Link
                            class="block w-full px-6 py-3 hover:bg-slate-700 text-left"
                            >Dashboard</Link
                        > -->
                        <Link
                            :href="route('listing.create')"
                
                            as="button"
                            class="block w-full px-6 py-3 hover:bg-slate-700 text-left"
                            >New Listing</Link
                        >

                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="block w-full px-6 py-3 hover:bg-slate-700 text-left"
                            >Logout</Link
                        >

                        
                        <Link
                            :href="route('profile.edit')"
                
                            as="button"
                            class="block w-full px-6 py-3 hover:bg-slate-700 text-left"
                            >Profile</Link
                        >

                        
                        <Link
                            :href="route('dashboard')"
                            as="button"
                            class="block w-full px-6 py-3 hover:bg-slate-700 text-left"
                            >Dashboard</Link
                        >
                    </div>

                </div>
                <!-- <p>{{ $page.props.auth.user.name }}</p> -->
                 <div v-else  class="space-x-6">
                    <NavLink
                componentsName="Auth/register "
                routeName="register">Register</NavLink>

                <NavLink
                componentsName="Auth/login "
                routeName="login">login</NavLink>
                 </div>
                <button
                @click="switchTheme"
                class="hover:bg-slate-700 w-6 h-6 grid-place-items-center rounded-full
                hover:outline outline-1 outline-white
                ">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </button>
            </div>
        </nav>

    </header>

    <main class="p-6">
        <slot />
    </main>
</template>
