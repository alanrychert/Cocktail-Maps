<template>
    <div>
        <b-img v-bind:src="getImage(trago.archivos_adjuntos)" class="img-header" style="width:100%;"></b-img>
        <div class="container">
          <div>
            <h1 class="h1"> {{trago.nombre}} </h1>
                <h2>Ingredientes</h2>
                <br>
                <div class="inlist-text">
                  {{trago.ingredientes}}
                  <br><br>
                </div>
                <h2>Precio</h2>
                <br>
                <div class="inlist-text">
                  <h4>${{trago.precio}}</h4>
                </div>
          </div>
          <br>
          <tag-lister v-bind:tags="trago.etiquetas"></tag-lister>
          <br>
          <button class="btn btn-dark" @click="verBar">Ver bar que ofrece el trago</button>
        </div>
    </div>
</template>

<script>
import default_image from "@/assets/noImage.png"
import TagLister from "@/components/TagLister.vue"

export default {
    name: "trago-component",
    components:{
      TagLister,
    },
    props:{
        trago:null,
    },
    methods: {
      getImage(src){
        if (src==null)
          src=default_image
        return src
      },
      verBar(){
        this.$router.push("/bares/"+this.trago.id_bar)
      },
    }
}
</script>