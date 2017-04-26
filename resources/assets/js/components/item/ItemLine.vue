<template>
    <div class="field is-horizontal">
        <div class="field-label">
            <label class="label">{{ label }}</label>
        </div>

        <div class="field-body">
            <div class="field">
                <div class="control is-not-widthfully">
                    <div v-if="enableInput && !isStrength">
                        <input class="input" type="text" :id="idItem" :value="value">
                    </div>
                    <div v-else>
                        <item-options v-if="!isInput" :value="value" :enable-copy="enableCopy"
                                      :is-password="isPassword" :is-strength="isStrength">
                        </item-options>
                        <input v-else :type="isPassword ? 'password' : 'text'" class="input">
                    </div>
                </div>
            </div>
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

            idItem: {
                required: false,
            },

            enableCopy: {
                required: false,
                default: true
            },

            enableInput: {
                required: false,
                default: false
            },

            isInput: {
                required: false,
                default: false
            },

            // muda para um input com tipo password
            isPassword: {
                required: false,
                default: false
            },

            // muda para um progress
            isStrength: {
                required: false,
                default: false
            }
        }
    }
</script>