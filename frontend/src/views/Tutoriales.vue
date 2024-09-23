<template>
  <div>
    <h2 class="h2" style="padding-top:5vh; padding-left: 2vw">Buscar en la página actual:</h2>
    <div class="container">
      <div class="row">
        <div class="col col-9">
          <b-form-input v-model="input" size="sm" class="mr-sm-2" placeholder="Buscar"></b-form-input>
        </div>
        <div class="col col-3" style="padding-left:0px">
          <select name="" id="filterSelectorTutorials" style="width:100%; height:100%">
            <option value="nombre">Nombre</option>
            <option value="autor">Autor</option>
            <option value="etiqueta">Etiqueta</option>
          </select>
        </div>
      </div>
    </div>
    <br>
    <hr style="background-color:#343a40 !important; margin: 0 2vw 0 2vw">
    <div class="container">
      <div v-if="!loading">
        <Paginator v-bind:currentPage="page" v-on:update-page="updatePage" v-bind:lastPage="lastPage"></Paginator>
        <br>
        <div class="row justify-content-center">
          <TutorialCard v-for="tutorial of filteredTutorials" v-bind:imgsrc="tutorial.archivos_adjuntos" v-bind:key="tutorial.id_tutorial" :id="tutorial.id_tutorial" v-bind:msg="tutorial.descripcion" v-bind:nombre="tutorial.nombre"  class="col-lg-4 col-md-6 justify-content-center" style="padding-bottom:30px"/>
        </div>
        <Paginator v-bind:currentPage="page" v-on:update-page="updatePage" v-bind:lastPage="lastPage"></Paginator>
      </div>
      <div v-else class="row justify-content-center">
        <br><br><br>
        <div class="spinner-border" style="text-align:center" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TutorialCard from '@/components/TutorialCard.vue';
import Paginator from '@/components/Paginator.vue'
import axios from "axios";
export default {
  name: 'tutorials',
  components: {
    //HelloWorld,
    TutorialCard,
    Paginator,
  },
  data: function(){
    return{
      tutorials: [],
      page: 1,
      loading: true,
      lastPage: false,
      image: null,
      input: "",
    }
  },
  created: function() {
          this.getPage();
    },
  computed: {
    filteredTutorials:function() {
      const filterOption = document.getElementById("filterSelectorTutorials").value
      if (filterOption == "nombre")
        return this.tutorials.filter((tutorial) =>{
          return tutorial.nombre.toString().match(this.input)
        })
      else if (filterOption == "autor")
        return this.tutorials.filter((tutorial) =>{
          return tutorial.autor.toString().match(this.input)
        })
        else
          return this.tutorials.filter((tutorial) =>{
            let match=this.input==""
            for (let i=0; i<tutorial.etiquetas.length && !match ;i++)
              match=tutorial.etiquetas[i].nombre.match(this.input)
          return match
        })
    }
  },
  methods: {
      getPage(){
        this.loading=true;
        axios
            .get("http://localhost:80/tutorials?page="+this.page)
            .then(res =>{
              this.tutorials=res.data.tutorials;
              this.lastPage=res.data.lastPage;
            })
            .catch()
            .finally(() => {this.loading=false})
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