<template>
    <div>
        <b-img v-bind:src="getImage(bar.archivos_adjuntos)" class="img-header"></b-img>
        <div class="container">
          <div>
            <h1 class="h1"> {{bar.nombre}} </h1>
              <h2>Información</h2>
                <br>
                <div class="inlist-text">
                  {{bar.descripcion}}
                  <br><br>
                  <span class="h6 font-weight-bold">Ubicacion: </span>
                  {{bar.ubicacion}}
                  <br><br>
                  <span class="h6 font-weight-bold">Horarios: </span>
                  {{bar.horarios}}
                </div>
          </div>
          <br>
          <tag-lister v-bind:tags="bar.etiquetas"></tag-lister>
        </div>
    </div>
</template>

<script>
import default_image from "@/assets/noImage.png"
import TagLister from "@/components/TagLister.vue"

export default {
    name:"bar-component",
    components:{
      TagLister
    },
    props:{
        bar:null,
    },
    methods: {
      getImage(src){
        if (src==null)
          src=default_image
        return src
      },
    }
}
</script>