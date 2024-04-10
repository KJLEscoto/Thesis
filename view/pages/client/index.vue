<script setup>
import {
  Icon
} from '@iconify/vue';
</script>

<template>
<div class="gradient-bg h-screen w-full overflow-hidden flex">
  <!-- Sidebar Section -->
  <section class="h-screen w-1/6 bg-[#133044] text-[#dddddd] shadow p-5">
    Client
    <div class="mt-20">
      -menu here (soon)
    </div>
  </section>

  <!-- Main Content Section -->
  <section class="text-white h-auto w-full">
    <!-- Header Section -->
    <section class="flex justify-between w-full border-b border-gray-600 h-auto p-5">
      <div>Dashboard</div>
      <div>Profile</div>
    </section>

    <!-- Main Content Body -->
    <section class="p-5 h-screen w-full">
      <div class="bg-[#e1e2e3] h-[90%] w-full rounded shadow-lg p-1">
        <div class="flex items-center h-full border-green-700 rounded border">
          <div class="m-auto justify-center text-red-500 ">
            <Icon icon="material-symbols-light:video-camera-front-off" class="w-auto h-10 m-auto" />
            <p class="m-auto font-semibold">Camera not found.</p>
          </div>
        </div>
      </div>
    </section>
  </section>
</div>
</template>
