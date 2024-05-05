<script setup>
const open = ref(true)

</script>

<template>
  <div class="relative">
    <div class="flex lg:hidden z-50 items-center justify-between w-full h-full p-4 text-white">
      <p>Client</p>
      <Icon name="solar:hamburger-menu-outline" class="z-50 cursor-pointer left-2 top-2 w-auto h-7 text-slate-400 hover:text-slate-600" @click="open = true"/>
      <div v-if="open" class="fixed top-0 left-0 z-50 w-full bg-slate-800">
        <Icon name="majesticons:close-line" class="z-50 cursor-pointer right-4 top-4 w-auto h-7 absolute text-red-600 hover:text-red-400" @click="open = false"/>
        <SidebarMenu class="shadow-lg"/>
      </div>
    </div>
    <div class="lg:flex hidden border-slate-700 h-screen border-r w-[300px] flex-col justify-between">
      <SidebarMenu />
      <div>
        UserItem
      </div>
    </div>
  </div>
</template>