<template>
  <div class="stars" @mouseleave="resetHighlight">
    <input type="hidden" :value="ratingValue" name="rating" id="rating-value">
    <i
      v-for="star in 5"
      :key="star"
      class="fas fa-star star"
      :class="{ selected: star <= highlightedRating || star <= ratingValue }"
      @mouseover="highlight(star)"
      @click="setRating(star)"
    ></i>
  </div>
</template>

<script>
export default {
  data() {
    return {
      ratingValue: 0,
      highlightedRating: 0,
    };
  },
  methods: {
    highlight(star) {
      this.highlightedRating = star;
    },
    resetHighlight() {
      this.highlightedRating = 0;
    },
    setRating(star) {
      this.ratingValue = star;
      document.getElementById('rating-value').value = this.ratingValue;
    },
  },
};
</script>

<style scoped>
.stars {
  display: flex;
  padding-bottom: 20px;
  cursor: pointer;
}
.star {
  font-size: 2rem;
  color: #d3d3d3;
  transition: color 0.2s;
}
.star.selected {
  color: gold;
}
</style>
