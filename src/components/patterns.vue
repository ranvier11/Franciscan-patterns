<template>
    <img :src="'/assets/' + name + '.svg'">
</template>

<script>

export default {
        name: 'Patterns',
        props: {
            name: String,
            patterns: Array,
        },

        data: function() {
            
            return {
                
                
                
            }
    },
    methods: {
        displayPatterns ( /*object*/ pattern ) {
            let str = '';
            if (typeof pattern === 'object') {
                str = '<img src="/assets/' + pattern.name + '.svg">';
            }
            return str;
        },
        updateTags () {
            console.log('hdf');
            // let index;
            // for (pattern in patterns) {
            //     index = pattern.tags.indexOf(tag);
            //     if (index != -1) {
                    
            //     }
            //}
             
        }

    },
    
}
</script>

<style scoped>

</style>