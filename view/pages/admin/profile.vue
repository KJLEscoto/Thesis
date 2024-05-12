<template lang="">
  <div class="">
    <div class="flex justify-between items-center">
      <p>This is profile</p>
      <button class="bg-red-500 px-2 py-1">Logout</button>
    </div>
  </div>
</template>

<script setup>
definePageMeta({
  layout: 'admin-sidebar'
})

const loading = ref(false)
</script>