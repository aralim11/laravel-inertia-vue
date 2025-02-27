<template>
    <span v-for="badge in badges" :key="badge.id" class="badge bg-primary">{{ badge.name }}</span>&nbsp;
</template>

<script>
    export default {
        props: {
            badges: Object
        }
    }
</script>
