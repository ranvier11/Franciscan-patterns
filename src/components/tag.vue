<template>
    <button @click="onClick(text, dataIsActive)" :class="{ active: dataIsActive }">{{ text }}</button>
</template>

<script>
export default {
        name: 'Tag',
        props: {
            text: String,
            isActive: Boolean,
        },
        data: function () {
            return {
                dataIsActive: this.isActive,
                dataText: this.text
            }
        },
        methods: {
            onClick(/*string*/tag, /*bool*/dataIsActive) {
                this.$emit('updateTags', [tag, dataIsActive]);
                if (this.dataIsActive == false) {
                    this.dataIsActive = true;
                } else {
                    this.dataIsActive = false;
                }
            }
        },
    }
</script>

<style scoped>
  button {  
border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  }
  button:hover {
      color: white;
  }
  .active {
      color: blue;
  }
</style>
