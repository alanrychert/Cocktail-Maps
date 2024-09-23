<template>
    <div class="d-flex flex-wrap">
      <div class="card d-flex flex-column justify-content-between ">
        <div class= "card-header">
          <b-img v-bind:src="getImage(imgsrc)" class="card-img-top" style="height:100%" alt="card image"></b-img>
        </div>
        <div class="card-body">
          <h5 class="card-title text-center">{{nombre}}</h5>
          <p class="card-text" >{{msg}}</p>
        </div>
        <div class="card-footer text-center">
              <!--<button type="button" class="btn btn-info align-items-center" data-toggle="modal" data-target="#modalContacto" style="width: 100%;">Contacto</button>
              <hr>-->
              <span class="lg-view">
                <button class="btn btn-primary btn-block" @click="verBar" >Mas información</button>
              </span>
              <span class="sm-view">
                <button class="btn btn-primary btn-block" @click="verBar" >Ver</button>
              </span>
          </div>
      </div>
    </div>
</template>

<script>
import default_image from "@/assets/noImage.png"

export default {
    name:"barCard",
    props: {
        id: null,
        nombre: String,
        msg: String,
        imgsrc : null,
    },
    methods: {
      getImage(src){
        if (src==null)
          src=default_image
        return src
      },
      verBar(){
        this.$router.push("/bares/"+this.id)
      },
    }
}
</script>

<style scoped>
.btn{
  width: 100%;
}

</style>