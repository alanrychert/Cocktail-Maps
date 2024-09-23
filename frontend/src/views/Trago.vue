<template>
    <div>
        <TragoComponent v-if="trago" v-bind:trago="trago"></TragoComponent>
        <br>
        <div class="container">
          <h2 v-if="tutorials" style=" margin-bottom:15px"> Tutoriales </h2>
          <div v-if="!loading">
            <div v-if="tutorials.length!=0">
              <div class="row justify-content-center" style="padding-top:15px">
                <TutorialCard v-for="tutorial of tutorials" v-bind:imgsrc="tutorial.archivos_adjuntos" v-bind:key="tutorial.id_tutorial" v-bind:id="tutorial.id_tutorial" v-bind:msg="tutorial.descripcion" v-bind:nombre="tutorial.nombre"  class="col-4 justify-content-center" style="padding-bottom:30px"/>
              </div>
              <Paginator v-bind:currentPage="page" v-on:update-page="updatePage" v-bind:lastPage="lastPage"></Paginator>
            </div>
            <div v-else>
              <div class="container">
                <p>No hay tutoriales para este trago</p>
              </div>
            </div>
          </div>
          <div v-else class="row justify-content-center">
            <br><br><br>
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
import TragoComponent from '@/components/TragoComponent.vue'
import TutorialCard from '@/components/TutorialCard.vue'
import Paginator from '../components/Paginator.vue'
import axios from "axios";
export default {
  name: 'tutorials',
  components: {
    //HelloWorld,
    TutorialCard,
    Paginator,
    TragoComponent
  },
  data: function(){
    return{
      trago: null,
      tutorials: [],
      page: 1,
      lastPage: false,
      image: null,
      loading:true,
    }
  },
  created: function() {
          this.getTrago();
          this.getPage();
    },
  methods: {
    getTrago(){
        axios
            .get("https://cocktail-maps-ws.herokuapp.com/tragos/"+this.$route.params.id)
            .then(res =>{
              this.trago=res.data[0];
            })
            .catch(err =>{
                console.log(err);
            })
      },
      getPage(){
        this.loading=true
        axios
            .get("https://cocktail-maps-ws.herokuapp.com/tutorials/byTrago/"+this.$route.params.id+"?page="+this.page)
            .then(res =>{
              this.tutorials=res.data.tutorials;
              this.lastPage=res.data.lastPage;
            })
            .catch()
            .finally(()=>{this.loading=false})
      },
      updatePage(apiPage){
          this.page = apiPage;
          this.getPage();
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