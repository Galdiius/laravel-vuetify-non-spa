<template>
    <!-- App.vue -->

<v-app>

   <Navbar v-if="routeLogin() && routeReg()"></Navbar>
  <!-- Sizes your content based upon application components -->
  <v-main>

    <!-- Provides the application the proper gutter -->
    <v-container>
        <slot name="content"></slot>
    </v-container>
  </v-main>

  <v-footer app>
    <!-- -->
  </v-footer>
</v-app>
</template>
<script>
import Navbar from './NavbarComponent'
export default {
    components : {
        Navbar
    },
    data(){
      return {
        route : window.location.pathname
      }
    },
    methods : {
      routeLogin(){
        if(this.route != '/login'){
          return true
        }
      },
      routeReg(){
        if(this.route != '/register'){
          return true
        }
      }
    }
}
</script>