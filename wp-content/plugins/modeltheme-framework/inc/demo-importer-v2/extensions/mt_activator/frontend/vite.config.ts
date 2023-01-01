import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import Components from "unplugin-vue-components/vite";
import {AntDesignVueResolver} from "unplugin-vue-components/resolvers"
// View your website at your own local server
// for example http://vite-php-setup.test

// http://localhost:3000 is serving Vite on development
// but accessing it directly will be empty
// TIP: consider changing the port for each project, see below

// IMPORTANT image urls in CSS works fine
// BUT you need to create a symlink on dev server to map this folder during dev:
// ln -s {path_to_project_source}/src/assets {path_to_public_html}/assets
// on production everything will work just fine

import liveReload from 'vite-plugin-live-reload'
import path from 'path'

// https://vitejs.dev/config/
export default defineConfig({
  css: {
    modules: {
      scopeBehaviour: 'local'
    }
  },
  plugins: [
    Components({
      resolvers: [
        AntDesignVueResolver(),
      ],
      include: [/\.vue$/, /\.vue\?vue/, /\.md$/],
    }),
    vue(),
    liveReload([
      // edit live reload paths according to your source code
      // for example:
      __dirname + '../mt-activator.php',
      // using this for our example:
      __dirname + '../*.php',
    ])
  ],

  // config
  root: 'src',
  base: process.env.APP_ENV === 'development'
    ? '/assets'
    : '/',

  build: {
    // minify: false,
    // output dir for production build
    outDir: path.resolve(__dirname, '../assets'),
    //emptyOutDir: true,

    // emit manifest so PHP can find the hashed files
    manifest: true,
    // our entry
    rollupOptions: {
      input: 'main.ts',
      output: {
        // assetFileNames: "[name].[hash].min[extname]",
        // chunkFileNames: "[name].[hash].min.js",
        // entryFileNames: "[name].[hash].min.js",
        // dir: path.resolve(__dirname, '../assets/')
      }
    }
  },

  server: {
    // required to load scripts from custom host
    cors: true,
    hmr: {
      protocol: 'ws',
      host: 'localhost'
    }, 
    host: 'localhost',   // we need a strict port to match on PHP side
    // change freely, but update on PHP to match the same port
    strictPort: true,
    port: 3000
  },

  // required for in-browser template compilation
  // https://v3.vuejs.org/guide/installation.html#with-a-bundler
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js'
    }
  }
})