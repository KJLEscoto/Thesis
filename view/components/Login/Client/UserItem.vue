<script setup>
const name = ref('kent escoto')
const usertype = ref('client')
const scaleArrow = ref(false)
const seeProfile = ref(false)

const capitalizedName = computed(() => {
  return name.value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
});

const capitalizedInitial = name.value.charAt(0).toUpperCase();

const seeProfileText = () => {
  setTimeout(() => {
    seeProfile.value = true;
  }, 300);
};
</script>

<template>
<div class="m-2">
  <nuxt-link to="/client/profile">
    <div class="p-4 border rounded-sm border-slate-700 flex justify-start items-center gap-2" @mouseenter="scaleArrow = true; seeProfileText()" @mouseleave="scaleArrow = false; seeProfile = false">
      <div class="rounded-full bg-slate-600 h-10 w-10 flex justify-center items-center">
        <p class="font-bold text-2xl m-auto">{{ capitalizedInitial }}</p>
      </div>
      <div class="border-l border-slate-700 pl-2">
        <p class="tracking-wide">{{ capitalizedName }}</p>
        <p class="text-gray-400 text-sm tracking-wider">{{ usertype }}</p>
      </div>  
      <div v-if="seeProfile" class="lg:grid hidden transform transition-transform tracking-wide absolute bottom-7 -right-20 bg-gray-800 text-white p-2 text-xs rounded-md">See Profile</div>
      <div class="absolute right-4 m-auto transform transition-transform" :class="{ 'scale-125': scaleArrow }" >
        <Icon name="ep:arrow-right" class="text-xl font-bold text-gray-500" />
      </div>
      
    </div>
  </nuxt-link>
</div>
</template>
