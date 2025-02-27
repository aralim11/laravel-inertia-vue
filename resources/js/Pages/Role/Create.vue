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
                                    <label for="company_name" class="col-md-4 col-form-label text-md-end">Role Name</label>

                                    <div class="col-md-5">
                                        <input id="name" type="text" class="form-control" v-model.trim="name" required autocomplete="name" autofocus>
                                        <p class="error-msg" v-if="$page.props.errors.name">{{ $page.props.errors.name }}</p>
                                    </div>
                                </div>

                                <div class="row mb-0">
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

        created(){
            this.std = new Date().toISOString().slice(0, 10);
        },

        methods: {
            saveCompany(){
                this.$inertia.post('/company', {
                    company_name: this.company_name,
                    slogan: this.slogan,
                    std: this.std,
                    company_type: this.company_type,
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
