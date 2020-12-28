<template>
    <div>
        <!-- Login Content -->
        <div class="container-login">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-9">
                    <div class="card shadow-sm my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">
                                                Login
                                            </h1>
                                        </div>
                                        <b-form @submit="checkAdmin">
                                            <b-form-group
                                                id="input-group-1"
                                                label="Username:"
                                                label-for="input-1"
                                                description=""
                                            >
                                                <b-form-input
                                                    id="input-1"
                                                    v-model="form.username"
                                                    required
                                                    placeholder="Username"
                                                ></b-form-input>
                                            </b-form-group>
                                            <b-form-group
                                                id="input-group-2"
                                                label="Password:"
                                                label-for="input-2"
                                                description=""
                                            >
                                                <b-form-input
                                                    id="input-2"
                                                    type="password"
                                                    v-model="form.pass"
                                                    required
                                                    placeholder="Password"
                                                ></b-form-input>
                                            </b-form-group>
                                            <b-button
                                                type="submit"
                                                variant="primary"
                                                >Login</b-button
                                            >
                                        </b-form>
                                        <b-card
                                            class="mt-3"
                                            header="Form Data Result"
                                        >
                                            <pre class="m-0">{{ form }}</pre>
                                        </b-card>
                                        <hr />
                                        <div class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Content -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: {
                username: "",
                pass: ""
            }
        };
    },
    methods: {
        checkAdmin() {
            if (
                this.form.username.toLowerCase().trim() == "admin" &&
                this.form.pass.toLowerCase().trim() == "admin"
            ) {
                this.$router.push("home");
            } else {
                window.alert("Pass salah");
                this.form.username = null;
                this.form.pass = null;
            }
        }
    }
};
</script>
