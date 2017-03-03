<template>
    <div class="container">
        <div class="line">
            <div class="control is-horizontal">
                <div class="control-label">
                    <label class="label">{{ label }}</label>
                </div>

                <div class="control">
                    <input :type="isPassword ? 'password' : 'text'" class="input">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            label: {
                required: true
            },
            isPassword: {
                required: false,
                default: false
            }
        }
    }
</script>