<template>
    <div class="content has-text-centered">
        <span class="dropdown">
            <span id="sort" @click="toogleActive = !toogleActive">
                <slot></slot>
            </span>

            <div class="has-text-left dropdown-content" :class="{ 'show': toogleActive, 'dropup': isDropup }">
                <div class="box">
                    <router-link v-for="option in options" :to="option.route"
                       v-text="option.label" @click.native="selectOption"
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
                toogleActive: false,
                selected: ''
            }
        },

        methods: {
            selectOption() {
                this.toogleActive = false;
//                this.selected = option;
//                this.$emit('selectOption', option);
            }
        }
    }
</script>

<style lang="css">
    #sort {
        cursor: pointer;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown a,
    .dropdown i {
        color: inherit;
        cursor: pointer;
        padding: .1em;
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