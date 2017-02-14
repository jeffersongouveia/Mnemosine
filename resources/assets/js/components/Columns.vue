<template>
    <div class="columns">
        <div class="column is-3 show-grid">
            <slot name="options"></slot>
        </div>

        <div class="column show-grid">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="css">
    .columns {
        height: 100%;
    }
</style>