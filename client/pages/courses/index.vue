<template>
  <CoursesList/>
</template>

<script>
  import EnrollButton from "../../components/EnrollButton";
  import CoursesList from "../../components/CoursesList";

  export default {
    name:       "Courses",
    components: {EnrollButton, CoursesList},
    methods: {
      onCourseSelect: function(url) {
        this.$router.push({path: '/courses/' + url})
      }
    }
  }
</script>

<style lang="scss" scoped>
  .courses {
    &__title {
      width:      100%;
      text-align: center;
      margin:     15px 0;
    }

    &__wrap {
      width:           100%;
      display:         flex;
      flex-wrap:       wrap;
      justify-content: center;
    }

    &__item {
      width:  300px;
      margin: 10px 20px 0;
      cursor: pointer;
      height: auto;

      & > div {
        height: 100%;
      }

      &-title {
        padding-bottom: 52px;
      }

      &-buttons {
        position: absolute;
        top:      calc(100% - 52px);
      }

      &:hover {
        -webkit-box-shadow: 0 4px 31px -2px rgba(0, 0, 0, 0.66);
        -moz-box-shadow:    0 4px 31px -2px rgba(0, 0, 0, 0.66);
        box-shadow:         0 4px 31px -2px rgba(0, 0, 0, 0.66);
        transition:         box-shadow 0.3s ease-in-out;
      }
    }

    &__enroll-btn {
      margin-top: 20px;
    }
  }
</style>
