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
                                    <tr v-for="(company, index) in companies.data" v-bind:key="company.id">
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ company.company_name }}</td>
                                        <td>{{ company.slogan }}</td>
                                        <td>{{ company.std }}</td>
                                        <td>{{ company.created_at }}</td>
                                        <td>
                                            <button class="btn btn-secondary btn-sm" type="button" v-on:click="editCompany(company.id)">Edit</button>
                                            &nbsp;<button class="btn btn-danger btn-sm" type="button" v-on:click="deleteCompany(company.id)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <Pagination v-bind:links="companies.links"/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
    import Pagination from "./../Layouts/Pagination.vue";

    export default {
        props: {
            companies: Object,
        },

        components: {
            Pagination,
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
    }
</script>
