<template>
    <div class="container">
        <div class="line">
            <label class="label" v-text="label"></label>

            <item-options class="info" :value="value" :enable-copy="enableCopy"
                     :is-password="isPassword" :is-strength="isStrength">
            </item-options>
        </div>
    </div>
</template>

<script>
    import ItemOptions from './ItemOptions.vue';

    export default {
        components: {
            'item-options': ItemOptions
        },

        props: {
            label: {
                type: String,
                required: true
            },
            value: {
                required: true
            },
            enableCopy: {
                required: false,
                default: true
            },
            isPassword: {
                required: false,
                default: false
            },
            isStrength: {
                required: false,
                default: false
            }
        }
    }
</script>