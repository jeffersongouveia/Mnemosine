<template>
    <div class="content has-text-centered">
        <span class="dropdown">
            <span id="sort" @click="toogleActive = !toogleActive">
                <slot></slot>
            </span>

            <div class="has-text-left dropdown-content" :class="{ 'show': toogleActive, 'dropup': isDropup }">
                <div class="box">
                    <router-link v-for="option in options" :to="option.route"
                       v-text="option.label" @click.native="selectOption(option)"
                       :class="{ 'option-hr': option.isLine }">
                    </router-link>
                </div>
            </div>
        </span>
    </div>
</template>

<script>
    export default {
        props: {
            options: {
                required: true
            },
            isDropup: {
                default: false
            }
        },

        data() {
            return {
                toogleActive: false
            }
        },

        methods: {
            selectOption(option) {
                this.toogleActive = false;

                this.$emit('selectOption', option);
            }
        }
    }
</script>

<style lang="css">
    #sort {
        cursor: pointer;
    }
</style>