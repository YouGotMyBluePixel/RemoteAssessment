<template lang="">

    <div>
    <nav-bar>
  </nav-bar>
  
  <div class="px-4 py-6 sm:px-0">
        <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      @click="showModal"
    >
      Add
    </button>
       <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          

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
        <td>
           <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      :pdf="pdfData"
      @click="toggleEditModal(pdf)"
    >
      Edit
    </button>
           <EditPdfModal
      v-show="isEditPdfModalVisible"
      @close="closeModal"
      :pdf="pdfData"
      @editpdf="editpdf"
    />
    <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      :pdf="pdfData"
      @click="toggleDeleteModal(pdf)"
    >
      Delete
    </button>

    <DeletePdfModal
      v-show="isDeletePdfModalVisible"
      @close="closeModal"
      :pdf="pdfData"
      @deletePdf="deletePdf"
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
import EditPdfModal from './EditPdfModal.vue'
import DeletePdfModal from './DeletePdfModal.vue'
import modal from './AddPdfModal.vue'

export default {
    components: {
      modal,
        NavBar,
        EditPdfModal,
        DeletePdfModal
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
         this.isEditPdfModalVisible = false;
        this.isDeletePdfModalVisible = false;
      },
      toggleEditModal:function(pdf){
        this.pdfData = pdf;
        this.isEditPdfModalVisible = !this.isEditPdfModalVisible
      },
      toggleDeleteModal:function(pdf){
        this.pdfData = pdf;
        this.isDeletePdfModalVisible = !this.isDeletePdfModalVisible
      },
            async editpdf(id, updatedPdf, updatedFile){
      this.isEditLinkModalVisible = !this.isEditLinkModalVisible
      try {
        var form = new FormData()
        form.append('id', id)
        form.append('name', updatedPdf.name)
        form.append('file', updatedFile)
       
       const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
        await axios.post( `api/updatepdf/`,
          form,config
        )
        location.reload();
        //Reloads Page after update button pressed
    
        
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
    
    async deletePdf(id) {
      try {
        this.isDeletePdfModalVisible = !this.isDeletePdfModalVisible
        await axios.delete(
          `api/pdfs/${id}`
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
  data() {
            return {
              pdfs:[],
              isModalVisible: false,
              isEditPdfModalVisible: false,
              isDeletePdfModalVisible: false,
            }
        },
}
</script>
<style lang="">
    
</style>