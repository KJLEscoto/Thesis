<script setup>
const name = ref('kent escoto')
const usertype = ref('admin')
const scaleArrow = ref(false)
const seeProfile = ref(false)

const capitalizedName = computed(() => {
  return name.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
});

const initial = name.value.charAt(0).toUpperCase();

</script>

<template>
<!--reveal-->
<div class="m-2">
  <nuxt-link to="/admin/profile">
    <div class="p-4 border rounded-sm border-slate-700 flex justify-start items-center gap-2" @mouseenter="scaleArrow = true; seeProfile = true" @mouseleave="scaleArrow = false; seeProfile = false">
      <div class="rounded-full bg-slate-600 h-10 w-10 flex justify-center items-center">
        <p class="font-bold text-2xl m-auto">{{ initial }}</p>
      </div>
      <div class="border-l border-slate-700 pl-2">
        <p class="tracking-wide">{{ capitalizedName }}</p>
        <p class="text-gray-400 text-sm tracking-wider">{{ usertype }}</p>
      </div>  
      <ToolTip label="See Profile" v-if="seeProfile" class="lg:grid hidden bottom-7 -right-20"/>
      <div class="absolute right-4 m-auto transform transition-transform" :class="{ 'scale-125': scaleArrow }" >
        <Icon name="ep:arrow-right" class="text-xl font-bold text-gray-500" />
      </div>
    </div>
  </nuxt-link>
</div>
</template>
