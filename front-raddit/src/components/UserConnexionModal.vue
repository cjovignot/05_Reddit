<script setup>
import { ref } from 'vue'
import { useAuthStore } from '../stores/AuthStore'
// import axios from 'axios'

const authStore = useAuthStore()

const signInModal = ref(true)
const headerTxt = ref('Connect to your account')
const emailRef = ref('')
const passwordRef = ref('')
const passwordConfRef = ref('')
const nameRef = ref('')

const switchModal = () => {
  signInModal.value = !signInModal.value

  !signInModal.value
    ? (headerTxt.value = 'Create an account')
    : (headerTxt.value = 'Connect to your account')

  //   console.log(signInModal.value)
}

const signinSubmit = () => {
  console.log('form click')
  console.log(emailRef.value)
  console.log(passwordRef.value)
  if (
    emailRef.value.length > 0 &&
    passwordRef.value == passwordConfRef.value &&
    passwordRef.value.length > 0
  ) {
    const userObj = {
      name: nameRef.value,
      email: emailRef.value,
      password: passwordRef.value,
      password_confirmation: passwordConfRef.value
    }
    // axios
    //   .post('http://127.0.0.1:8000/api/register', userObj)
    //   .then((response) => console.log(response.data))
    // console.log(userObj)
    authStore.registerUser(userObj)
  }
}
</script>

<template>
  <!-- The button to open modal -->
  <label for="my-modal-6" class="btn">log in</label>

  <input type="checkbox" id="my-modal-6" class="modal-toggle" />

  <div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
      <div class="modal-header flex justify-between">
        <h4 class="self-center">{{ headerTxt }}</h4>
        <div class="modal-action m-0">
          <label for="my-modal-6" class="btn">X</label>
        </div>
      </div>
      <section v-if="signInModal" class="signin">
        <input
          type="text"
          placeholder="email"
          class="input input-bordered w-full max-w-xs mb-1"
          v-model="emailRef"
        />
        <input
          type="password"
          placeholder="password"
          class="input input-bordered w-full max-w-xs mb-1"
          v-model="passwordRef"
        />
        <p>
          Forgot your
          <RouterLink to="/"> <span class="text-red-400">username</span> </RouterLink> or
          <RouterLink to="/"><span class="text-red-400">password</span></RouterLink> ?
        </p>

        <div>
          <h4>New to Raddit? <button @click="switchModal" class="text-red-400">Sign Up</button></h4>
        </div>
        <div class="modal-action">
          <button>
            <label @click="loginSubmit" for="my-modal-6" class="btn">LOG IN</label>
          </button>
        </div>
      </section>
      <section v-else class="signup">
        <input
          name="name"
          type="text"
          placeholder="name"
          class="input input-bordered w-full max-w-xs mb-1"
          v-model="nameRef"
        />
        <input
          name="email"
          type="text"
          placeholder="email"
          class="input input-bordered w-full max-w-xs mb-1"
          v-model="emailRef"
        />
        <input
          name="passorwd"
          type="password"
          placeholder="password"
          class="input input-bordered w-full max-w-xs mb-1"
          v-model="passwordRef"
        />
        <input
          name="confirmation_password"
          type="password"
          placeholder="confirm password"
          class="input input-bordered w-full max-w-xs"
          v-model="passwordConfRef"
        />
        <div>
          <span>already have an account? </span
          ><button class="text-red-400" @click="switchModal">Log In</button>
        </div>
        <div class="modal-action">
          <button>
            <label @click="signinSubmit" for="my-modal-6" class="btn">SIGN IN</label>
          </button>
        </div>
      </section>
    </div>
  </div>
</template>
