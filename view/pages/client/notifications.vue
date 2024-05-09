<template lang="">
  <div class="text-white">
    Notifications
    <UButton 
    label="hi"
    :loading='loading'
    disabled
    />
  </div>
</template>

<script setup>
definePageMeta({
  layout: 'client-sidebar'
})

const loading = ref(false)
</script>