<template lang="">
    <div>
         <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/visitors" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Html Snippet</a>

              <a href="/visitorspdf" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Pdf</a>

              <a href="/visitorslinks" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Links</a>

            </div>
          </div>
        </div>
        </div>
        </div>
        </nav>
        <div v-for="html in htmls" :key="html.id">
      
       <div class="container">
      <p class="language" id="language-copy">{{html.Html_Title}}</p>
      <div class="code-wrapper">
        <pre>
                <code id="code">
function fibonacci(num)
{
  var num1=0;
  var num2=1;
  var sum;
  var i=0;
  for (i = 0; i < num; i++)
    {
      sum=num1+num2;
      num1=num2;
      num2=sum;
    }
    return num2;
} 
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
export default {
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