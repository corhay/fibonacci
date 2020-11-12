<template>
    <button
    :value="value"
    @click="toggle()"
    :class="[isToggled ? toggledClasses : 'border-black']"
    class="border border-solid rounded p-2 m-2 lg:hover:bg-green-400 lg:hover:text-white lg:hover:border-transparent">
    {{ value }}</button>
</template>

<script>
export default {
    props: {
        //the buttons display message
        value: String,
        isToggled: Boolean,
        //id used to identify sender when emitting a click event
        id: Number,
    },

    data(){
        return {
            //classes to add when button is toggled
            toggledClasses: 'text-white border-transparent bg-green-600',
        }
    },

    methods: {
        //method triggered on click, sends click event to parent component
        toggle: function(){
            this.$emit("clicked", this.id);
        }
    }
}
</script>