<script setup>
import {
  Icon
} from '@iconify/vue';
</script>


<template>
<div class="gradient-bg h-full w-full">

  <div class="lg:grid-cols-2 grid-cols-1 lg:grid flex flex-col-reverse lg:h-screen h-auto w-auto lg:gap-20 gap-10 lg:p-20 p-16">

    <section class="m-auto">
      <h1 class="headlines cursor-default lg:text-3xl text-2xl mb-5 lg:text-start text-center">Empower Your Security</h1>

      <p class="long-text mb-7 cursor-default tracking-wider lg:text-start text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut laudantium aliquam beatae. Debitis accusamus aperiam odio repudiandae ea quaerat illo facilis fugiat nobis? Possimus temporibus, sed unde placeat consectetur quae?
        A, ut consequatur. Debitis iste repudiandae explicabo sit nemo natus molestiae optio neque aperiam, itaque cum illo vel quae incidunt quis deleniti ad earum provident quibusdam. Nobis odit consequuntur sint.</p>

      <div class="flex lg:justify-start justify-center">
        <nuxt-link to="/login/as-client">
            <button class="btn bg-[#3e5566] rounded-full">
              <Icon icon="lucide:cctv" class="w-auto h-5" />
              Start Monitoring
            </button>
        </nuxt-link>
      </div>
    </section>

    <section class="m-auto">
      <img src="/assets/img/cctv-crop.gif" alt="gif" class="shadow-md lg:scale-125 scale-100 border-8 rounded-full border-[#143146]">
    </section>

  </div>

</div>
</template>
