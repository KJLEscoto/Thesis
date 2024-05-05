<script setup>
import {
  ref,
  watch,
  getCurrentInstance
} from 'vue';
import {
  useRoute
} from 'vue-router';

const route = useRoute();

const items = ref([{
    title: 'Monitor',
    path: '/client/test',
    icon: 'mdi:monitor-dashboard'
  },
  {
    title: 'Notifications',
    path: '/client/notifications',
    icon: 'ph:notification-bold'
  },
  {
    title: 'Settings',
    path: '/client/settings',
    icon: 'carbon:settings-services'
  }
]);

const activeItem = ref(items.value.find(item => route.path.startsWith(item.path)));

watch(route, () => {
  activeItem.value = items.value.find(item => route.path.startsWith(item.path));
});
</script>

<template>
<div class="text-white w-auto tracking-wide">
  <header class="p-5 text-xl border-slate-700 border-b">
    <label class="font-semibold">Client</label>
  </header>
  <section class="grow">
    <div class="grid gap-2 w-full p-5">
      <nuxt-link :to="item.path" v-for="(item, index) in items" :key="index" class="flex items-center justify-start gap-2 px-5 hover:bg-slate-500 py-2 transition cursor-pointer rounded-sm" :class="[activeItem === item ? 'bg-slate-700' : '']">
        <Icon class="w-auto h-5" :name="item.icon" />
        <span>{{ item.title }}</span>
      </nuxt-link>
    </div>
  </section>
</div>
</template>
