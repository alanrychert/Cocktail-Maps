<template>
    <div>
        <tag-button v-for="tag of tags" v-bind:key="tag.id" v-bind:tag="tag" style="margin-right:15px"></tag-button>
    </div>
</template>

<script>
import TagButton from '@/components/TagButton.vue'

export default {
    name: "tag-lister",
    props: {
        tags: [],
    },
    components:{
        TagButton
    }
}
</script>