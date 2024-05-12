<script setup>
import {
  ref,
  watch
} from 'vue';
import {
  useRoute
} from 'vue-router';

const route = useRoute();

const items = ref([
  {
    title: 'Dashboard',
    path: '/admin/dashboard',
    icon: 'ic:round-dashboard',
    description: 'See Overview'
  },
  {
    title: 'List of Users',
    path: '/admin/users',
    icon: 'material-symbols:patient-list-rounded',
    description: 'Manage Users'
  },
  {
    title: 'User Log',
    path: '/admin/log',
    icon: 'fluent:history-32-filled',
    description: 'See History'
  },
  {
    title: 'Reports',
    path: '/admin/reports',
    icon: 'lucide:notebook-pen',
    description: 'Read Insights'
  }
]);

const activeItem = ref(items.value.find(item => route.path.startsWith(item.path)));

watch(route, () => {
  activeItem.value = items.value.find(item => route.path.startsWith(item.path));
});

const seeDescription = ref(null);

function setDescription(index) {
  seeDescription.value = index;
}

function resetDescription() {
  seeDescription.value = null;
}
</script>

<template>
<!--reveal-->
<div class="text-white lg:w-[250px] w-full tracking-wide">
  <header class="p-5 text-xl border-slate-700 border-b">
    <label class="font-semibold">Admin</label>
  </header>
  <section class="grow overflow-y-auto lg:max-h-[79vh] max-h-[30vh] w-auto">
    <div class="grid gap-2 w-full p-5">
      <nuxt-link :to="item.path" v-for="(item, index) in items" :key="index" class="flex items-center px-5 hover:bg-slate-500 py-2 transition cursor-pointer rounded-sm relative"  :class="[activeItem === item ? 'bg-slate-600' : '']" @mouseenter="setDescription(index)" @mouseleave="resetDescription">
        <Label :label="item.title" :iconName="item.icon" :iconHeight='5' class="gap-2"/>
        <ToolTip :label="item.description" v-if="seeDescription === index" class="lg:grid hidden -top-5 right-0"/>
      </nuxt-link>
    </div>
  </section>
</div>

<!--collapse-->
<!-- <div v-if="collapse" class="text-white w-[100px] tracking-wide">
  <header class="p-5 text-xl border-slate-700 border-b">
    <label class="font-semibold">Client</label>
  </header>
  <section class="grow overflow-y-auto" style="max-height: 79vh;">
    <div class="grid gap-2 w-full p-5">
      <nuxt-link :to="item.path" v-for="(item, index) in items" :key="index" class="flex items-center justify-start gap-2 px-5 hover:bg-slate-500 py-2 transition cursor-pointer rounded-sm" :class="[activeItem === item ? 'bg-slate-600' : '']">
        <Icon class="w-auto h-5" :name="item.icon" />
      </nuxt-link>
    </div>
  </section>
</div> -->
</template>
