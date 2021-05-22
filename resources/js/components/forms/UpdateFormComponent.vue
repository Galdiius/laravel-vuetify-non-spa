<template>
    <v-row class="mt-4">
        <v-col lg="6">
            <input type="hidden" name="_token" :value="csrf">
            <v-text-field label="Title" :value="article.title" outlined></v-text-field>
            <v-select :items="['Education','Tips']" :value="article.category" outlined label="Category"></v-select>
            <v-file-input label="Image" @change="previewImage($event)" outlined></v-file-input>
            <v-img :src="url" class="my-3"></v-img>
            <v-textarea outlined label="Body" :value="article.body"></v-textarea>
            <v-btn type="submit" color="success">update</v-btn>
        </v-col>
    </v-row>
</template>
<script>
export default {
    data(){
        return {
            csrf : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            url : 'img/'+this.article.image
        }
    },
    methods : {
        previewImage(e){
            if(e){
                this.url = URL.createObjectURL(e)
            }else{
                this.url = ""
            }
        }
    },
    props : ['article']
}
</script>