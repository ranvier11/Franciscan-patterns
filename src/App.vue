<template>
  <div class="container">
    <div>
      
    <Tag v-for="tag in tags" :key="tag.index" :text="tag"  @updateTags="fillTagsOff($event)"/>
    </div>
    <div>
    <Patterns v-for="pattern in patterns" :key="pattern.name" :name="pattern.name" :class="{pattern: !pattern.visible}"/>
    </div>
  </div>
</template>

<script>
import Tag from './components/tag.vue'
import Patterns from './components/patterns.vue'

export default {
  name: 'App',
  components: {
    Tag,
    Patterns,
  },
  data: function() {
            const patternsArray = [
                {
                name: '01',
                tags: {'flower' : true, 'leaf' : true},
                visible: true,
                }, {
                name: '02',
                tags: {'flower' : true},
                visible: true,
                }, {
                name: '03',
                tags: {'leaf' : true, 'pattern' : true},
                visible: true,
                }
                ];
            var tags = ['flower', 'spaghetti', 'leaf', 'pattern', 'heart'];
            let tagsOff = [];
            return {
                patterns: patternsArray,
                path: './assets/patterns/',
                tags,
                tagsOff,
            }
  },
  methods: {
    fillTagsOff (tag) {
      let index = this.tagsOff.indexOf(tag[0]);
      if (tag[1] === false && index === -1){
        this.tagsOff.push(tag[0]);
      } else if (tag[1] === true && index >= 0){
        this.tagsOff.splice(index, 1);
      }
      // set flag for tags in patterns array
      for (this.pattern of this.patterns){
        for([this.key, this.value] of Object.entries(this.pattern.tags)) {
          if(this.key === tag[0]) {
            this.pattern.tags[this.key] = tag[1];
          }
        }
        //set visibility for pattern
        for (this.value of Object.values(this.pattern.tags)) {
          //console.log(this.value);
          if(this.value === true) {
          this.pattern.visible = true;
        } else {
          this.pattern.visible = false;
        }
        }
      }
      console.log (this.pattern.visible);
      
    
      
    },
    // updatePatterns () {
    //   if (this.tagsOff >0 ) {
    //     for (const value in this.patterns) {
          
    //     }
    //   }
    // }
  },
  }

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
.pattern {
  display: none;
}
</style>
