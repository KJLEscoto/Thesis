<template>
  <button type="submit" class="btn w-auto h-auto p-2" :loading="loading" @click="handleButtonClick">
    <Icon class="w-auto h-auto" name="line-md:loading-loop" v-if="loading" />
    <div v-if="!loading" class="flex justify-center items-center gap-2">
      <Icon :name="iconName" class="w-auto" :class="iconHeight" v-if="iconName"/>
      <p v-if="iconName || label">{{ label }}</p>
    </div>
  </button>
  
</template>

<script setup>

const loading = ref(false)
const router = useRouter()

const props = defineProps({
  label: {
    type: String,
    default: ''
  },
  iconName: {
    type: String,
    default: ''
  },
  disableLoading: {
    type: Boolean,
    default: false
  },
  route: {
    type: String,
    default: '#'
  },
  iconHeight: {
    type: Number,
    default: 0
  },
});

const iconHeight = `h-${props.iconHeight}`;

const handleButtonClick = () => {
  if (!loading.value ) {
    if(!props.disableLoading) {
      loading.value = true;
      setTimeout(() => {
        loading.value = false;
        router.push(props.route);
      }, 1500);
    } else {
      router.push(props.route);
    }
  }
};
</script>
