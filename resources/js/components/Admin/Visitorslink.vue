<template lang="">
    <div>
    <div>
         <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Html Snippet</a>

              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Pdf</a>

              <a href="/visitorslinks" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Links</a>

            </div>
          </div>
        </div>
        </div>
        </div>
        </nav>
        <!-- content -->
        <div v-for="link in links" :key="link.id">
            <button @click="LinkTab(link)" class= "btn btn info">asdasdasdsa</button>
            </div>
            </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            links:{},
        }
    },
    methods: {
        LinkTab(link){
            if (link.New_Tab){
                window.open(link.Link, '_blank');
            }
            else
            {
                window.open(link.Link, '_self')
            }
        }
    },
    mounted(){
    //API Call
    axios
    .get("api/links")
    .then((res)=>
    {
      this.links = res.data;
    })
  },
}
</script>
<style lang="">
    
</style>