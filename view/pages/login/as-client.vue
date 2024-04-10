<script setup>
import {
  Icon
} from '@iconify/vue';
import {
  ref
} from 'vue';

const passwordFieldType = ref('password');
const isInputFocused = ref(false);
const passwordInput = ref(null);

const showPassword = () => {
  passwordFieldType.value = passwordFieldType.value === 'password' ? 'text' : 'password';
  if (passwordFieldType.value === 'text' || 'password') {
    passwordInput.value.focus();
  }
};
</script>

<template>
<div class="gradient-bg h-full w-full">
  <div class="flex items-center justify-center h-screen">
    <form class="h-auto lg:w-1/3 md:w-2/4 w-3/4 gradient-bg duration-200 rounded shadow-lg shadow-black p-10 long-text tracking-wide">
      <div class="flex items-center gap-1 mb-5 justify-center">
        <Icon icon="material-symbols:shield-person" class="w-auto h-10" />
        <h1 class="cursor-default headlines text-2xl">Authentication</h1>
      </div>

      <hr class="mb-5">

      <section class="mb-5">
        <div class="flex gap-1 items-center">
          <Icon icon="material-symbols:person" class="w-auto h-5" />
          <label for="username" class="text-base">Username</label>
        </div>
        <input name="username" type="text" class="w-full bg-[#cbd2d7] focus:bg-[#e5e8eb] py-2 px-3 rounded border border-black transition-all duration-300 outline-none focus:border-white text-black mt-1">
      </section>

      <section>
        <div class="flex justify-between">
          <div class="flex items-center gap-1">
            <Icon icon="solar:lock-password-unlocked-bold" class="w-auto h-5" />
            <label class="text-base">Password</label>
          </div>
          <div class="flex gap-1 items-center w-auto">
            <nuxt-link to="/">
              <span class="hover:opacity-50 flex gap-1 items-center">
                <Icon icon="tabler:lock-question" class="w-auto h-3" />
                <span class="text-xs">Forgot password?</span>
              </span>
            </nuxt-link>
          </div>
        </div>

        <span class="flex items-center relative">
          <input :type="passwordFieldType" ref="passwordInput" @focus="isInputFocused = true" @blur="isInputFocused = false" class="w-full bg-[#cbd2d7] focus:bg-[#e5e8eb] py-2 px-3 pr-12 rounded border border-black transition-all duration-300 outline-none focus:border-white text-black mb-2 mt-1">
          <span class="absolute right-0 cursor-pointer mr-3 text-black hover:bg-[#758e92] hover:text-[#b8c5c7] p-1 rounded-full duration-150">
            <Icon @click="showPassword" icon="ic:outline-remove-red-eye" class="w-auto h-5" />
          </span>
        </span>
      </section>

      <nuxt-link to="/client">
        <button type="submit" class="btn-form bg-[#3e5566]">Login</button>
      </nuxt-link>

      <section class="mt-7">
        <div class="flex gap-2 items-center">
          <hr class="w-full">
          <p class="text-xs">OR</p>
          <hr class="w-full">
        </div>
      </section>

      <section class="w-full">
        <nuxt-link to="/login/as-admin">
          <button class="btn-form bg-[#081a28] flex gap-2 items-center justify-center">
            <Icon icon="material-symbols-light:admin-panel-settings-outline-rounded" class="w-auto h-7" />
            <p class="text-center">Continue as Admin</p>
          </button>
        </nuxt-link>
      </section>

    </form>
  </div>
</div>
</template>
