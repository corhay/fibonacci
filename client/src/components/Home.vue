<template>
    <h1 class="text-4xl xl:text-6xl">La suite de fibonnacci</h1>
    <selector @iterrations="iterrations"></selector>
    <display :fibo="fiboSeries"></display>
</template>

<script>
import selector from "./Selector.vue"
import display from "./FiboDisplay.vue"
import axios from 'axios'

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
            //sends post request to php server for fibonacci series
            axios.post(import.meta.env.VITE_API_BASE_URL, {
                data: {number: param},
                config: {headers: {'Content-Type': 'multipart/form-data' }}
            }).then(response => {
                this.fiboSeries = response.data;
            });
        }
    }

}


</script>