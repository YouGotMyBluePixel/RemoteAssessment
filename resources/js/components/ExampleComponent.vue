<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
<!-- This example requires Tailwind CSS v2.0+ -->
<div>
  <nav-bar>
  </nav-bar>
   <div class="px-4 py-6 sm:px-0">
        
       <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
  <table class="table table-hover table-bordered" id="example">
    <thead>
      <tr>
        <th>ID</th>
        <th>HTML Title</th>
        <th>Snippet Description</th>
        <th>Snippet</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="html in htmls" :key="html.id">
        <td>{{html.id}}</td>
         <td>{{html.Html_Title}}</td>
        <td>{{html.Snippet_Description}}</td>
        <td>{{html.Html_Snippet}}</td>
      </tr>
    </tbody>
  </table>
       </div>
   </div>
</div>

</template>

<script>
import FileUpload from './Admin/FileUpload.vue'
import InputForm from './Admin/InputForm.vue'
import NavBar from './Layouts/AdminNavBar.vue'
import $ from 'jquery'; 
import axios from 'axios';




    export default {
         mounted(){
    //API Call
    axios
    .get("api/files")
    .then((res)=>
    {
      this.htmls = res.data;
     setTimeout(function(){ $("#example").DataTable(
       
     ); }, 10);
      
    })
  },
        components: {
            FileUpload,
            InputForm,
            NavBar
        },
        
        data() {
            return {
              htmls:[]
            }
        },
        
        methods: {
            
            
        },
        
        
    }

</script>

