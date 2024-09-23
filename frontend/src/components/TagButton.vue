<template>
    <button disabled style="background-color: rgba(233, 233, 233, 1); color: black; border-color: rgb(233,233,233); border-radius: 35px; box-shadow: 16px 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.20);">{{this.tag.nombre}}</button>
</template>

<script>
export default {
    name: "tag-button",
    props:{
        tag: null
    },
}
</script>