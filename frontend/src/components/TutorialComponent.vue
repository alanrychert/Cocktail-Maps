<template>
    <div>
        <b-img v-bind:src="getImage(tutorial.archivos_adjuntos)" class="img-header" style="width:100%;"></b-img>
        <div class="container">
          <div>
            <h1 class="h1"> {{tutorial.nombre}} </h1>
                <h2>Instructivo</h2>
                <br>
                <div class="inlist-text">
                  {{tutorial.descripcion}}
                  <br><br>
                </div>
                <h2>Autor</h2>
                <br>
                <div class="inlist-text">
                  <h4>{{tutorial.autor}}</h4>
                </div>
          </div>
          <br>
          <tag-lister v-bind:tags="tutorial.etiquetas"></tag-lister>
          <br>
          <button class="btn btn-dark" @click="verTrago">Ver trago del tutorial</button>
        </div>
    </div>
</template>

<script>
import default_image from "@/assets/noImage.png"
import TagLister from "@/components/TagLister.vue"

export default {
    name: "tutorial-component",
    components:{
        TagLister
    },
    props:{
        tutorial:null,
    },
    methods: {
      getImage(src){
        if (src==null)
          src=default_image
        return src
      },
      verTrago(){
        this.$router.push("/tragos/"+this.tutorial.id_trago)
      }
    }
}
</script>