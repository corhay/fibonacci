<template>
  <div class="flex justify-center">
    <button
      @click="increment(false)"
      class="text-xl border border-black border-solid px-2 h-8"
    >
      -
    </button>
    <input
      v-model="input"
      @keypress="IsNumber($event, input)"
      type="text"
      class="border-t border-b border-black border-solid text-center w-32 h-8"
    />
    <button
      @click="increment(true)"
      class="text-xl border border-black border-solid px-2 h-8"
    >
      +
    </button>
  </div>
</template>

<script>

export default {
  data() {
    return {
      input: 0,
    //limit input to 1450: a round number close to the highest value of the fibonacci series a javascript variable can handle 
      iterrationLimit: 1450
    };
  },

  methods: {
    increment: function (add) {
      //if user clicked the + button
      if (add) {
        //add to input if it is below the iterration limit
        if (this.input < this.iterrationLimit) this.input++;
      } else if (this.input > 0) {
        this.input--;
      }
    },
    IsNumber: function (event, input) {
      //if the key pressed was a decimal and the input is at most at 4 digits
      if (!/\d/.test(event.key)) {
        return event.preventDefault();
      }
    },
  },

  //watch set to remove leading zeroes, prevent input from surpassing iterrationLimit and then passing the data to parent
  watch: {
    input() {
      this.input = +this.input;

        if(this.input > this.iterrationLimit){
            this.input = this.iterrationLimit;
        }

      this.$emit("iterrations", this.input);
    },
  },
};
</script>