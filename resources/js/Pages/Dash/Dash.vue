<template>
    <layout>
        <Head title="Dashboard"/>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            <h1>{{ $t('dashboard.dashboard') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import LayOut from "./../Layouts/Layout.vue";

    export default {
        components:{
            'layout' : LayOut,
        },

        created() {
             console.log(this.$i18n.locale);
            console.log(this.$page.props.translations.dashboard);
        }
    }
</script>
