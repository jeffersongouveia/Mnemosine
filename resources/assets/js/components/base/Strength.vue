<template>
    <progress :value="value" max="150"
              class="info progress is-small"
              :class="[value < 50 ? 'is-danger' : value > 70 ? 'is-success' : 'is-warning']">
    </progress>
</template>

<script>
    export default {
        props: {
            value: {
                required: true,
                default: 0
            }
        }
    }
</script>