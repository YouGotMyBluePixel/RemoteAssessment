<template lang="">
    <div>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addHtml">
                    <div class="form-group">
                        <label>Html_Title
       
       </label>
                        <input type="text" class="form-control" v-model="html.Html_Title">
                    </div>
                    <div class="form-group">
                        <label>Snippet_Description</label>
                        <input type="text" class="form-control" v-model="html.Snippet_Description">
                    </div>
                     <div class="form-group">
                        <label>Html_Snippet</label>
                        <input type="text" class="form-control" v-model="html.Html_Snippet">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios';

export default {
    data() {
            return {
                html: {}
            }
        },
        methods: {
            addHtml() {
                axios
                    .post('/api/storehtml', this.html)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
}
</script>
<style lang="">
    
</style>