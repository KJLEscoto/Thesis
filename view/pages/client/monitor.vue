<template>
  <div class="lg:h-screen h-[700px] w-full p-5">
    <div class="border-4 border-slate-600 rounded lg:h-full h-[90%] w-full">
      <div class=" bg-zinc-400 w-full h-full">
        <div v-show="noCamera" class="flex items-center justify-center h-full w-full">
          <div class="text-red-800 grid justify-center">
            <Icon class="w-auto h-10 m-auto" name="material-symbols:video-camera-front-off-outline-rounded" />
              <p class="text-xs tracking-wider font-bold">No Camera Detected.
                <nuxt-link to="/client/settings" class="text-blue-900 underline hover:text-white transition-colors duration-150">Go setup</nuxt-link>
              </p>
          </div>
        </div>
        <div v-show="!noCamera" class="flex items-center justify-center h-full w-full">
            Camera Installed
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
definePageMeta({
  layout: 'client-sidebar'
})

const noCamera = ref(true)
</script>