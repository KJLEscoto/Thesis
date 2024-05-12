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
      navigateTo('/client/monitor');
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
      <Form @submit="handleLogin()" class="h-auto m-auto lg:w-1/3 md:w-2/4 w-3/4 dark-bg duration-200 rounded shadow-custom p-10 long-text tracking-wide">
        <div class="flex justify-center items-center mb-5">
          <Label label="Authentication" iconName="material-symbols:shield-person" class="text-2xl font-semibold cursor-default" :iconHeight='10'/>
        </div>
        <hr class="mb-5">
        <section class="mb-5">
          <div class="flex items-center justify-start">
            <Label label="Username" iconName="material-symbols:person" class="text-base cursor-default" :iconHeight='5'/>
          </div>
          <Field type="text" name="username" placeholder="Enter your username" class="w-full bg-[#cbd2d7] focus:bg-[#e5e8eb] py-2 px-3 rounded border border-black transition-all duration-300 outline-none focus:border-white text-black mt-1"
            :rules="validateUserName"
            v-model="state.user.userName"
            tabindex="1" 
          />
          <ErrorMessage class="text-red-500 text-xs italic font-bold" name="username"/>
        </section>
  
        <section>
          <div class="flex justify-between">
            <div class="flex items-center justify-start">
              <Label label="Password" iconName="solar:lock-password-unlocked-bold" class="text-base cursor-default" :iconHeight='5'/>
            </div>
            <div class="flex gap-1 items-center w-auto">
              <nuxt-link to="#">
                <Label label="Forgot Password?" iconName="tabler:lock-question" class="opacity-50 flex gap-1 text-xs cursor-pointer" :iconHeight='3'/>
              </nuxt-link>
            </div>
          </div>
  
          <span class="flex items-center relative m-auto">
            <Field :type="passwordFieldType" @focus="isInputFocused = true" @blur="isInputFocused = false" ref="passwordField" name="password" placeholder="Enter your password"
            class="w-full bg-[#cbd2d7] focus:bg-[#e5e8eb] py-2 px-3 pr-12 rounded border border-black transition-all duration-300 outline-none focus:border-white text-black mt-1"
            :rules="validatePassword"
            v-model="state.user.password"
            tabindex="2" 
            />
            <span @mouseenter="showPassword()" @mouseleave="showPassword()" class="absolute top-2 right-0 cursor-pointer mr-3 text-black hover:text-slate-400 p-1 rounded-full duration-150 m-auto">
              <Icon class="w-auto h-5" name="ic:outline-remove-red-eye" />
            </span>
          </span>
          <ErrorMessage class="text-red-500 text-xs italic font-bold" name="password"/>
        </section>
  
        <Button tabindex="3" label="Login" class="bg-[#79838c] mt-5 w-full rounded" />
  
        <Divider />
        
        <Button class="bg-[#32414e] w-full rounded" label="Continue as Admin" iconName="material-symbols-light:admin-panel-settings-outline-rounded" :disableLoading="true" route="/login/as-admin"
          tabindex="4" />
        <!-- <input type="date" class="text-black bg-blue-500 rounded"> -->
      </Form>
    </div>
  </div>
</template>