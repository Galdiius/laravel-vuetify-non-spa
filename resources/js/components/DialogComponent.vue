<template>
    <v-dialog v-model="dialog" persistent max-width="290">
        <template v-slot:activator="{ on, attrs }">
            <v-btn color="error" text dark v-bind="attrs" v-on="on" >
            Delete
            </v-btn>
        </template>
        <v-card>
            <v-card-title class="headline">
                Delete this post ?
            </v-card-title>
            <v-card-text>You will delete the post with the title <b>{{ article.title }}</b></v-card-text>
            <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="error darken-1" text @click="dialog = false" >
                Cancel
            </v-btn>
            <form :action="'/delete/'+article.slug" method="post">
                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="_method" value="delete">
                <v-btn type="submit" color="green darken-1" text @click="dialog = false" >
                    Yes
                </v-btn>
            </form>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
export default {
    data(){
        return {
            dialog : false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    props : ["article"]
}
</script>