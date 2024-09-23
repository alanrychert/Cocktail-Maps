<template>
    <div>
        <TutorialComponent v-if="tutorial" v-bind:tutorial="tutorial"></TutorialComponent>
        <br>
    </div>
</template>

<script>
import TutorialComponent from '@/components/TutorialComponent.vue'
import axios from "axios";
export default {
  name: 'tutorials',
  components: {
    //HelloWorld,
    TutorialComponent
  },
  data: function(){
    return{
      tutorial: null,
      page: 1,
      lastPage: false,
      image: null,
    }
  },
  created: function() {
          this.getTutorial();
    },
  methods: {
    getTutorial(){
        axios
            .get("https://cocktail-maps-ws.herokuapp.com/tutorials/"+this.$route.params.id)
            .then(res =>{
              this.tutorial=res.data[0];
            })
            .catch()
      },
  }
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
  margin-bottom: 30px;
}
.h1{
  padding-left:20px;
}
.container{
  padding-top: 20px;
}
</style>