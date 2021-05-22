<template>
<div>
    <v-app-bar
      color="deep-purple accent-4"
      dense
      dark
      app
    >
      <v-app-bar-nav-icon @click.stop="drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>Crud laravel</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer
      :mini-variant.sync="mini"
      app
      v-model="sidebarmenu"
      :permanent="sidebarmenu"
    >
      <v-list-item class="px-2">
        <v-btn
          icon
          @click.stop="mini = !mini"
        >
          <v-icon>{{ mini ? 'mdi-chevron-right' : 'mdi-chevron-left' }}</v-icon>
        </v-btn>
      </v-list-item>

      <v-divider></v-divider>

      <v-list dense>
        <v-list-item
          v-for="item in items"
          :key="item.title"
        >
          <a :href="item.link" style="text-decoration:none">
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>
          </a>
          <a :href="item.link" style="text-decoration:none;" class="white--text">
            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
            
          </a>
        </v-list-item>
        <v-list-item  @click="dialog = true">
          <a style="text-decoration:none">
            <v-list-item-icon>
              <v-icon>mdi-logout</v-icon>
            </v-list-item-icon>
          </a>
          <a style="text-decoration:none;" class="white--text">
            <v-list-item-content>
              <v-list-item-title>Log out</v-list-item-title>
            </v-list-item-content>
            
          </a>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-dialog v-model="dialog" max-width="290" >
      <v-card>
        <v-card-title class="headline text-center">
          Log out
        </v-card-title>

        <v-card-text>
          Are you sure you want to log out?
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn color="error" text @click="dialog = false" >
            Cancel
          </v-btn>

          <v-btn color="success" href="/logout" text @click="dialog = false" >
            Yes
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</div>

    
</template>
<script>
export default {
  data(){
    return {
      dialog : false,
      sidebarmenu : true,
      items: [
          { title: 'Home', icon: 'mdi-home',link:"/" },
          { title: 'Create Post', icon: 'mdi-pencil',link:"/create" },
        ],
      mini: true,
    }
  },
  methods : {
    drawer(){
      this.sidebarmenu = !this.sidebarmenu
    }
  }
}
</script>