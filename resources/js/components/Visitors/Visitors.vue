<template lang="">
    <div>
        <VisitorNavBar></VisitorNavBar>
        <div v-for="html in htmls" :key="html.id">
      
       <div class="container">
      <p class="language" id="language-copy">{{html.Html_Title}}</p>
      <p class="language" id="language-copy">{{html.Snippet_Description}}</p>
      <div class="code-wrapper">
        <pre>
                <code id="code">
{{html.Snippet}}
</code>
            </pre>
             <button id="copy-button" @click="addEventListener">Copy</button>
      <span id="copy-success">Code copied! :)</span>
       </div>
         
        
      </div>
    </div>
            </div>
    </div>
</template>
<script>
import VisitorNavBar from './VisitorNavBar.vue'
export default {
  components: {
            VisitorNavBar,
        },
    data() {
        return {
             htmls:[],
        }
    },
      mounted(){
    axios
    .get("api/files")
    .then((res)=>
    {
      this.htmls = res.data;
    })
  },
  methods: {
      addEventListener(){

  const codeBlock = document.getElementById('code');
  const copyButton = document.getElementById('copy-button');
  const copySuccess = document.getElementById('copy-success');

  const copyTextHandler = () => {
    const text = codeBlock.innerText;
    navigator.clipboard.writeText(text).then(
      () => {
        copySuccess.classList.add('show-message');
        setTimeout(() => {
          copySuccess.classList.remove('show-message');
        }, 2500);
      },
      () => {
        console.log('Error writing to the clipboard');
      }
    );
  };

  copyButton.addEventListener('click', copyTextHandler);
}
  },
  
}
</script>
<style>
    



.container {
  width: 500px;
  overflow-x: auto;
 display: grid;
 float: left;
height: 50%;
min-width: 540px;
 
}

.language {
    margin-top: 50px;
  color: white;
  background-color: #1f4287;
  padding: 12px 16px;
  border-radius: 5px 5px 0 0;
  text-align: right;
}

.code-wrapper {
  position: relative;
}

.code-wrapper pre {
  background-color: #071e3d;
  color: white;
  padding: 8px 20px;
  border-radius: 0 0 5px 5px;
}

#copy-button {
  position: absolute;
  top: 8px;
  right: 8px;
  padding: 7px;
  background-color: #1f4287;
  border: none;
  outline: none;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.2s ease-in;
  opacity: 0;
}

#copy-button:hover {
  background-color: #1f428790;
}

.code-wrapper:hover #copy-button {
  opacity: 1;
}

#copy-success {
  position: absolute;
  bottom: 12px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #1f4287;
  color: white;
  padding: 16px 32px;
  font-size: 24px;
  border-radius: 5px;
  display: none;
}


#copy-success.show-message {
  display: inline-block;
}

.hljs {
  background-color: transparent;
}
</style>