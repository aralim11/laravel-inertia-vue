<template>
    <Layout>
        <Head>
            <title>AppFunBD - Add Role & Permission</title>
        </Head>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">Add Role & Permission
                            <Link href="/role"><button class="btn btn-success btn-sm pull-right float-right" type="button">Back</button></Link>
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="saveRolePermission">
                                <div class="row mb-3">
                                    <label for="company_name" class="col-md-1 col-form-label text-md-end">Role Name</label>

                                    <div class="col-md-4">
                                        <input id="name" type="text" class="form-control" v-model.trim="name" required autocomplete="name" autofocus>
                                        <p class="error-msg" v-if="$page.props.errors.name">{{ $page.props.errors.name }}</p>
                                    </div>
                                </div>

                                <div class="row row-deck row-cards">
                                    <div class="col-md-4 mb-3" v-for="module in modules.data" :key="module.id">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ module.name }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="list-group role-manage">
                                                    <label v-for="permission in module.permissions" class="list-group-item d-flex justify-content-between">
                                                        <span>{{ permission.name }}</span>
                                                        <input class="form-check-input ms-auto" type="checkbox"
                                                            name="permissions[]" value="asdsadasd">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0 text-end">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
    export default {
        data(){
            return {
                name: '',
            }
        },

        props: {
            modules: Object,
        },

        methods: {
            saveRolePermission(){
                this.$inertia.post('/company', {
                    name: this.name,
                }, {
                    onSuccess: (page) => {
                        if (page.props.flash.success != null) {
                            this.company_name = '';
                            this.slogan = '';
                            this.company_type = '';

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
                });
            }
        }
    }
</script>
