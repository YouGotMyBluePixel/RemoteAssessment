<template lang="">

    <div>
    <nav-bar>
  </nav-bar>
  
  <div class="px-4 py-6 sm:px-0">
        
       <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <button
      type="button"
      class="btn"
      @click="showModal"
    >
      New
    </button>

    <modal
      v-show="isModalVisible"
      @close="closeModal"
    />
  <table class="table table-hover table-bordered" id="example">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Path</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="pdf in pdfs" :key="pdf.id">
        <td>{{pdf.id}}</td>
         <td>{{pdf.name}}</td>
        <td>{{pdf.path}}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
    </div>
    </div>
    </div>
</template>
<script>
import NavBar from '../Layouts/AdminNavBar.vue'
import modal from './AddPdfModal.vue'
export default {
    components: {
      modal,
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
   methods: {
             showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      }
    
            
        },
  data() {
            return {
              pdfs:[],
              isModalVisible: false
            }
        },
}
</script>
<style lang="">
    
</style>