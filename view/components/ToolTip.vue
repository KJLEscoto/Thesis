<template>
  <div v-if="isVisible" class="tracking-wide absolute justify-start bg-gray-900 text-white p-2 text-xs rounded-md">
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

const isVisible = ref(false);

onMounted(() => {
  setTimeout(() => {
    isVisible.value = true;
  }, 700);
});
</script>
