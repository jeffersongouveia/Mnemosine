<template>
    <dropdown class="dropdown-sort" :options="sort_options" @selectOption="selected">
        X itens ordenados por {{ selected_option }} <i class="fa fa-angle-down"></i>
    </dropdown>
</template>

<script>
    import Dropdown from './Dropdown.vue';

    export default {
        components: {
            'dropdown': Dropdown
        },

        data() {
            return {
                selected_option: 'Título',
                sort_options: {
                    name: 'Título',
                    ip: 'IP',
                    frequency: 'Frequência de Uso',
                    date_mod: 'Data de Modificação',
                    date_new: 'Data de Criação',
                    last_use: 'Data de Último Uso',
                    strength: 'Força da Senha',
                    age: 'Idade da Senha',
                    hr: '',
                    sort_cre: 'Ordem Crescente',
                    sort_dec: 'Ordem Decrescente'
                }
            }
        },

        methods: {
            selected(option) {
                this.selected_option = option;

                for(let item in this.sort_options) {
                    if(this.sort_options[item] == option) {
                        app.$emit('selected', item);
                        break;
                    }
                }
            }
        }
    }
</script>

<style lang="css">
    .dropdown-sort {
        position: relative;
        z-index: 1;
    }
</style>