<template lang="">
<transition name="modal-fade">
    <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <slot name="header">
          EDIT
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
              <label class="text-sm font-bold text-gray-500 tracking-wide"
                >Link Title</label
              >
              <input
                class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type=""
                placeholder="Title"
                v-model="link.Link_Title"
              />
            </div>
            <div class="grid grid-cols-1 space-y-2">
              <label class="text-sm font-bold text-gray-500 tracking-wide"
                >Link</label
              >
              <input
                class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type=""
                placeholder="Description"
               v-model="link.Link"
              />
            </div>
            <div class="grid grid-cols-1 space-y-2">
              <label class="text-sm font-bold text-gray-500 tracking-wide"
                >Open in new tab:</label
              >
              <input
                class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type="checkbox"
                placeholder="Snippet"
                v-model="link.New_Tab"
              />
            </div>
             <button
              @click="$emit('editlink', link.id, link)"
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
    link: Object,
  },
    methods: {
      close() {
        this.$emit('close');
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
      Link_Title: '',
      Link: '',
      New_Tab: '',
     
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