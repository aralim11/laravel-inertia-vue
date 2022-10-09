<template>
    <Layout>
        <Head>
            <title>iHelpBD HRM - Company</title>
        </Head>
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
    </Layout>
</template>

<script>
    import Layout from "./../Layouts/Layout.vue";
    import { Link, Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Layout, Link, Head,
        },
    }
</script>
