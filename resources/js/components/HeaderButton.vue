<template>
    <a class="avatar placeholder mx-8 cursor-pointer" @click="showMenu">
        <div class="bg-primary-focus text-neutral-content rounded-full w-16 h-16">
            <img :src="`${assetsUrl}/bee.png`" alt="Logo" class="h-full">
        </div>
    </a>
    <div class="absolute top-24 bg-base-300 z-50 w-full md:w-1/6 md:rounded-b-xl" v-show="menuDisplayed" @click="stopPropagation">
        <ul class="cursor-pointer text-black w-full" @click.stop="stopPropagation">
            <li class="flex"><a class="p-8 hover:bg-primary-focus w-full flex justify-between items-center" :href="route('dashboard')">{{ $t('menu.home') }} <img :src="`${assetsUrl}/home.png`" class="w-6 h-6"></a></li>
            <li class="flex"><a class="p-8 hover:bg-primary-focus w-full flex justify-between items-center" :href="route('reminders.index')">{{ $t('menu.reminders') }} <img :src="`${assetsUrl}/reminders.png`" class="w-6 h-6"></a></li>
            <li class="flex"><a class="p-8 hover:bg-primary-focus w-full flex justify-between items-center" :href="route('teams.index')">{{ $t('menu.teams') }} <img :src="`${assetsUrl}/teams.png`" class="w-6 h-6"></a></li>
            <li class="flex"><a class="p-8 hover:bg-primary-focus w-full flex justify-between items-center" :href="route('users.profile')">{{ $t('menu.account') }} <img :src="`${assetsUrl}/account.png`" class="w-6 h-6"></a></li>
            <li class="flex">
                <form class="w-full h-full" :action="route('logout')" method="POST">
                    <input type="hidden" name="_token" :value="csrfToken">
                    <button class="p-8 hover:bg-primary-focus w-full flex justify-between items-center md:rounded-b-xl">{{ $t('default.logout') }} <img :src="`${assetsUrl}/logout.png`" class="w-6 h-6"></button>
                </form>
            </li>
        </ul>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';

export default {
    name: 'HeaderButton',
    props: {
        assetsUrl: {
            type: String,
            default: ''
        }
    },
    setup() {
        let menuDisplayed = ref(false),
            csrfToken = ref('')

        onMounted(() => {
            window.addEventListener('click', () => {
                menuDisplayed.value = false
            })

            csrfToken.value = document.querySelector('meta[name="csrf-token"]').content
        })

        function showMenu(event) {
            stopPropagation(event)
            menuDisplayed.value = !menuDisplayed.value
        }

        function stopPropagation(event) {
            event.stopPropagation()
        }

        return {
            menuDisplayed,
            csrfToken,
            showMenu
        }
    }
}
</script>

<style>
</style>