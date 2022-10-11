<template>
    <Layout>
        <Head>
            <title>iHelpBD HRM - Edit Company</title>
        </Head>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">Company
                            <Link href="/company"><button class="btn btn-success btn-sm pull-right float-right" type="button">Back</button></Link>
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="editCompany">
                                <div class="row mb-3">
                                    <label for="company_name" class="col-md-4 col-form-label text-md-end">Company Name</label>

                                    <div class="col-md-5">
                                        <input id="company_name" type="text" class="form-control" v-model.trim="company_name" autocomplete="company_name" autofocus>
                                        <p class="error-msg" v-if="$page.props.errors.company_name">{{ $page.props.errors.company_name }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="slogan" class="col-md-4 col-form-label text-md-end">Company Slogan</label>

                                    <div class="col-md-5">
                                        <input id="slogan" type="text" class="form-control" v-model.trim="slogan" autocomplete="slogan" autofocus>
                                        <p class="error-msg" v-if="$page.props.errors.slogan">{{ $page.props.errors.slogan }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="std" class="col-md-4 col-form-label text-md-end">Company ESTD Date</label>

                                    <div class="col-md-5">
                                        <input id="std" type="date" class="form-control" v-model.trim="std" autocomplete="std" autofocus>
                                        <p class="error-msg" v-if="$page.props.errors.std">{{ $page.props.errors.std }}</p>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
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
    import Layout from "./../Layouts/Layout.vue";
    import { Link, Head } from '@inertiajs/inertia-vue3';

    export default {
        props: {
            company: Object,
        },

        components:{
            Layout, Link, Head,
        },

        data(){
            return {
                company_name: '',
                slogan: '',
                std: '',
            }
        },

        methods: {
            setData(){
                this.company_name = this.company.company_name;
                this.slogan = this.company.slogan;
                this.std = this.company.std;
            },

            editCompany(){
                this.$inertia.put('/company/' + this.company.id, {
                    company_name: this.company_name,
                    slogan: this.slogan,
                    std: this.std,
                }, {
                    onSuccess: (page) => {
                        if (page.props.flash.success != null) {
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
        },

        created(){
            this.setData();
        }
    }
</script>
