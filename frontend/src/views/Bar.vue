<template>
  <div>
    <BarComponent v-if="bar" v-bind:bar="bar"></BarComponent>
    <div class="container">
      <h2 style="margin-bottom:15px"> Tragos </h2>
      <div v-if="!loading">
        <div v-if="tragos.length!=0">
          <div class="row justify-content-center" style="padding-top:15px">
              <TragoCard v-for="trago of tragos" v-bind:imgsrc="trago.archivos_adjuntos" v-bind:key="trago.id_trago" v-bind:id="trago.id_trago" v-bind:msg="trago.descripcion" v-bind:precio="trago.precio" v-bind:nombre="trago.nombre"  class="col-4 justify-content-center" style="padding-bottom:30px"/>
          </div>
          <Paginator v-bind:currentPage="page" v-on:update-page="updatePage" v-bind:lastPage="lastPage"></Paginator>
        </div>
        <div v-else>
          <div class="container">
            <p>Aún no se han cargado tragos de este bar.</p>
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
import BarComponent from '@/components/BarComponent.vue'
import TragoCard from '@/components/TragoCard.vue'
import Paginator from '@/components/Paginator.vue'
import axios from "axios";
export default {
  name: 'bar',
  components: {
    //HelloWorld,
    TragoCard,
    Paginator,
    BarComponent,
  },
  data(){
    return{
      bar: null,
      tragos: [],
      page: 1,
      lastPage: false,
      image: null,
      loading:true,
    }
  },
  mounted: function() {
          this.getBar();
          this.getPage();
    },
  methods: {
      getBar(){
        axios
            .get("http://localhost:80/bars/"+this.$route.params.id)
            .then(res =>{
              this.bar=res.data[0];
            })
            .catch(err =>{
                console.log(err);
            })
      },
      getPage(){
        this.loading=true
        axios
            .get("http://localhost:80/tragos/byBar/"+this.$route.params.id+"?page="+this.page)
            .then(res =>{
              this.tragos=res.data.tragos;
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
  text-align: center;
}
.container{
  padding-top: 20px;
}
.inlist-text{
   padding-left:15px;
}
</style>