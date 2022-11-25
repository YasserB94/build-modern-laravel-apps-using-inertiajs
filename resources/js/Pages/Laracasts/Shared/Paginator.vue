<script setup>

defineProps({
    links:{
        type:Array
    }
})
</script>

<template>
    <div>
        <Link
            v-for="(link,index) in links"
            :key="`${link.label}${index}`"
            :href="link.url"
            v-html="link.label"
            :active="link.active"
            class="px-1"
            :class="{
                'underline': link.active,
                'hidden':!link.url
            }"
        />
    </div>
</template>

<style scoped>

</style>
