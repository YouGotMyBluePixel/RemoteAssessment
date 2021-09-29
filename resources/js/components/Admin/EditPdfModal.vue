<template lang="">
<transition name="modal-fade">
    <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <slot name="header">
          Edit File and Title
        </slot>
        <button
          type="button"
          class="btn-close"
          @click="close"
        >
          x
        </button>
      </header>
      <section class="modal-body">
        <slot name="body">
          <div class="grid grid-cols-1 space-y-2">
             <input type="text" class="form-control" v-model="pdf.name">
              <input type="file" class="form-control" v-on:change="onChange">
            </div>
             <button
              @click="$emit('editpdf', pdf.id, pdf, file)"
              class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
            >
              Save Changes
            </button>
        </slot>
       </section>

      <footer class="modal-footer">
        <!-- <slot name="footer"> -->
          
        <!-- </slot> -->
        <button
             @click="close"
              class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
            >
            Close
            </button>
      </footer>
    </div>
  </div>
  </div>
  </transition>
</template>
<script>



export default {

props: {
    pdf: Object,
  },
    methods: {
      close() {
        this.$emit('close');
      },
       onChange(e) {
                this.file = e.target.files[0];
            },
    },
    updateLink() {
      this.LinkInfo.push({
        name: this.Link.name,
      })
      console.log(this.Link)
    },
    components: {
        
    },
    data() {
    return {
      name: '',
      path: '',
      file: '',
     
    }
  },
    
  
}
</script>
<style>
  .modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    width: 600px;
  }

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    position: relative;
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    flex-direction: column;
    justify-content: flex-end;
  }

  .modal-fade-enter,
  .modal-fade-leave-to {
    opacity: 0;
  }

  .modal-fade-enter-active,
  .modal-fade-leave-active {
    transition: opacity .4s ease;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
  }

  .btn-close {
    position: absolute;
    top: 0;
    right: 0;
    border: none;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }
</style>