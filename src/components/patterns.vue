<template>
    <!--<img :src="'/assets/' + name + '.svg'">-->
   
    <v-card class="mx-auto my-12" elevation="2">
        <v-img height="100" :src="'/assets/' + name + '.svg'">
        </v-img>
  </v-card>
 
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
v-card {
    padding: 20px;
}
</style>