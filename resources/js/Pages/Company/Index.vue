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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Slogun</th>
                                        <th scope="col">ESTD</th>
                                        <th scope="col">Create Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="data in datas" v-bind:key="data.id">
                                        <th scope="row">{{ countData }}</th>
                                        <td>{{ data.company_name }}</td>
                                        <td>{{ data.slogan }}</td>
                                        <td>{{ data.std }}</td>
                                        <td>{{ data.created_at }}</td>
                                        <td>
                                            <button class="btn btn-secondary btn-sm" type="button" v-on:click="editCompany(data.id)">Edit</button>
                                            &nbsp;<button class="btn btn-danger btn-sm" type="button" v-on:click="deleteCompany(data.id)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
        props: {
            datas: Object,
        },

        components: {
            Layout, Link, Head,
        },

        methods: {
            deleteCompany(id){
                this.$inertia.delete('/company/' + id, {
                    onSuccess: (page) => {
                        if (page.props.flash.success != null) {
                            this.company_name = '';
                            this.slogan = '';
                            this.std = '';

                            this.$toast.show(page.props.flash.success, {
                                position: "top-right",
                                type: "success",
                                duration: 2500,
                            });
                        } else {
                            this.$toast.show(page.props.flash.error, {
                                position: "top-right",
                                type: "error",
                                duration: 2500,
                            });
                        }
                    },
                    onBefore: () => confirm('Are you sure, you want to delete this company?'),
                });
            },

            editCompany(id){
                this.$inertia.get('company/'+ id +'/edit');
            },
        },

        computed: {
            countData(){
                var i = 1
                return i;
            }
        }
    }
</script>
