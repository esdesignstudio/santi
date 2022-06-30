import { defineNuxtConfig } from 'nuxt'
import { resolve } from 'path'

// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
    css: [
        '@/style/_main.scss', // global css
    ],
    vite: {
        css: {
            preprocessorOptions: {
            scss: {
                additionalData: '@import "@/style/mixins/_mixin.scss";',
            },
            },
        },
        resolve:{
            alias: {
                '~': resolve(__dirname, './assets/')
            }
        },
    },
    meta: {
        title: process.env.APP_NAME,
        charset: 'utf-8',
        meta: [
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { property: 'og:locale', content: 'en' },
            { property: 'og:type', content: 'website' },
            { hid: 'og:title', property: 'og:title', content: '' },
            { hid: 'og:description', property: 'og:description', content: '' },
            { hid: 'og:url', property: 'og:url', content: '' },
            { hid: 'og:site_name', property: 'og:site_name', content: '' },
            { property: 'og:image:width', content: '1200' },
            { property: 'og:image:height', content: '630' },
            { name: 'twitter:card', content: 'summary_large_image' },
            { hid: 'twitter:description', name: 'twitter:description', content: '' },
            { hid: 'twitter:title', name: 'twitter:title', content: '' },
            { hid: 'twitter:image', name: 'twitter:image', content: '' },
        ],
        link: [
            { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico?v1' },
            {
                href: 'https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&family=Poppins:wght@400;600&display=swap',
                rel: 'stylesheet',
            },
        ],
    },
    experimental: {
        reactivityTransform: true,
    },
    asyncEntry: true,
    runtimeConfig: {
        public: {
            apiBase: 'http://localhost:9000/wp-json/api',
            functionBase: 'http://localhost:9000/wp-admin/admin-ajax.php',
        },
    },
})
