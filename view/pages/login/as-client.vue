<script setup>

//LUIS
import { Form, Field, ErrorMessage } from 'vee-validate';

//REY
const state = reactive({
  user: {
    userName: null,
    password: null,
  }
});

//KENT
const passwordFieldType = ref('password');
const isInputFocused = ref(false);
let passwordInput = null;


//LUIS
const validateUserName = (value) => {
  if (!value) {
    return 'Username is required';
  }

  const minLength = 4; 
  const maxLength = 20; 
  const allowedCharacters = /^[a-zA-Z0-9_-]+$/; 
  const startsWithLetter = /^[a-zA-Z]/; 
  
  if (value.length < minLength || value.length > maxLength) {
    return `Username must be between ${minLength} and ${maxLength} characters`;
  }
  
  if (!allowedCharacters.test(value)) {
    return 'Username can only contain letters, digits, underscores, and hyphens';
  }
  
  if (!startsWithLetter.test(value)) {
    return 'Username must start with a letter';
  }
  
  return true;
};

const validatePassword = (value) => {
  if (!value) {
    return 'Password is required';
  }
  return true;
};


//KENT
const showPassword = () => {
  passwordFieldType.value = passwordFieldType.value === 'password' ? 'text' : 'password';
  if (passwordInput) {
    passwordInput.focus();
  }
};


//REY, LUIS
async function handleLogin() {
  const params = {
    userName: state.user.userName,
    password: state.user.password,
  }
  try {
  const response = await $fetch(`http://127.0.0.1:8000/api/auth/login-client`, {
      method: 'POST',
      body: JSON.stringify(params)
  });

  if (response.data) {
      localStorage.setItem('_token', response.data.token);
      navigateTo('/client');
  }
  } catch (error) {
  state.errors = error.response;
  alert(state.errors && state.errors._data && state.errors._data.errors && state.errors._data.errors.userName && state.errors._data.errors.userName[0]);
  }
    }
</script>

<template>
  <div class="gradient-bg h-auto w-full">
    <div class="flex justify-center h-screen p-5">
      <Form @submit="handleLogin()" class="h-auto m-auto lg:w-1/3 md:w-2/4 w-3/4 dark-bg duration-200 rounded shadow-custom p-10 long-text tracking-wide" >
        <div class="flex items-center gap-1 mb-5 justify-center">
          <Icon name="material-symbols:shield-person" class="w-auto h-10" />
          <h1 class="cursor-default headlines text-2xl">Authentication</h1>
        </div>
  
        <hr class="mb-5">
        <section class="mb-5">
          <div class="flex gap-1 items-center">
            <Icon name="material-symbols:person" class="w-auto h-5" />
            <label for="username" class="text-base">Username</label>
          </div>
          <Field type="text" name="username" placeholder="Enter your username" class="w-full bg-[#cbd2d7] focus:bg-[#e5e8eb] py-2 px-3 rounded border border-black transition-all duration-300 outline-none focus:border-white text-black mt-1"
            :rules="validateUserName"
            v-model="state.user.userName"
          />
          <ErrorMessage class="text-red-500 text-xs italic font-bold" name="username"/>
        </section>
  
        <section>
          <div class="flex justify-between">
            <div class="flex items-center gap-1">
              <Icon name="solar:lock-password-unlocked-bold" class="w-auto h-5" />
              <label class="text-base">Password</label>
            </div>
            <div class="flex gap-1 items-center w-auto">
              <nuxt-link to="#">
                <LoginForgotPassword />
              </nuxt-link>
            </div>
          </div>
  
          <span class="flex items-center relative m-auto">
            <Field :type="passwordFieldType" @focus="isInputFocused = true" @blur="isInputFocused = false" ref="passwordField" name="password" placeholder="Enter your password"
            class="w-full bg-[#cbd2d7] focus:bg-[#e5e8eb] py-2 px-3 pr-12 rounded border border-black transition-all duration-300 outline-none focus:border-white text-black mt-1"
            :rules="validatePassword"
            v-model="state.user.password"
            />
            <span @mouseenter="showPassword()" @mouseleave="showPassword()" class="absolute top-2 right-0 cursor-pointer mr-3 text-black hover:text-slate-400 p-1 rounded-full duration-150 m-auto">
              <Icon class="w-auto h-5" name="ic:outline-remove-red-eye" />
            </span>
          </span>
          <ErrorMessage class="text-red-500 text-xs italic font-bold" name="password"/>
        </section>
  
        <LoginClientButton />
  
        <section class="mt-7">
          <div class="flex gap-2 items-center">
            <hr class="w-full">
            <p class="text-xs">OR</p>
            <hr class="w-full">
          </div>
        </section>
  
        <LoginAdminContinueAs />
        <!-- <input type="date" class="text-black bg-blue-500 rounded"> -->
      </Form>
    </div>
  </div>
</template>