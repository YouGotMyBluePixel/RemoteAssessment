<template lang="">
    <div>
        
    </div>
</template>
 
 
<script>
    export default {
        data() {
            return {
                html: {},
                
            }
        },
        created() {
            axios
                .get(`api/files/`+this.html.id)
                .then((res) => {
                    this.html = res.data;
                });
        },
        methods: {
            updateHtml(id) {
                axios
                    .patch(`api/files/`+this.html.id)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                        
                    });
            }
        }
    }
</script>