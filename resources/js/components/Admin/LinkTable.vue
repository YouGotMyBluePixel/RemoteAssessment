<template lang="">
    <div>
     <nav-bar>
  </nav-bar>
   <div class="px-4 py-6 sm:px-0">
       <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
  <table class="table table-hover table-bordered" id="example">
    <thead>
      <tr>
        <th>ID</th>
        <th>Link Title</th>
        <th>Link</th>
        <th>New Tab</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="link in links" :key="link.id">
        <td>{{link.id}}</td>
         <td>{{link.Link_Title}}</td>
        <td>{{link.Link}}</td>
        <td>{{link.New_Tab}}</td>
      </tr>
    </tbody>
  </table>
    </div>
    </div>
    </div>
</template>
<script>
import NavBar from '../Layouts/AdminNavBar.vue'
export default {
    components: {
        NavBar
    },
    mounted(){
    //API Call
    axios
    .get("api/links")
    .then((res)=>
    {
      this.links = res.data;
     setTimeout(function(){ $("#example").DataTable(
       
     ); }, 10);
      
    })
  },
  data() {
            return {
              links:[]
            }
        },
}
</script>
<style lang="">
    
</style>