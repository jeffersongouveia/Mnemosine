<template>
    <div class="field is-horizontal">
        <div class="field-label">
            <label class="label">{{ label }}</label>
        </div>

        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="is-not-widthfully">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            label: {
                required: false,
                default: ''
            }
        }
    }
</script>