
<template>
  <div class="dropdown">
    <input v-model.trim="inputValue" v-if="Object.keys(selectedItem).length === 0" ref="dropdowninput" class="dropdown-input" type="text" placeholder="Find country" />
    
    
    <div v-else @click="resetItem" class="dropdown-selected">
 
  {{ selectedItem.name }}
</div>
    
    
    <div class="dropdown-list" v-show="inputValue && apiLoaded">


<div v-for="item in itemList" :key="item.id" class="dropdown-item" v-show="itemVisible(item)" @click="selectItem(item)" >
  
  {{ item.name }}
</div>


    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data () {
    return {
      selectedItem: {},

      inputValue: '',
      itemList: [

     { name: 'tokiyo' },
     { name: 'helsinki' },
     { name: 'lisbon' },
     { name: 'rio' },
      { name: 'rome' }


      ],
      apiLoaded: false,
      apiUrl: '/admin/get-courses'
    }
  },
  mounted () {
    this.getList()
  },
  methods: {
    getList () {
      axios.get(this.apiUrl).then( response => {
       
        this.apiLoaded = true
      })
    },




  itemVisible (item) {
    let currentName = item.name.toLowerCase();
    let currentInput = this.inputValue.toLowerCase();
    return currentName.includes(currentInput);
  },


  selectItem (theItem) {
    this.selectedItem = theItem
    this.inputValue = ''
    this.$emit('on-item-selected', theItem)
  },



  resetItem () {
    this.selectedItem = {}
    this.$nextTick( () => this.$refs.dropdowninput.focus() )
    this.$emit('on-item-reset')
  },







  }
}
</script>

<style>
/* .dropdown{
  position: relative;
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
}
.dropdown-input{
  width: 100%;
  padding: 10px 16px;
  border: 1px solid transparent;
  background: #edf2f7;
  line-height: 1.5em;
  outline: none;
  border-radius: 8px;
}
.dropdown-input:focus{
  background: #fff;
  border-color: #e2e8f0;
}
.dropdown-input::placeholder{
  opacity: 0.7;
}

.dropdown{
  position: relative;
}
.dropdown-list{
  position: absolute;
} */


</style>