<template>
  <div v-if="label" class="tracking-wide absolute justify-start bg-gray-800 text-white p-2 text-xs rounded-md">
    <label>{{ label }}</label>
  </div>
</template>

<script setup>
const props = defineProps({
  label: {
    type: String,
    default: ''
  }
});
</script>
