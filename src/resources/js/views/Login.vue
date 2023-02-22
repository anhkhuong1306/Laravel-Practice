<template>
    <div class="login">
        <div>
            <form @submit.prevent="submit">
                <div class="field-input">
                    <label for="email">Email:</label>
                    <input type="text" name="email" v-model="form.email" />
                </div>
                <div class="field-input">
                    <label for="password">Password:</label>
                    <input type="password" name="password" v-model="form.password" />
                </div>
                <button type="submit">Submit</button>
            </form>
            <p v-if="showError" id="error">Username or Password is incorrect</p>
        </div>
    </div>
</template>
<script>
    import { mapActions } from 'vuex';
    export default {
        name: "Login",
        components: {},
        data() {
            return {
                form: {
                    email: "",
                    password: "",
                },
                showError: false
            }
        },
        methods: {
            ...mapActions(["LogIn"]),
            async submit() {
                const User = new FormData();
                User.append("email", this.form.email);
                User.append("password", this.form.password);
                console.log(User);
                try {
                    const result = await this.LogIn(User);
                    console.log(result);
                    this.$router.push('/posts');
                    this.showError = false;
                } catch (error) {
                    this.showError = true;
                }
            }
        }
    }
</script>
<style scoped>
* {
    box-sizing: border-box;
}
label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    text-align: right;
}
button[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    cursor: pointer;
    border-radius:30px;
}
button[type=submit]:hover {
    background-color: #45a049;
}
input {
    margin: 5px;
    box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
    padding:10px;
    border-radius:30px;
}
#error {
    color: red;
}
form {
    justify-content: center;
}
.field-input {
    justify-content: center;
    display: grid;
    grid-template-columns: 100px 200px;
}
</style>
