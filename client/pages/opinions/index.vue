<template>
  <div class="opinions">
    <h1 class="opinions__title">Отзывы и пожелания</h1>
    <div class="opinion" v-for="(opinion, i) in opinions" :key="i">
      <div class="opinion__content" v-bind:class="{'opinion__content_position_right': i % 2}">
        <div class="opinion__quotes opinion__quotes_invert"><img src="/img/galileo/two-quotes.png" alt="quote"></div>
        <div class="opinion__text">{{opinion.text}}</div>
        <div class="opinion__appeal">{{opinion.appeal}}</div>
        <div class="opinion__quotes"><img src="/img/galileo/two-quotes.png" alt="quote"></div>
      </div>
    </div>
    <AddOpinionForm/>
  </div>
</template>

<script>
  import AddOpinionForm from "../../components/AddOpinionForm";
  import {GET_OPINIONS} from "../../common/actions-enum";

  export default {
    name:       "Opinions",
    components: {AddOpinionForm},
    data() {
      return {
        opinions: [],
      };
    },
    mounted() {
      this.$store.dispatch('opinions/' + GET_OPINIONS)
      .then(() => {
        this.opinions = this.$store.getters['opinions/opinions'];
      })
      ;
    }
  }
</script>

<style lang="scss" scoped>
  .opinions {
    margin-top: 20px;
    padding:    0 35px;

    &__title {
      text-align:    center;
      margin-bottom: 15px;
    }
  }

  .opinion {
    display:       flex;
    width:         100%;
    margin-bottom: 10px;

    &__text {
      margin-top: 10px;
    }

    &__content {
      border-radius: 10px;
      background:    #F9E792;
      padding:       15px;
      font-size:     20px;
      font-weight:   bold;
      max-width:     800px;

      &_position_right {
        margin-left: auto;
      }
    }

    &__quotes {
      text-align: center;

      &_invert {
        transform: rotate(180deg);
      }
    }

    &__appeal {
      font-size:     16px;
      font-weight:   normal;
      text-align:    right;
      margin-bottom: 10px;
    }
  }
</style>
