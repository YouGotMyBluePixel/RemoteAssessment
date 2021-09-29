<template lang="">
<transition name="modal-fade">
    <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <slot name="header">
          Add Links
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
           <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addLink">
                    <div class="form-group">
                        <label>Link Title 
       </label>
                        <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" v-model="Title">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" v-model="Link" >
                    </div>
                     <div class="form-group">
                        <label class="font-light">*Open in new tab</label>
                        <input type="checkbox" v-model="Tab">
                    </div>
                  <button type="submit" class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Create</button>
                </form>
            </div>
        </div>
        </slot>
       </section>

      <footer class="modal-footer">
        <slot name="footer">
        
        </slot>
          
        <button
          type="button"
          class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          @click="close"
        >
          Close Modal
        </button>
      </footer>
    </div>
  </div>
  </div>
    </transition>
</template>
<script>



export default {

     data() {
            return {
                link: {},
                Title:'',
                Link:'',
                Tab:0,

            }
        },
    methods: {
      close() {
        this.$emit('close');
      },
      addLink() {
            axios
                    .post('/api/links', {
                        Link_Title:this.Title,
                        Link:this.Link,
                        New_Tab:this.Tab

                    })
                    .then(response => (
                        this.$router.push()
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
                    location.reload();
            }
    },
    async mounted() {
        
        console.log(this.Tab);
    },
    components: {
       
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
 .modal-fade-enter,
  .modal-fade-leave-to {
    opacity: 0;
  }

  .modal-fade-enter-active,
  .modal-fade-leave-active {
    transition: opacity .4s ease;
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