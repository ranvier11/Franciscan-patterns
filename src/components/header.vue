<template>
    <div>
        
        <Tag v-for="tag in tags" :key="tag.index" :text="tag"/>
    </div>
</template>

<script>
import Tag from './tag.vue'
    export default {
        name: 'Header',
        components: {
            Tag,
        },
        data: function () {
            var tagsArray = ['flowers', 'spaghetti', 'leaf', 'pattern', 'heart'];
            return {
                tags: tagsArray,
            }
        },
        methods: {
            
        }
    }
    
</script>

<style scoped>
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

</style>