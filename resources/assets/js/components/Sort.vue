<template>
    <dropdown class="dropdown-sort" :options="sort_options" @selectOption="selected">
        X itens ordenados por {{ selected_option }} <i class="fa fa-angle-down"></i>
    </dropdown>
</template>

<script>
    import Dropdown from './base/Dropdown.vue';

    export default {
        components: {
            'dropdown': Dropdown
        },

        data() {
            return {
                selected_option: 'Título',
                sort_options: [
                    {
                        prop: 'name',
                        label: 'Título',
                        route: ''
                    },
                    {
                        prop: 'ip',
                        label: 'IP',
                        route: ''
                    },
                    {
                        prop: 'date_mod',
                        label: 'Data de Modificação',
                        route: ''
                    },
                    {
                        prop: 'date_new',
                        label: 'Data de Criação',
                        route: ''
                    },
                    {
                        prop: 'strength',
                        label: 'Força da Senha',
                        route: ''
                    },
                    {
                        prop: 'hr',
                        label: '',
                        isLine: true,
                        route: ''
                    },
                    {
                        prop: 'sort_cre',
                        label: 'Ordem Crescente',
                        route: ''
                    },
                    {
                        prop: 'sort_dec',
                        label: 'Ordem Decrescente',
                        route: ''
                    }
                ]
            }
        },

        methods: {
            selected(option) {
                this.selected_option = option.label;
                this.$emit('selected', option);
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