<template>

    <body style="margin:0px">


      <div id="nav" style="margin:0px">
        <NavBar/>
      </div>
      <!--<img alt="Vue logo" src="./assets/logo.jpg">-->
      <!--<HelloWorld msg="¡Bienvenido a cocktail maps!"/>-->

      <router-view style="margin-top:60px"/>
      <br><br>
    </body>
</template>

<script>
//import HelloWorld from './components/HelloWorld.vue'
import NavBar from './components/NavBar.vue'
export default {
  name: 'App',
  components: {
    //HelloWorld,
    NavBar,
  },
  data: function(){
    return{
    }
  },
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
.jumbotron{
  background-color: #1a2632;
  color: white;
  text-align: left;
  vertical-align: middle;
  padding: 2rem 1rem;
  border-radius: 0%;
  margin-bottom: 30px;
}
.h1{
  padding-left:20px;
}
.container{
  padding-top: 20px;
}
</style>