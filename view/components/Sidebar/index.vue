<script setup>
const open = ref(false)

</script>

<template>
  <div class="relative">
    <div class="fixed top-0 left-0 z-30 w-full bg-slate-800">
      <div v-show="!open" class="flex lg:hidden items-center justify-between h-full p-5 text-white tracking-wide">
        <label class="font-semibold text-xl">Client</label>
        <Icon name="solar:hamburger-menu-outline" class="cursor-pointer left-2 top-2 w-auto h-7 text-slate-400 hover:text-slate-600" @click="open = true"/>
      </div>
      <div v-if="open">
        <Icon name="majesticons:close-line" class="cursor-pointer right-5 top-5 w-auto h-7 absolute text-red-600 hover:text-red-400" @click="open = false"/>
        <SidebarMenu @click="open = false"/>
        <LoginClientUserItem class="mb-5 shadow-md" @click="open = false"/>
      </div>
    </div>
    <div class="lg:flex hidden border-slate-700 h-screen border-r w-[250px] flex-col justify-between">
      <SidebarMenu />
      <LoginClientUserItem />
    </div>
  </div>
</template>
