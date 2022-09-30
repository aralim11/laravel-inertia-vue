<template>
    <NavBar></NavBar>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <h1>DashBoard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import NavBar from "./../Layouts/Nav.vue";

    export default {
        components:{
            'NavBar' : NavBar,
        }
    }
</script>
