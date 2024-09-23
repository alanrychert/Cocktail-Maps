<template>
    <div class="container-fluid">
        <h2 class="h2" style="padding-top:5vh; padding-left: 2vw; padding-right:2vw; text-align:center">Prepárate el trago que quieras</h2>
        <div class="container" style="padding-left:2vw; padding-right:2vw">
            <div class="row justify-center" styel="padding-left:2vw">
                <div class="col col-9">
                    <b-form-input v-model="toSearch" size="sm" class="mr-sm-2" placeholder="Nombre del trago"></b-form-input>
                </div>
                <div class="col col 3" style="padding-left:0%">
                    <b-button size="sm" style="width:inherit; background-color: #343a40 !important" @click="submit">Buscar</b-button>
                </div>
            </div>
            <br>
        </div>
        <hr style="background-color:#343a40 !important; margin: 0 2vw 0 2vw">
        <div v-if="!loading">
            <div class="container" style="padding-top:5vh; padding-left:2vw; padding-right:2vw">
                <div v-if="found">
                    <div class="container-fluid" v-if="tragoInfo">
                        <h2 style="text-align:center">{{tragoInfo.strDrink}}</h2>
                        <div class="container" style="padding:2vw">
                            <b-img center fluid v-bind:src="tragoInfo.strDrinkThumb" style="max-height:60vh !important; padding-left:2vw"></b-img>
                        </div>
                        <br>
                        <h2>Ingredientes:</h2>
                        <li v-for="ingredient in notNullIngredients" v-bind:key="ingredient">
                            {{ingredient}}
                        </li>
                        <br>
                        <h2>Instrucciones:</h2>
                        <p>{{instrucciones}}</p>

                    </div>
                </div>
                <div v-else style="text-align:center">
                    <h3>No se ha encontrado un trago con ese nombre</h3>
                </div>
            </div>
        </div>
        <div v-else class="row justify-content-center" style="margin-top:5vh">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "tragoAPI",
    data: function(){
        return{
            toSearch: "",
            tragos: null,
            loading: null,
            tragoInfo: null,
            ingredientes: [],
            instrucciones: "",
            found: true
        }
    },
    computed:{
        notNullIngredients(){
          return this.ingredientes.filter((ingrediente) =>{
            return ingrediente!=null
          })
        }
    },
    methods:{
    submit(){
      this.loading=true;
        axios
            .get("https://www.thecocktaildb.com/api/json/v1/1/search.php?s="+this.toSearch)
            .then(res =>{
              this.tragos=res.data.drinks;
            })
            .catch(err =>{
                console.log(err);
            })
            .finally(() => {
                if (this.tragos!=null) {
                    this.getTragoInfo()
                    this.found=true
                }
                else{
                    this.loading=false
                    this.found=false
                }
            })
      this.toSearch=""
    },
    getTragoInfo(){
        axios
            .get("https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i="+this.tragos[0].idDrink)
            .then(res =>{
              this.tragoInfo=res.data.drinks[0];
            })
            .catch()
            .finally(() => {
                this.getIngredients()
                this.getInstructions()
                this.loading = false
                })
    },
    getIngredients(){
        this.ingredientes.push(
            this.tragoInfo.strIngredient1,
            this.tragoInfo.strIngredient2,
            this.tragoInfo.strIngredient3,
            this.tragoInfo.strIngredient4,
            this.tragoInfo.strIngredient5,
            this.tragoInfo.strIngredient6,
            this.tragoInfo.strIngredient7,
            this.tragoInfo.strIngredient8,
            this.tragoInfo.strIngredient9,
            this.tragoInfo.strIngredient10,
            this.tragoInfo.strIngredient11,
            this.tragoInfo.strIngredient12,
            this.tragoInfo.strIngredient13,
            this.tragoInfo.strIngredient14,
            this.tragoInfo.strIngredient15
            )
    },
    getInstructions(){
        this.instrucciones = this.tragoInfo.strInstructions
    }
  }
}
</script>