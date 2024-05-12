<template>
  <div class="h-screen w-full p-5">
    <UTabs :items="items" class="w-full">
      <template #item="{ item }">
        <div v-if="item.key === 'client'">
          <div class="flex justify-start items-center w-full mb-3 mt-5 gap-2">
            <Button label="New Client" disabled iconName="mdi:account-plus" class="bg-slate-800 rounded text-xs w-1/2" :iconHeight='5' :disableLoading="true"/>
            <UInput
            v-model="q"
            name="q"
            placeholder="Search..."
            icon="i-heroicons-magnifying-glass-20-solid"
            autocomplete="off"
            variant="none"
            :ui="{ icon: { trailing: { pointer: '' } } }"
          >
            <template #trailing>
              <UButton
                v-show="q !== ''"
                color="gray"
                variant="link"
                icon="i-heroicons-x-mark-20-solid"
                :padded="false"
                @click="q = ''"
              />
            </template>
          </UInput>
          </div>
          <div class="lg:grid lg:justify-normal flex items-center justify-center">
            <div class="lg:max-w-full md:max-w-[100vh] max-w-[60vh] overflow-auto">
              <UTable :rows="filteredRows" :columns="columns" />
            </div>
          </div>
        </div>
      </template>
    </UTabs>
  </div>
</template>

<script setup>
const columns = [{
  key: 'id',
  label: 'ID'
}, {
  key: 'name',
  label: 'Name'
}, {
  key: 'title',
  label: 'Title'
}, {
  key: 'email',
  label: 'Email'
}, {
  key: 'role',
  label: 'Role'
}]

const people = [{
  id: 1,
  name: 'Lindsay Walton',
  title: 'Front-end Developer',
  email: 'lindsay.walton@example.com',
  role: 'Member'
}, {
  id: 2,
  name: 'Courtney Henry',
  title: 'Designer',
  email: 'courtney.henry@example.com',
  role: 'Admin'
}, {
  id: 3,
  name: 'Tom Cook',
  title: 'Director of Product',
  email: 'tom.cook@example.com',
  role: 'Member'
}, {
  id: 4,
  name: 'Whitney Francis',
  title: 'Copywriter',
  email: 'whitney.francis@example.com',
  role: 'Admin'
}, {
  id: 5,
  name: 'Leonard Krasner',
  title: 'Senior Designer',
  email: 'leonard.krasner@example.com',
  role: 'Owner'
}, {
  id: 6,
  name: 'Floyd Miles',
  title: 'Principal Designer',
  email: 'floyd.miles@example.com',
  role: 'Member'
}]

const q = ref('')

const filteredRows = computed(() => {
  if (!q.value) {
    return people
  }

  return people.filter((person) => {
    return Object.values(person).some((value) => {
      return String(value).toLowerCase().includes(q.value.toLowerCase())
    })
  })
})

const items = [
  {
    key: 'client',
    label: 'Client'
  }, 
  {
    key: 'admin',
    label: 'Admin',
  },
]

definePageMeta({
  layout: 'admin-sidebar'
})
</script>
