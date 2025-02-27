<template>
    <Layout>
        <Head>
            <title>Role</title>
        </Head>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">Role <Link href="/role/create"><button class="btn btn-success btn-sm pull-right float-right" type="button">Add Role</button></Link></div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Role Name</th>
                                        <th scope="col">Permissions</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(role, index) in roles.data" v-bind:key="role.id">
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ role.name }}</td>
                                        <td>
                                            <Badge :badges="role.permissions" />
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary btn-sm" type="button" v-on:click="editRole(role.id)">Edit</button>
                                            &nbsp;<button class="btn btn-danger btn-sm" type="button" v-on:click="deleteRole(role.id)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <Pagination v-bind:links="roles.links"/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
    import Pagination from "./../Layouts/Pagination.vue";
    import Badge from "./../Layouts/Badge.vue";

    export default {
        props: {
            roles: Object,
        },

        components: {
            Pagination,
            Badge
        },

        methods: {
            deleteRole(id){
                this.$inertia.delete('/role/' + id, {
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

            editRole(id){
                this.$inertia.get('role/'+ id +'/edit');
            },
        },
    }
</script>
