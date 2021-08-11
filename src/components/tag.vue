<template>
    <v-btn
  elevation="1"
  small @click="onClick(text, dataIsActive)" :class="{ disabled: dataIsActive }" :plain="dataIsActive" :outlined="dataIsActive">{{ text }}</v-btn>
</template>

<script>
export default {
        name: 'Tag',
        props: {
            text: String,
            isActive: Boolean,
            //isDisabled: Boolean,
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
        computed: {
        }
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
