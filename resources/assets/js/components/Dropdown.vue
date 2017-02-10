<template>
    <div class="content has-text-centered">
        <span class="dropdown">
            <a href="#" @click="toogleActive = !toogleActive">
                <slot></slot>
            </a>

            <div class="has-text-left dropdown-content" :class="{ 'show': toogleActive, 'dropup': isDropup }">
                <div class="box">
                    <a href="#" v-for="option in options"
                       v-text="option" @click="selectOption(option)"
                       :class="{ 'option-hr': option == '' }">
                    </a>
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
                toogleActive: false,
                selected: ''
            }
        },

        methods: {
            selectOption(option) {
                this.selected = option;
                this.toogleActive = false;
                this.$emit('selectOption', option);
            }
        },

        created() {
            this.selected = this.options[0];
        }
    }
</script>

<style lang="css">
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown a,
    .dropdown i {
        color: inherit;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
    }

    .dropdown-content a {
        display: block;
    }

    .dropdown-content a:hover {
        color: #00d1b2;
        background-color: whitesmoke;
    }

    .show {
        display: block;
    }

    .dropup {
        bottom: 100%;
    }

    .option-hr {
        margin-top: .4em;
        margin-bottom: .4em;
        border-bottom: 1px solid #000;
        pointer-events: none;
        cursor: default;
    }
</style>