<script setup>
const open = ref(false)
// const collapse = ref(true);

// const toggleCollapse = () => {
//   collapse.value = !collapse.value;
// };
</script>

<template>
  <div class="relative">

    <!--mobile-->
    <div class="fixed top-0 left-0 z-30 w-full bg-slate-800">
      <div v-show="!open" class="flex lg:hidden items-center justify-between h-full p-5 text-white tracking-wide">
        <label class="font-semibold text-xl">Admin</label>
        <Icon name="solar:hamburger-menu-outline" class="cursor-pointer left-2 top-2 w-auto h-7 text-slate-400 hover:text-slate-600" @click="open = true"/>
      </div>
      <div v-if="open">
        <Icon name="majesticons:close-line" class="cursor-pointer right-5 top-5 w-auto h-7 absolute text-red-600 hover:text-red-400" @click="open = false"/>
        <AdminSidebarMenu @click="open = false"/>
        <div class="border-t border-t-slate-700">
          <AdminUserItem class="mb-5 shadow-md" @click="open = false"/>
        </div>
      </div>
    </div>

    <!--desktop-->
    <div class="lg:flex hidden lg:fixed bg-slate-800 border-slate-700 h-screen border-r w-auto flex-col justify-between">
      <!--collapse-->
      <!-- <div v-if="collapse">
        <Icon name="mdi:arrow-collapse-right" class="h-10 w-auto absolute top-3 -right-5 rounded p-2 bg-slate-800 hover:bg-slate-700" @click="toggleCollapse"/>
        <SidebarMenu />
        <div class="border-t border-t-slate-700">
          <LoginClientUserItem /> 
        </div>
      </div> -->

      <!--reveal-->
      <!-- <div v-if="!collapse"> -->
      <!-- <Icon name="mdi:arrow-collapse-left" class="h-10 w-auto absolute top-3 right-5 border rounded p-2 border-slate-700 hover:bg-slate-700" @click="toggleCollapse"/> -->
      <AdminSidebarMenu />
      <div class="border-t border-t-slate-700">
        <AdminUserItem /> 
      </div>
      <!-- </div> -->
      
    </div>
  </div>
</template>
