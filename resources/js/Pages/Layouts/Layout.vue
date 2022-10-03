<template>
    <nav-bar></nav-bar>
    <main class="py-4">
        <slot></slot>
    </main>
</template>

<script>
    import NavBar from './Nav.vue';

    export default {
        components: {
            'nav-bar': NavBar,
        }
    }
</script>
