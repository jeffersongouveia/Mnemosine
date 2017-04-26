<template>
    <config-layout name="Cofres">
        <div class="control" v-for="vault in getVaults">
            <div class="show-options">
                <!-- TODO: emitir um alerta ao tentar editar outro cofre sem salvar o atual -->
                <input type="text" class="vault input is-disabled"
                       :id="vault.id" :value="vault.name" @keyup.enter="disableEdit(vault.id)">

                <!-- TODO: os botões aparecem muito afastados do input -->
                <div class="options">
                    <button class="button is-small" @click="enableEdit(vault.id)">
                            <span class="icon">
                                <i class="fa fa-pencil-square-o"></i>
                            </span>
                    </button>

                    <button class="button is-small">
                            <span class="icon">
                                <i class="fa fa-minus-circle"></i>
                            </span>
                    </button>
                </div>
            </div>
        </div>

        <users-box></users-box>
    </config-layout>
</template>

<script>
    import Vaults from '../../models/Vaults';

    import ConfigLayout from './ConfigLayout.vue';
    import UsersBox from '../base/UsersBox.vue';

    export default {
        components: { UsersBox, ConfigLayout },

        data() {
            return {
                vaults: new Vaults('/api/vaults')
            }
        },

        computed: {
            getVaults() {
                return this.vaults.getData();
            }
        },

        methods: {
            enableEdit(id) {
                let input = document.getElementById(id);

                input.classList.remove('is-disabled');
                input.focus();
            },

            disableEdit(id) {
                let input = document.getElementById(id);

                input.classList.add('is-disabled');
                input.blur();
            }
        },

        created() {
            this.vaults.get();
        }
    }
</script>