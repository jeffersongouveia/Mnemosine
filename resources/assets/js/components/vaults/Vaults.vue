<template>
    <div class="select is-fullwidth">
        <select id="vaults" title="Selecione um cofre para ver seus Logins e Notas Seguras" @change="notifyChange">
            <option v-for="vault in getVaults" :value="vault.id" v-text="vault.name"></option>
        </select>
    </div>
</template>

<script>
    import Vaults from '../../models/Vaults';

    export default {
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
            notifyChange() {
                let vaults = document.getElementById('vaults');
                if(vaults) {
                    app.$emit('changedVault', vaults.value);
                }
            }
        },

        created() {
            this.vaults.get();
        }
    }
</script>