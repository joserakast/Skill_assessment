<template>
  <AppLayout title="contacts">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          FAVORITES
      </h2>
    </template>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <!-- component -->
      <div class="bg-white">

      <div class="overflow-x-auto border-x border-t">

        <table v-if="favorites.length != 0" class="table-auto w-full">
            <thead class="border-b">
              <tr class="bg-gray-100">
                  <th class="text-left p-4 font-medium">
                
                  </th>
                  <th class="text-left p-4 font-medium">
                    
                  </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="favorite in favorites" :key="favorite" class="border-b hover:bg-gray-50">
                  <td class="p-4">
                    {{favorite.quote}}
                  </td>
                  <td class="p-4 truncate w-10">
                    <button class="text-white bg-red-500 p-2 rounded ml-2" data-ripple-light="true" @click="destroy(favorite.id)">Delete</button>
                  </td>
              </tr>
            </tbody>
        </table>
        <div v-else class="text-3xl text-center p-4">No favorites added</div>
      </div>
      </div>

    </div>

  </AppLayout>

</template>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import Input from '@/Jetstream/input.vue'
import {Link} from '@inertiajs/inertia-vue3'

export default {
  components: {
    AppLayout,
    Input,
    Link
  },
  data() {
    return {
      quotes: [],
      numQuotes: 5
      
    }
  },
  methods: {
    destroy(favorite) {
      this.$inertia.delete(this.route('quotes.destroy', favorite));
    }
  },
  props: { 
    favorites: { 
      type: Array,
      required: true
    }
  },
}

</script>

<style>

</style>