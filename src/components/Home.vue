<template>
    <h1 class="text-4xl xl:text-6xl">La suite de fibonnacci</h1>
    <selector @iterrations="iterrations"></selector>
    <display :fibo="fiboSeries"></display>
</template>

<script>
import selector from "./Selector.vue"
import display from "./FiboDisplay.vue"
import fibonacci_series from "../logic/fibonacci.js"

export default {
    components:{
        selector,
        display
    },

    data(){
        return{
            fiboSeries: [0],
        }
    },

    methods:{
        //method triggered everytime the user changes the number of iterrations from 'selector'
        iterrations: function(param){
            //calls the fibonnaci_series function from ../logic/fibonacci.js
            this.fiboSeries = fibonacci_series(param);
        }
    }



}


</script>