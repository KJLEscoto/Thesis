<template>
  <div class="lg:flex grid items-start gradient-bg w-full">
    <section class="bg-slate-800 lg:fixed grid inset-y-0 left-0 h-full">
      <Sidebar/>
    </section>
    <section class="lg:ml-64 lg:mt-0 mt-16 ml-0 w-full h-auto">
      <slot />
    </section>
  </div>
</template>
