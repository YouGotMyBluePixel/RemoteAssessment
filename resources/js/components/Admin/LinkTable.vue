<template lang="">
    <div>
     <nav-bar>
  </nav-bar>
   <div class="px-4 py-6 sm:px-0">
      <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      @click="showModal()"
    >
      ADD
    </button>
     <AddLinkModal
      v-show="isAddLinkModallVisible"
      @close="closeModal"
    />
       <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
  <table class="table table-hover table-bordered" id="example">
    <thead>
      <tr>
        <th>ID</th>
        <th>Link Title</th>
        <th>Link</th>
        <th>New Tab</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="link in links" :key="link.id">
        <td>{{link.id}}</td>
         <td>{{link.Link_Title}}</td>
        <td>{{link.Link}}</td>
        <td>{{link.New_Tab ? 'true' : 'false'}}</td>
        <td>
          <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      :link="linkData"
      @click="toggleEditModal(link)"
    >
      Edit
    </button>
           <EditLinkModal
      v-show="isEditLinkModalVisible"
      @close="closeModal"
      :link="linkData"
      @editlink="editlink"
    />
    <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      :link="linkData"
      @click="toggleDeleteModal(link)"
    >
      Delete
    </button>

    <DeleteLinkModal
      v-show="isDeleteLinkModalVisible"
      @close="closeModal"
      :link="linkData"
      @deleteLink="deleteLink"
    />
        </td>
      </tr>
    </tbody>
  </table>
  
    </div>
    </div>
    </div>
</template>
<script>
import NavBar from '../Layouts/AdminNavBar.vue'
import AddLinkModal from './AddLinkModal.vue'
import EditLinkModal from './EditLinkModal.vue'
import DeleteLinkModal from './DeleteLinkModal.vue'
export default {
    components: {
        NavBar,
        AddLinkModal,
        EditLinkModal,
        DeleteLinkModal,
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
              links:[],
              isAddLinkModallVisible: false,
              isEditLinkModalVisible: false,
              isDeleteLinkModalVisible: false,
            }
        },
        methods: {
           showModal(id) {
        this.isAddLinkModallVisible = true;
      },
           closeModal() {
        this.isAddLinkModallVisible = false;
        this.isEditLinkModalVisible = false;
        this.isDeleteLinkModalVisible = false;
      },
      toggleEditModal:function(link){
        this.linkData = link;
        this.isEditLinkModalVisible = !this.isEditLinkModalVisible
      },
      toggleDeleteModal:function(link){
        this.linkData = link;
        this.isDeleteLinkModalVisible = !this.isDeleteLinkModalVisible
      },
        
    async editlink(id, updatedLink){
      this.isEditLinkModalVisible = !this.isEditLinkModalVisible
      try {
        if (updatedLink.New_Tab) {
          
            updatedLink.New_Tab= 1;
        }
        else {
           updatedLink.New_Tab= 0;
        }
        var form = new FormData()
        form.append('id', id)
        form.append('Link_Title', updatedLink.Link_Title)
        form.append('Link', updatedLink.Link)
        form.append('New_Tab', updatedLink.New_Tab)
        await axios.post( `api/links/`,
          form
        )
        location.reload();
        //Reloads Page after update button pressed
    
        console.log(updatedLink)
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
},
      // return
    
    async deleteLink(id) {
      try {
        this.isDeleteLinkModalVisible = !this.isDeleteLinkModalVisible
        await axios.delete(
          `api/links/${id}`
        )
        location.reload();
        this.$notify({
          group: 'success',
          text: 'Point was successfully deleted',
        })
        location.reload();
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
<style lang="">
    
</style>