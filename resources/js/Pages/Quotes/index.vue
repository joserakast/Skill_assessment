<template>
  <AppLayout title="contacts">

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Kanye West Qoutes
      </h2>
    </template>

    

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

      <div v-show="open" class="p-4 bg-green-200 text-center mb-2 rounded">Quote was added to favorites successfully</div>
 
      <div class="bg-white">

      <div class="overflow-x-auto border-x border-t">
        <div class="px-6 py-4 flex items-center">
          <Input type="text" class="mr-2" placeholder="Num quotes" v-model="numQuotes" v-on:keyup.enter="refresh" />
          <Input type="text" class="flex-1" placeholder="Search" v-model="search" v-on:keyup="filterQuote" />
          
          <button v-on:click="refresh" class="text-white bg-blue-500 p-2 rounded ml-2">Refresh</button>
        </div>


        <table class="table-auto w-full">
            <thead class="border-b">
              <tr class="bg-gray-100">
                  <th class="text-left p-4 font-medium">
                
                  </th>
                  <th class="text-left p-4 font-medium">
                    
                  </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="quote in quotes" :key="quote" class="border-b hover:bg-gray-50" style="cursor:pointer">
                  <td class="p-4">
                    {{quote}}
                  </td>
                  <td class="p-4 truncate w-10">
                    <button class="text-white bg-blue-500 p-2 rounded" @click="store(quote)">
                        <i class="fas fa-star text-yellow-500"></i> Add Favorites
                    </button> 
                  </td>
              </tr>
            </tbody>
        </table>
       
      </div>
      </div>

    </div>

  </AppLayout>

</template>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import Input from '@/Jetstream/input.vue'
import PicBy from 'lodash/pickBy'
import {Link} from '@inertiajs/inertia-vue3'

export default {
  components: {
    AppLayout,
    Input,
    Link
  },
  data() {
    return {
      search: '',
      open: false,
      quotes: [],
      quotesCopy: [],
      numQuotes: 5,
      favorite: {
        quote: ''
      }
      
    }
  },
  methods: {
    async getQuote() {
      return await fetch('https://api.kanye.rest/')
       .then((response) => response.json()).then(data => {
         //this.quote = data.quote;
        return data.quote;
       });
    },
    async refresh() {
      let i = 0;
      let temp = [];

      for(i = 0; i < this.numQuotes; i++) {
        temp.push(await this.getQuote());
      }

      this.quotes = [];
      this.quotes = temp;
      this.quotesCopy = temp;
    },
    showMessage() {
     this.open = true;
    },
    hideMessage() {
      this.open = false;
    },
    store(quote) {
      this.favorite.quote = quote;
      this.$inertia.post(this.route('quotes.store', this.favorite));

      this.showMessage();

      setTimeout(() => this.hideMessage(), 2000);
    },
    filterQuote() {

      if(this.search == '' || this.quotes.length == 0) {
          this.quotes = this.quotesCopy;
      } else {
          let i;
          let filterQuote = [];
          for(i = 0; i < this.quotes.length; i++) {
            this.quotes = this.quotesCopy;
            if(this.quotesCopy[i].includes(this.search)) {
                filterQuote.push(this.quotes[i]);
            }
          }
          
          this.quotes = filterQuote;
      }
    }
  },
  mounted() {
    this.refresh();
  }

}

</script>

<style>

</style>