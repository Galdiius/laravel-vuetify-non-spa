<template>
    <v-app>
        <v-container>
            <v-text-field label="username" name="username"></v-text-field>
            <v-btn color="primary" type="submit">Submit</v-btn>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
