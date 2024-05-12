<script setup>
defineProps(['error', 'router']);

const router = useRouter();

const goBack = () => {
  router.go(-1); 
};
</script>

<template>
<div class="gradient-bg h-screen w-full">
  <div class="h-screen flex justify-center items-center">
    <div class="flex items-center justify-center h-auto w-full cursor-default p-10 m-auto">
      <div class="tracking-wider text-center">
        <img src="/assets/img/cctv-cartoon-crop.gif" alt="error" class="w-auto h-40 m-auto bg-[#cbd2d7] rounded-full mb-3 border-4">  
        <p class="text-5xl mb-1 headlines">{{ error.statusCode }}</p>
        <p class="text-2xl mb-1 headlines">Oops, Access denied :( </p>
        <p class="long-text">{{ error.message }}</p>
        <div class="flex justify-center">
          <Button label="Go back" iconName="material-symbols:arrow-back-rounded" class="rounded-full bg-[#79838c] py-4 px-8 mt-5 btn" @click="goBack" :disableLoading="true"/>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
