<template>

    <div class="d-flex justify-content-center align-items-center">
        <div class="container col-md-6 shadow-lg rounded-2 p-5">
            <div class="d-flex border-bottom mb-4 align-items-center">
                <h2>IMP - Sign in</h2>
            </div>
            <form class="">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input v-model="form.username" type="username" id="username" class="form-control" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input v-model="form.password" type="password" id="password" class="form-control" />
                </div>
                <!-- Submit button -->
                <button v-if="!loader" type="button" class="btn btn-primary btn-block mb-4" @click="sendForm()">
                    Sign in
                </button>
                <button v-else type="button" class="btn btn-primary btn-block mb-4">
                    <div class="spinner-border" role="status">
                        <span class="sr-only"></span>
                    </div>
                </button>

            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Hompeage',
    data () {
        return {
            form:{},
        }
    },
    methods: {
    }
}
</script>