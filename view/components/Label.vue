<template>
  <div class="flex items-center justify-start gap-1">
    <Icon :name="iconName" class="w-auto" :class="iconHeight"/>
    <p>{{ label }}</p>
  </div>
</template>

<script setup>

const props = defineProps({
  label: {
    type: String,
    default: ''
  },
  iconName: {
    type: String,
    default: ''
  },
  iconHeight: {
    type: Number,
    default: '0'
  },
});

const iconHeight = `h-${props.iconHeight}`;

</script>