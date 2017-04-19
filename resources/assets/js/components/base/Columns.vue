<template>
    <div class="columns" :style="'height: ' + height + 'px'">
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
        data() {
            return {
                height: 0
            }
        },

        beforeUpdate() {
            this.height = document.documentElement.clientHeight + 12;
        }
    }
</script>