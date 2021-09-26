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
        <th>Name</th>
        <th>Link</th>
        <th>New Tab</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="pdf in pdfs" :key="pdf.id">
        <td>{{pdf.id}}</td>
         <td>{{pdf.name}}</td>
        <td>{{pdf.path}}</td>
        <td>{{pdf.New_Tab}}</td>
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
    .get("api/pdfs")
    .then((res)=>
    {
      this.pdfs = res.data;
     setTimeout(function(){ $("#example").DataTable(
     ); }, 10);
      
    })
  },
  data() {
            return {
              pdfs:[]
            }
        },
}
</script>
<style lang="">
    
</style>