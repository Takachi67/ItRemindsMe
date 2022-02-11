<template>
    <a :href="link" class="w-64 h-64 md:w-72 md:h-72 lg:w-80 lg:h-80 flex flex-col justify-around items-center hand-bordered border-secondary p-6 my-10 md:my-0">
        <img :src="`${assetsUrl}/${icon}.png`" class="md:w-1/3 md:h-1/3">
        <p class="text-xl md:text-3xl">{{ text }}</p>
    </a>
</template>

<script>
export default {
    name: 'MainLink',
    props: {
        link: {
            type: String,
            default: ''
        },
        icon: {
            type: String,
            default: ''
        },
        text: {
            type: String,
            default: ''
        },
        assetsUrl: {
            type: String,
            default: ''
        }
    }
}
</script>

<style>
</style>