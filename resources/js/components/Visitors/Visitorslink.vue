<template lang="">
    <div>
    <div>
       <VisitorNavBar></VisitorNavBar>
        <!-- content -->

        <p class="text-5xl italic font-bold">Links</p>
        <ul class="list-disc">
        <div v-for="link in links" :key="link.id">
            <button @click="LinkTab(link)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">asdasdasdsa</button>
            </div>
            </ul>
            </div>
    </div>
</template>
<script>
import VisitorNavBar from './VisitorNavBar.vue'
export default {
    data() {
        return {
            links:{},
        }
    },
    components: {
            VisitorNavBar,
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