<template>
  <div>
    <h2 class="h2" style="padding-top:5vh; padding-left: 2vw">Buscar en la página actual:</h2>
    <div class="container">
      <div class="row">
        <div class="col col-9">
          <b-form-input v-model="input" size="sm" class="mr-sm-2" placeholder="Buscar"></b-form-input>
        </div>
        <div class="col col-3" style="padding-left:0px">
          <select name="" id="filterSelectorTragos" style="width:100%;height:100%">
            <option value="nombre">Nombre</option>
            <option value="precio-max">Precio max</option>
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
          <TragoCard v-for="trago of filteredTragos" v-bind:imgsrc="trago.archivos_adjuntos" v-bind:key="trago.id_trago" v-bind:id="trago.id_trago" v-bind:ingredientes="trago.ingredientes" v-bind:precio="trago.precio" v-bind:nombre="trago.nombre"  class="col-lg-4 col-md-6 justify-content-center" style="padding-bottom:30px"/>
        </div>
        <Paginator v-bind:currentPage="page" v-on:update-page="updatePage" v-bind:lastPage="lastPage"></Paginator>
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
import TragoCard from '@/components/TragoCard.vue';
import Paginator from '@/components/Paginator.vue'
import axios from "axios";
export default {
  name: 'Tragos',
  components: {
    //HelloWorld,
    TragoCard,
    Paginator,
  },
  data: function(){
    return{
      tragos: [],
      page: 1,
      loading: true,
      lastPage: false,
      image: null,
      input: "",
    }
  },
  computed: {
      filteredTragos:function() {
        const filterOption = document.getElementById("filterSelectorTragos").value
        if (filterOption == "nombre")
          return this.tragos.filter((trago) =>{
            return trago.nombre.toString().match(this.input)
          })
        else if (filterOption == "precio-max")
          return this.tragos.filter((trago) =>{
            return this.input==0 || trago.precio<this.input
          })
          else
            return this.tragos.filter((trago) =>{
              let match=this.input==""
              for (let i=0; i<trago.etiquetas.length && !match ;i++)
                match=trago.etiquetas[i].nombre.match(this.input)
            return match
          })
      }
    },
  created: function() {
          this.getPage();
    },
  methods: {
      getPage(){
        this.loading=true;
        axios
            .get("http://localhost:80/tragos?page="+this.page)
            .then(res =>{
              this.tragos=res.data.tragos;
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