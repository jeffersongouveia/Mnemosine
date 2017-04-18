<template>
    <div class="item-details">
        <section class="header">
            <label class="title" v-text="name"></label>
        </section>

        <section class="content">
            <slot></slot>
        </section>
    </div>
</template>

<script>
    export default {
        props: {
            name: {
                type: String,
                required: true
            }
        }
    }
</script>