<template>
    <nav aria-label="Page navigation" class="float-right">
        <ul class="pagination">
            <template v-for="(link, index) in links" :key="index">
                <Link class="page-item text-decoration-none" :href="link.url" v-if="link.url"><p class="page-link" v-html="link.label"></p></Link>
                <li class="page-item" v-else><p class="page-link" v-html="link.label"></p></li>
            </template>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: {
            links: Object
        }
    }
</script>
