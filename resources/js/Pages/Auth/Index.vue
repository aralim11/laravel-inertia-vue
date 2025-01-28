<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 15%;">
                    <div class="card-header">User Login<span v-if="!formIsValid" style="float: right; color:red;">Please Enter Valid Email and Password!!</span></div>

                    <div class="card-body">
                        <form @submit.prevent="submitLogin">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model.trim="email" autocomplete="email" autofocus>
                                    <p class="error-msg" v-if="errors.email">{{ errors.email }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model.trim="password" autocomplete="current-password">

                                    <span class="invalid-feedback" role="alert">
                                        <p class="error-msg">ghfghfhfhgfh</p>
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card" style="margin-top: 1%;">
                    <div class="card-header">Demo User List</div>

                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Abdul Alim</td>
                                    <td>alim@appfunbd.com</td>
                                    <td>1234</td>
                                </tr>
                                <tr>
                                    <td>Mehedi Shamim</td>
                                    <td>mehedi@appfunbd.com</td>
                                    <td>1234</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            errors: Object,
        },

        data(){
            return{
                email: 'alim@appfunbd.com',
                password: '1234',
                formIsValid: true,
            }
        },

        methods: {
            submitLogin(){
                this.formIsValid = true;
                if (this.email == '' || !this.email.includes('@') || this.password.length < 4) {
                    this.formIsValid = false;
                    return;
                }

                this.$inertia.post('/login', {
                    email: this.email,
                    password: this.password,
                });
            }
        }
    }
</script>
