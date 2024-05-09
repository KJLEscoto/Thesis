<template>
  <button type="submit" class="btn-form bg-[#32414e]" :loading="loading" @click="handleButtonClick">
    <Icon class="w-auto h-5" name="line-md:loading-loop" v-if="loading" />
    <p v-if="!loading">Admin Login</p>
  </button>

</template>

<script setup>

const loading = ref(false)
const router = useRouter()

const handleButtonClick = () => {
  loading.value = true
  setTimeout(() => {
    loading.value = false
    router.push('#')
  }, 1700) // 2 seconds
}
</script>
