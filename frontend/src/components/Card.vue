<template>
    <div class="d-flex flex-wrap">
      <div class="card d-flex flex-column justify-content-between " >
        <div class= "card-header">
          <img src="../assets/logo.jpg" class="card-img-top" style="height:100%" alt="...">
        </div>
        <div class="card-body">
          <h5 class="card-title">{{nombre}}</h5>
          <p class="card-text">{{msg}}</p>
        </div>
        <div class="card-footer">
              <!--<button type="button" class="btn btn-info align-items-center" data-toggle="modal" data-target="#modalContacto" style="width: 100%;">Contacto</button>
              <hr>-->
              <button class="btn btn-primary btn-block">Más información</button>
          </div>
      </div>
    </div>
</template>

<script>

export default {
    name:"Card",
    props: {
        nombre: String,
        msg: String,
        imagen: Image,
    }
}
</script>

<style scoped>
.btn{
  width: 100%;
}
.card-header{
  padding:0;
}
</style>