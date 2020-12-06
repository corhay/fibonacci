<template>
  <div class="px-8 xl:w-1/2 xl:mx-auto">
    <toggle-button
      v-for="(button, index) in displayOptions"
      :key="index"
      :value="button.value"
      :id="index"
      @clicked="toggle"
      :isToggled="button.active"
    ></toggle-button>
    <!-- Reverse flex display to have last value of series appear first when displaying entire series -->
    <div class="flex flex-col-reverse">
      <!-- option 1 -->
      <div v-if="displayOptions[0].active">{{ animatedLastVal }}</div>
      <!-- option 2 -->
      <transition-group name="list" v-if="displayOptions[1].active">
        <div v-for="(value, index) in fibo" :key="value">
          <span class="text-green-600">{{ index }}: </span>
          <span>{{ value }}</span>
        </div>
      </transition-group>
    </div>
  </div>
</template>

<script>
import ToggleButton from "./ToggleButton.vue";

export default {
  components: {
    ToggleButton,
  },

  data() {
    return {
      //tweened number used in the single value animation
      tweenedNumber: 0,
      //display options to be rendered into clickable buttons
      displayOptions: [
        { value: "Afficher la dernière valeur", active: true },
        { value: "Afficher la serie entière", active: false },
      ],
    };
  },

  props: {
    fibo: Array,
  },

  computed: {
    lastValue: function () {
      //get last value of series
      let lastVal = this.fibo[this.fibo.length - 1];
      //returns a precise number up to 21 digits long
      return lastVal.toPrecision(lastVal.toString().length);
    },

    animatedLastVal: function () {

    //bug fix where tweenedNumber would become 0 when lowering iterrations to quickly (e.g. backspace in the input field)
      if (this.tweenedNumber === 0 && this.fibo.length > 1) {
        this.animate();
      }

      return this.tweenedNumber.toFixed(0);
    },
  },

  watch: {
    lastValue: function () {
        this.animate();
    },
  },

  methods: {
    toggle: function (id) {
      //set every option's active property to false
      this.displayOptions.forEach((option) => (option.active = false));
      //set emitter's active property to true
      this.displayOptions[id]["active"] = true;
    },
    animate: function () {
      //shorten animation for the early numbers of the series
      let duration = 0.5;
      if (this.lastValue < 1000) {
        duration = 0.3;
      }

      gsap.to(this.$data, {
        duration: duration,
        tweenedNumber: this.lastValue,
      });
    },
  },
};
</script>

<style scoped>
/* built-in vue transitions for entire series display */

.list-enter-active,
.list-leave-active {
  transition: all 0.5s ease;
}
.list-enter-from,
.list-leave-to {
  opacity: 0;
}
</style>
