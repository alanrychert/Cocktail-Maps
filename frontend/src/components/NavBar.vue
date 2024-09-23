<template>
<div>
  <b-navbar toggleable="lg" class="fixed-top" type="dark"  variant="dark">
    <b-navbar-brand><a href="/" class="logo"><span style="color:#f2d394">Cocktail </span> <span style="color: #009fd2"> maps </span></a></b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item to="/">Bares</b-nav-item>
        <b-nav-item to="/Tragos">Tragos</b-nav-item>
        <b-nav-item to="/Tutoriales">Tutoriales</b-nav-item>
      </b-navbar-nav>

      <b-navbar-nav class="ml-auto">
        <b-nav-form>
          <b-nav-item to="/Hazlotu">Haz tus tragos</b-nav-item>
        </b-nav-form>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
</template>

<script>
export default {
  name:"navbar",
}
</script>