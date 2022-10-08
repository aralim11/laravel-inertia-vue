<template>
    <layout>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">Company <Link href="/company/create"><button class="btn btn-success btn-sm pull-right float-right" type="button">Add Company</button></Link></div>

                        <div class="card-body">
                            <h1>Company</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import LayOut from "./../Layouts/Layout.vue";
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            'layout' : LayOut,
            Link,
        },
    }
</script>
