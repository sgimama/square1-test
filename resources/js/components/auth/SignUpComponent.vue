<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <label>Name</label>
          <input v-model="name" type="text" />
           <label>Password</label>
          <input v-model="password" type="password" />
           <label>Confirm password</label>
          <input v-model="confirm_password" type="password" />
        </div>
        <button @click="signUp">Sign up</button>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from "vue";
import { getData, postData } from "../../hooks/api";
export default {
    setup() {

    const name = ref("");
    const password = ref("");
    const confirm_password = ref("");

    const signUp = async (evt) => {
      const params = {
        name: name.value,
        password: password.value,
      };    
        await postData(
          "/post/add",
          params
        )
    };

    return { name, password, confirm_password, signUp };
  },
};
</script>