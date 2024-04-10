<script setup>
import {
  Icon
} from '@iconify/vue';
</script>

<template>
<div class="gradient-bg h-screen w-full">
  <div class="h-screen flex justify-center items-center">
    <div class="flex items-center justify-center h-auto w-full cursor-default p-10 m-auto">
      <div class="tracking-wider text-center">
        <img src="/assets/img/cctv-cartoon-crop.gif" alt="error" class="w-auto h-40 m-auto bg-[#cbd2d7] rounded-full mb-3 border-4">
        <p class="text-2xl mb-1 headlines">Oops, Access denied :( </p>
        <p class="long-text">It appears you're not authorized to view this page. Please verify your credentials to proceed.</p>
        <nuxt-link to="/login/as-client"><button class="btn m-auto mt-5 bg-[#3e5566] rounded-full flex items-center">
            Login
            <Icon icon="material-symbols:login-rounded" class="w-auto m-auto h-5 -ml-1" />
          </button></nuxt-link>
      </div>
    </div>
  </div>
</div>
</template>
