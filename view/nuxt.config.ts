// https://nuxt.com/docs/api/configuration/nuxt-config
import { resolve } from "path";
export default defineNuxtConfig({
  modules: ['nuxt-icon', '@nuxt/ui'],
  devtools: { enabled: true },
  alias: {
    "@": resolve(__dirname, "/")
  },
  css: [
    "~/assets/css/main.css"
  ],
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
})