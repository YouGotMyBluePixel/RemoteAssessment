<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
<!-- This example requires Tailwind CSS v2.0+ -->
<div>
  <nav-bar>
  </nav-bar>
<notifications group="success" />
   <div class="px-4 py-6 sm:px-0">
     <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      @click="showModal()"
    >
      ADD
    </button>

    <addhtml-modal
      v-show="isAddHtmlModallVisible"
      @close="closeModal"
    />
   
       <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
  <table class="table table-hover table-bordered" id="example">
    <thead>
      <tr>
        <th>ID</th>
        <th>HTML Title</th>
        <th>Snippet Description</th>
        <th>Snippet</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="html in htmls" :key="html.id">
        <td>{{html.id}}</td>
         <td>{{html.Html_Title}}</td>
        <td>{{html.Snippet_Description}}</td>
        <td>{{html.Html_Snippet}}</td>
        <td> <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      :html="htmlData"
      @click="toggleEditModal(html)"
    >
      Edit
    </button>

    <edithtml-modal
      v-show="isEditHtmlModalVisibile"
      @close="closeModal"
      :html="htmlData"
      @update="update"
    />
    <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      :html="htmlData"
      @click="toggleDeleteModal(html)"
    >
      Delete
    </button>

    <deletehtml-modal
      v-show="isDeleteModalVisibile"
      @close="closeModal"
      :html="htmlData"
      @deleteHtml="deleteHtml"
    /></td>
      </tr>
    </tbody>
  </table>
       </div>
   </div>
</div>

</template>

<script>
 import AddhtmlModal from './Admin/AddHtmlModal.vue'
 import EdithtmlModal from './Admin/EditHtmlModal.vue'
 import DeletehtmlModal from './Admin/DeleteHtmlModal.vue'
import NavBar from './Layouts/AdminNavBar.vue'
import $ from 'jquery'; 
import axios from 'axios';
Vue.use(Notifications)
import Vue           from 'vue'
import Notifications from 'vue-notification'





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
            NavBar,
            AddhtmlModal,
            EdithtmlModal,
            DeletehtmlModal,
        },
        
        data() {
          
            return {
              htmls:[],
               isAddHtmlModallVisible: false,
               isEditHtmlModalVisibile: false,
               isDeleteModalVisibile: false,
            }
        },
        
        methods: {
             showModal(id) {
        this.isAddHtmlModallVisible = true;
      },
      closeModal() {
        this.isAddHtmlModallVisible = false;
        this.isEditHtmlModalVisibile = false;
        this.isDeleteModalVisibile = false;
      },
      toggleEditModal:function(html){
        this.htmlData = html
        this.isEditHtmlModalVisibile = !this.isEditHtmlModalVisibile
      },
      toggleDeleteModal:function(html){
        this.htmlData = html
        this.isDeleteModalVisibile = !this.isDeleteModalVisibile
      },
    
      async update(id, updatedHtml) {
      this.isEditHtmlModalVisibile = !this.isEditHtmlModalVisibile
      //console.log(images)
      try {
        var form = new FormData()
        form.append('id', id)
        form.append('Html_Snippet', updatedHtml.Html_Snippet)
        form.append('Html_Title', updatedHtml.Html_Title)
        form.append('Snippet_Description', updatedHtml.Snippet_Description)
    
        await axios.post( `api/files/`,
          form
        )
        location.reload();
        //Reloads Page after update button pressed
    
        console.log(updatedHtml)
        this.$notify({
          group: 'success',
          text: 'Point updated successfully',
        })
      } catch (e) {
        this.$notify({
          group: 'error',
          text: 'An error has occurred',
        })
        console.log(e.message)
      }

      // return
    },
    async deleteHtml(id) {
      try {
        this.isDeleteModalVisibile = !this.isDeleteModalVisibile
        await axios.delete(
          `api/files/${id}`
        )
        location.reload();
        this.$notify({
          group: 'success',
          text: 'Point was successfully deleted',
        })
      } catch (error) {
        this.$notify({
          group: 'error',
          text: 'An error has occurred',
        })
       
      }
    },
        },
        
        
    }

</script>

