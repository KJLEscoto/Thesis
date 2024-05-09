<template>
  <div class="flex lg:justify-start justify-center">
    <button class="btn bg-[#79838c] rounded-full" :loading="loading" @click="handleButtonClick">
      <Icon class="w-auto h-5" name="line-md:loading-loop" v-if="loading" />
      <Icon class="w-auto h-5" name="lucide:cctv" v-if="!loading" />
      <p class="m-0">Start Monitoring</p>
    </button>
  </div>
</template>

<script setup>

const loading = ref(false)
const router = useRouter()

const handleButtonClick = () => {
  loading.value = true
  setTimeout(() => {
    loading.value = false
    router.push('/login/as-client')
  }, 2000) // 2 seconds
}
</script>
